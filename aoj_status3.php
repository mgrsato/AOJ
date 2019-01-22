<HTML>
<HEAD> 
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>AOJ STATUS</TITLE>
<STYLE TYPE="text/css"> 
<!--
    body {
        /* font-family: "Hiragino Kaku Gothic ProN","メイリオ", sans-serif;
        font-family: arial, sans-serif;
        font-family: "MS PGothic", "Osaka", Arial, sans-serif;
        font-family: helvetica, arial, 'hiragino kaku gothic pro', meiryo, 'ms pgothic', sans-serif;
        font-family: 'Hiragino Kaku Gothic ProN', 'ヒラギノ角ゴ ProN W3', sans-serif;
        font-family: 'Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W3', Meiryo, メイリオ, Osaka, 'MS PGothic', arial, helvetica, sans-serif;

        font-family: 游ゴシック体, 'Yu Gothic', YuGothic, 'ヒラギノ角ゴシック Pro', 'Hiragino Kaku Gothic Pro', メイリオ, Meiryo, Osaka, 'ＭＳ Ｐゴシック', 'MS PGothic', sans-serif; */
        font-family: 'Hiragino Kaku Gothic ProN', 'ヒラギノ角ゴ ProN W3', Meiryo, メイリオ, Osaka, 'MS PGothic', arial, helvetica, sans-serif;

        font-size: 12px;
    }
    .code {
        direction: ltr;
        font-family: Consolas, Monaco, 'Andale Mono', monospace;
        font-size: 16px;
        text-align: left;
        word-wrap: break-word;

        /* border: 1px solid #DC143C; */
        border: 1px solid #CCCCCC;
        /* background: #FFC0CB; */
        background: #eee;
        padding: 0.1em 0.5em;
        margin: 0 0.5em;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px 3px 3px 3px;
        width: 40px;

        display:inline-block;
        vertical-align: middle;
    }
    .code a {
        text-decoration: none;
        display:inline;
        vertical-align: middle;
    }

    .table3 {
        border-collapse: collapse;
        table-layout: fixed;
        /* width: 1200px; */
        width: 1222px;
    }
    .table3 th,
    .table3 td {
        border: 1px solid #CCCCCC;
        padding: 5px 10px;
        text-align: left;
    }
    .table3 th {
    }
    .table3 td {
        background-color: #FFFFFF;
    }

    .boxElementSearch{
        border: 1px solid #CCCCCC;
        /* padding: 5px 21px; */
        padding: 10px 10px;
        float: left;
        width: 1222px;
        background-color: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .boxElementResult{
        border: 1px solid #CCCCCC;
        /* padding: 5px 21px; */
        padding: 5px 10px;
        float: left;
        width: 1222px;
        background-color: #eee;
    }

-->
</STYLE>
</HEAD>

<BODY>
<?php
    print("<div class='boxElementResult'>");
    print("<H1>AOJ進捗状況</H1>");
    print("<table CLASS='table3'>");
    print("<tr>");
    print("<th>ID</th><th>名前</th><th>今日</th><th>1日前</th><th>2日前</th><th>3日前</th><th>4日前</th><th>5日前</th><th>6日前</th><th>1週間前</th><th>2週間前</th><th>3週間前</th><th>1か月前</th><th>2か月前</th><th>3か月前</th>");
    print("</tr>");

    /* mysql:host=ホスト名; dbname=データベース名; charset=文字エンコード */
    $dsn = 'mysql:host=localhost; dbname=aoj; charset=utf8';
    $user = 'root';
    $password = 'rootpass';
    
    $student_id_number = ['ksato', 'K188001', 'K188002', 'K188003', 'K188004', 'K188005', 'K188006', 'K188007', 'K188008', 'K188009', 'K188010', 'K188011', 'K188012', 'K188013', 'K188014', 'K188015', 'K188016', 'K188017', 'K188018', 'K185001', 'K185003', 'K185004', 'K185005', 'K185006', 'K185008', 'K185009', 'K185010', 'K185011', 'K185012', 'K185015', 'K185016', 'K185017', 'K185018', 'K185019', 'K185020', 'K185021', 'K185022', 'K185023', 'K185025', 'K185027', 'K185028', 'K185029', 'K185030', 'K185031'];
    for ($i = 0; $i < count($student_id_number); $i++){

        $name = '';
        $solved_0 = '';
        $solved_1 = '';
        $solved_2 = '';
        $solved_3 = '';
        $solved_4 = '';
        $solved_5 = '';
        $solved_6 = '';
        $solved_7 = '';
        $solved_14 = '';
        $solved_21 = '';
        $solved_28 = '';
        $solved_56 = '';
        $solved_84 = '';

        $dbh = new PDO($dsn, $user, $password);

        /* name */
        $sql = "SELECT name FROM status where id = '".$student_id_number[$i]."' limit 0,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $name = $row['name'];
        }

        /* 今日時点での総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 0,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_0 = $row['solved'];
        }

        /* 1日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 1,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_1 = $row['solved'];
        }

        /* 2日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 2,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_2 = $row['solved'];
        }

        /* 3日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 3,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_3 = $row['solved'];
        }

        /* 4日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 4,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_4 = $row['solved'];
        }

        /* 5日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 5,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_5 = $row['solved'];
        }

        /* 6日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 6,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_6 = $row['solved'];
        }

        /* 7日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 7,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_7 = $row['solved'];
        }

        /* 14日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 14,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_14 = $row['solved'];
        }

        /* 21日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 21,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_21 = $row['solved'];
        }

        /* 28日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 28,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_28 = $row['solved'];
        }

        /* 56日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 56,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_56 = $row['solved'];
        }

        /* 84日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by solved DESC limit 84,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_84 = $row['solved'];
        }

        print("<tr>");
        print("<td>".$student_id_number[$i]."</td><td>".$name."</td><td>".$solved_0."</td><td>".$solved_1."</td><td>".$solved_2."</td><td>".$solved_3."</td><td>".$solved_4."</td><td>".$solved_5."</td><td>".$solved_6."</td><td>".$solved_7."</td><td>".$solved_14."</td><td>".$solved_21."</td><td>".$solved_28."</td><td>".$solved_56."</td><td>".$solved_84."</td>");
        print("</tr>");
    }
    
    // データベースとの接続を閉じる
    $dbh = null;

    print("</table>");
    print("</div>");
    
?>
</BODY>
</HTML>