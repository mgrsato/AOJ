<?php
    // ini_set("display_errors", 1);
    // error_reporting(E_ALL);

    $host = 'localhost';
    $dbname = 'typing';
    $charset = 'utf8';
    $user = 'dbuser';
    $password = 'dbuserpass';

    $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'SELECT name, MIN(time_required) FROM 2019_itip1_typing_result GROUP BY name ORDER BY MIN(time_required) LIMIT 10;';
    $stmt = $dbh->query($sql);
    
    $minutes_time_required = array_fill(0, 10, 'null');

    $i = 0;
    foreach ($stmt as $row) {
    // [rank], name, MIN(time_required)
        $rank[$i] = $i + 1;
        $db_name[$i] = $row['name'];
        // $db_time_required[$i] = $row['time_required'];
        $db_time_required[$i] = $row['MIN(time_required)'];

        $hms = explode(':', $db_time_required[$i]);
        // $seconds_time_required[$i] = ($hms[0] * 3600 + $hms[1] * 60 + $hms[2]);
        $minutes_time_required[$i] = ($hms[0] * 60 + $hms[1]  + $hms[2] / 60);

        $i = $i + 1;
    }

    $dbh = null;
?>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>2019 ITIP1 タイピング練習：10件表示 TOP10</TITLE>
    <STYLE TYPE="text/css">
        body {
            font-family: 'Hiragino Kaku Gothic ProN', 'ヒラギノ角ゴ ProN W3', Meiryo, メイリオ, Osaka, 'MS PGothic', arial, helvetica, sans-serif;
            font-size: 12px;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            width: 200px;
        }
        a {
            font-family: inherit;
            font-size: 100%;
            text-decoration: none;
        }

        table {
            border: 1px solid #708090;
            border-collapse: collapse;
            table-layout: fixed;
            /* width: 800px; */
            width: 1600px;
        }

        th {
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-weight: bold;
        }
        th.vertical {
            text-align: right;
        }
        th.horizontal {
            text-align: center;
        }

        td {
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            text-align: left;
            background-color: #FFFFFF;
        }

        .boxElementSearch {
            border: 1px solid #CCCCCC;
            padding: 10px 10px;
            /* float: left; */
            /* width: 800px; */
            width: 1600px;
            background-color: #eee;
            /* display: flex;
            justify-content: center;
            align-items: center; */
        }

        .left {
            float: left;
        }
        .right {
            float: right;
        }
    </STYLE>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', { packages: ['corechart', 'line'] });
        google.charts.setOnLoadCallback(drawCurveTypes);
        function drawCurveTypes() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '名前');
            data.addColumn('number', '所要時間');
            data.addRows([
                ["<?php print($db_name[0]); ?>", <?php print($minutes_time_required[0]); ?>], 
                ["<?php print($db_name[1]); ?>", <?php print($minutes_time_required[1]); ?>], 
                ["<?php print($db_name[2]); ?>", <?php print($minutes_time_required[2]); ?>], 
                ["<?php print($db_name[3]); ?>", <?php print($minutes_time_required[3]); ?>], 
                ["<?php print($db_name[4]); ?>", <?php print($minutes_time_required[4]); ?>], 
                ["<?php print($db_name[5]); ?>", <?php print($minutes_time_required[5]); ?>], 
                ["<?php print($db_name[6]); ?>", <?php print($minutes_time_required[6]); ?>], 
                ["<?php print($db_name[7]); ?>", <?php print($minutes_time_required[7]); ?>], 
                ["<?php print($db_name[8]); ?>", <?php print($minutes_time_required[8]); ?>], 
                ["<?php print($db_name[9]); ?>", <?php print($minutes_time_required[9]); ?>], 
            ]);
            var options = {
                vAxis: {
                    title: '名前'
                },
                // vAxis: {
                //     title: 'mistake rate[%], time required[sec] '
                // },
                series:{
                    0:{targetAxisIndex:0},
                    1:{targetAxisIndex:1}
                },
                hAxes: {
                    0: {logScale: false, title: '所要時間 [分]', minValue: 0, maxValue: 10},
                    1: {logScale: false, title: 'time required [min]', minValue: 0, maxValue: 10}
                },
                // width: 800,
                width: 1600,
                height: 400
            };
            // 折れ線グラフ
            // var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            // 棒グラフ
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            
            chart.draw(data, options);
        }
    </script>
</HEAD>

<BODY>
    <div class='boxElementSearch'>
    <H1>2019 ITIP1 タイピング練習：所要時間ランキング</H1>
    <div id="chart_div"></div>
    <table>
        <tr>
            <th class="horizontal" width='200px'>順位</th>
            <th class="horizontal">名前</th>
            <th class="horizontal">所要時間</th>
        </tr>
        <?php
            $i = 0;
            foreach ($rank as $value) {
                print("<tr>");
                print("<th class='vertical'>".$rank[$i]."</th>");
                print("<td>".$db_name[$i]."</td>");
                print("<td>".$db_time_required[$i]."</td>");
                print("</tr>");
                $i = $i + 1;
            }
        ?>
    </table>
    <br />

    </div>
</BODY>
</HTML>