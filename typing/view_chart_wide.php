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

    $name = "";
    if(isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
    }
    $offset = 0;
    if(isset($_GET['offset'])) {
        $offset = htmlspecialchars($_GET['offset']);
    }

    // $sql = 'SELECT * FROM 2019_itip1_typing_result where name = "'.$name.'" ORDER BY id DESC LIMIT 5';
    $sql = 'SELECT * FROM 2019_itip1_typing_result where name = "'.$name.'" ORDER BY id DESC LIMIT 10 offset '.$offset.';';
    $stmt = $dbh->query($sql);
    
    // $db_timestamp = array_fill(0, 10, '0000-00-00 00:00:00');
    // $mistake_rate = array_fill(0, 10, 0);
    // $min_time_required = array_fill(0, 10, 0);
    $db_timestamp = array_fill(0, 10, 'null');
    $mistake_rate = array_fill(0, 10, 'null');
    $min_time_required = array_fill(0, 10, 'null');

    $i = 0;
    foreach ($stmt as $row) {
    // id, timestamp, name, number_total, number_miss, time_required
        $db_id[$i] = $row['id'];
        $db_timestamp[$i] = $row['timestamp'];
        $db_name[$i] = $row['name'];
        $db_number_total[$i] = $row['number_total'];
        $db_number_miss[$i] = $row['number_miss'];
        $db_time_required[$i] = $row['time_required'];

        $mistake_rate[$i] = ($db_number_miss[$i] / $db_number_total[$i] * 100);
        $hms = explode(':', $db_time_required[$i]);
        // $sec_time_required[$i] = ($hms[0] * 3600 + $hms[1] * 60 + $hms[2]);
        $min_time_required[$i] = ($hms[0] * 60 + $hms[1]  + $hms[2] / 60);

        $i = $i + 1;
    }

    $dbh = null;
?>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>2019 ITIP1 タイピング練習：10件表示</TITLE>
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
            data.addColumn('string', 'timestamp');
            data.addColumn('number', 'mistake_rate');
            data.addColumn('number', 'min_time_required');
            data.addRows([
                ["<?php print($db_timestamp[9]); ?>", <?php print($mistake_rate[9]); ?>, <?php print($min_time_required[9]); ?>], 
                ["<?php print($db_timestamp[8]); ?>", <?php print($mistake_rate[8]); ?>, <?php print($min_time_required[8]); ?>], 
                ["<?php print($db_timestamp[7]); ?>", <?php print($mistake_rate[7]); ?>, <?php print($min_time_required[7]); ?>], 
                ["<?php print($db_timestamp[6]); ?>", <?php print($mistake_rate[6]); ?>, <?php print($min_time_required[6]); ?>], 
                ["<?php print($db_timestamp[5]); ?>", <?php print($mistake_rate[5]); ?>, <?php print($min_time_required[5]); ?>], 
                ["<?php print($db_timestamp[4]); ?>", <?php print($mistake_rate[4]); ?>, <?php print($min_time_required[4]); ?>], 
                ["<?php print($db_timestamp[3]); ?>", <?php print($mistake_rate[3]); ?>, <?php print($min_time_required[3]); ?>], 
                ["<?php print($db_timestamp[2]); ?>", <?php print($mistake_rate[2]); ?>, <?php print($min_time_required[2]); ?>], 
                ["<?php print($db_timestamp[1]); ?>", <?php print($mistake_rate[1]); ?>, <?php print($min_time_required[1]); ?>], 
                ["<?php print($db_timestamp[0]); ?>", <?php print($mistake_rate[0]); ?>, <?php print($min_time_required[0]); ?>], 
            ]);
            var options = {
                hAxis: {
                    title: '実施日'
                },
                // vAxis: {
                //     title: 'mistake rate[%], time required[sec] '
                // },
                series:{
                    0:{targetAxisIndex:0},
                    1:{targetAxisIndex:1}
                },
                vAxes: {
                    0: {logScale: false, title: 'mistake rate [%]', minValue: 0, maxValue: 100},
                    1: {logScale: false, title: 'time required [min]', minValue: 0, maxValue: 10}
                },
                // width: 800,
                width: 1600,
                height: 400
            };
            // 折れ線グラフ
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            // 棒グラフ
            // var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            
            chart.draw(data, options);
        }
    </script>
</HEAD>

<BODY>
    <div class='boxElementSearch'>
    <H1>2019 ITIP1 タイピング練習：10件表示(<?php print($db_name[0]); ?>)</H1>
    <div id="chart_div"></div>
    <table>
        <tr>
            <th class="horizontal" width='200px'></th>
            <th class="horizontal">10</th>
            <th class="horizontal">9</th>
            <th class="horizontal">8</th>
            <th class="horizontal">7</th>
            <th class="horizontal">6</th>
            <th class="horizontal">5</th>
            <th class="horizontal">4</th>
            <th class="horizontal">3</th>
            <th class="horizontal">2</th>
            <th class="horizontal">1</th>
        </tr>
        <tr>
            <th class="vertical">実施日</th>
            <td><?php print($db_timestamp[9]); ?></td>
            <td><?php print($db_timestamp[8]); ?></td>
            <td><?php print($db_timestamp[7]); ?></td>
            <td><?php print($db_timestamp[6]); ?></td>
            <td><?php print($db_timestamp[5]); ?></td>
            <td><?php print($db_timestamp[4]); ?></td>
            <td><?php print($db_timestamp[3]); ?></td>
            <td><?php print($db_timestamp[2]); ?></td>
            <td><?php print($db_timestamp[1]); ?></td>
            <td><?php print($db_timestamp[0]); ?></td>
        </tr>
        <tr>
            <th class="vertical">総タイプ数(key)</th>
            <td><?php print($db_number_total[9]); ?></td>
            <td><?php print($db_number_total[8]); ?></td>
            <td><?php print($db_number_total[7]); ?></td>
            <td><?php print($db_number_total[6]); ?></td>
            <td><?php print($db_number_total[5]); ?></td>
            <td><?php print($db_number_total[4]); ?></td>
            <td><?php print($db_number_total[3]); ?></td>
            <td><?php print($db_number_total[2]); ?></td>
            <td><?php print($db_number_total[1]); ?></td>
            <td><?php print($db_number_total[0]); ?></td>
        </tr>
        <tr>
            <th class="vertical">ミスタイプ数(key)</th>
            <td><?php print($db_number_miss[9]); ?></td>
            <td><?php print($db_number_miss[8]); ?></td>
            <td><?php print($db_number_miss[7]); ?></td>
            <td><?php print($db_number_miss[6]); ?></td>
            <td><?php print($db_number_miss[5]); ?></td>
            <td><?php print($db_number_miss[4]); ?></td>
            <td><?php print($db_number_miss[3]); ?></td>
            <td><?php print($db_number_miss[2]); ?></td>
            <td><?php print($db_number_miss[1]); ?></td>
            <td><?php print($db_number_miss[0]); ?></td>
        </tr>
        <tr>
            <th class="vertical">所要時間</th>
            <td><?php print($db_time_required[9]); ?></td>
            <td><?php print($db_time_required[8]); ?></td>
            <td><?php print($db_time_required[7]); ?></td>
            <td><?php print($db_time_required[6]); ?></td>
            <td><?php print($db_time_required[5]); ?></td>
            <td><?php print($db_time_required[4]); ?></td>
            <td><?php print($db_time_required[3]); ?></td>
            <td><?php print($db_time_required[2]); ?></td>
            <td><?php print($db_time_required[1]); ?></td>
            <td><?php print($db_time_required[0]); ?></td>
        </tr>
    </table>
    
    <br />

    <div class="left">
        <a href="view_chart_wide.php?name=<?php print($name); ?>&offset=<?php print($offset + 10); ?>">＜＜</a>　
    </div>
    <div class="right">
        <a href="view_chart_wide.php?name=<?php print($name); ?>&offset=<?php print(( $offset != 0 ) ? $offset - 10 : $offset); ?>">＞＞</a>
    </div>

    <br />

    </div>
</BODY>
</HTML>