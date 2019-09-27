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

    .pink{
        background-color: #ffc0cb;
    }

    .table3 {
        border-collapse: collapse;
        table-layout: fixed;
        font-size: 12px;
        /* width: 1200px; */
        /* width: 1222px; */
        /* width: 1600px; */
    }
    .table3 th,
    .table3 td {
        border: 1px solid #CCCCCC;
        padding: 5px 10px;
        text-align: left;
    }
    .table3 th {
    }
    .table3 tr {
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
        /* width: 1222px; */
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
    /* print("<th>ID</th><th>名前</th><th>今日</th><th>1日前</th><th>2日前</th><th>3日前</th><th>4日前</th><th>5日前</th><th>6日前</th><th>1週間前</th><th>2週間前</th><th>3週間前</th><th>1か月前</th><th>2か月前</th><th>3か月前</th>"); */
    print("<th>ID</th><th>名前</th><th>3か月前</th><th>2か月前</th><th>1か月前</th><th>3週間前</th><th>2週間前</th><th>1週間前</th><th>6日前</th><th>5日前</th><th>4日前</th><th>3日前</th><th>2日前</th><th>1日前</th><th>今日</th><th>最新</th><th>進捗</th><th>合計</th>");
    print("</tr>");

    /* mysql:host=ホスト名; dbname=データベース名; charset=文字エンコード */
    $dsn = 'mysql:host=localhost; dbname=aoj; charset=utf8';
    $user = 'root';
    $password = 'rootpass';
    
    /* $student_id_number = ['ksato', 'K188001', 'K188002', 'K188003', 'K188004', 'K188005', 'K188006', 'K188007', 'K188008', 'K188009', 'K188010', 'K188011', 'K188012', 'K188013', 'K188014', 'K188015', 'K188016', 'K188017', 'K188018', 'K185001', 'K185003', 'K185004', 'K185005', 'K185006', 'K185008', 'K185009', 'K185010', 'K185011', 'K185012', 'K185015', 'K185016', 'K185017', 'K185018', 'K185019', 'K185020', 'K185021', 'K185022', 'K185023', 'K185025', 'K185027', 'K185028', 'K185029', 'K185030', 'K185031']; */
    /* $student_id_number = ['K188001', 'K188002', 'K188003', 'K188004', 'K188005', 'K188006', 'K188007', 'K188008', 'K188009', 'K188010', 'K188011', 'K188012', 'K188013', 'K188014', 'K188015', 'K188016', 'K188017', 'K188018', 'K185001', 'K185004', 'K185005', 'K185006', 'K185008', 'K185009', 'K185011', 'K185012', 'K185015', 'K185016', 'K185017', 'K185018', 'K185019', 'K185020', 'K185021', 'K185022', 'K185023', 'K185025', 'K185027', 'K185028', 'K185029', 'K185030', 'K185031']; */
    /* $student_id_number = ['K198001c', 'K198002', 'K198003', 'K198004', 'K198005', 'K198006', 'K198007', 'K198008', 'K198009', 'K198010', 'K198011', 'K198012', 'K198013', 'K198014', 'K198015', 'K198016', 'K198017']; */
    $student_id_number = ['K198001c', 'K198002', 'K198003', 'K198004', 'K198005', 'K198006', 'K198007', 'K198008', 'K198009', 'K198010', 'K198011', 'K198013', 'K198014', 'K198015', 'K198016', 'K198017'];

    for ($i = 0; $i < count($student_id_number); $i++){

        $name = '';
        $solved_0 = '0';
        $solved_1 = '0';
        $solved_2 = '0';
        $solved_3 = '0';
        $solved_4 = '0';
        $solved_5 = '0';
        $solved_6 = '0';
        $solved_7 = '0';
        $solved_14 = '0';
        $solved_21 = '0';
        $solved_28 = '0';
        $solved_56 = '0';
        $solved_84 = '0';

        $dbh = new PDO($dsn, $user, $password);

        /* name */
        $sql = "SELECT name FROM status where id = '".$student_id_number[$i]."' ORDER BY datetime DESC limit 0,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $name = $row['name'];
        }

        /* 今日時点での総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 0,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_0 = $row['solved'];
        }

        /* 1日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 1,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_1 = $row['solved'];
        }

        /* 2日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 2,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_2 = $row['solved'];
        }

        /* 3日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 3,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_3 = $row['solved'];
        }

        /* 4日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 4,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_4 = $row['solved'];
        }

        /* 5日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 5,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_5 = $row['solved'];
        }

        /* 6日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 6,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_6 = $row['solved'];
        }

        /* 7日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 7,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_7 = $row['solved'];
        }

        /* 14日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 14,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_14 = $row['solved'];
        }

        /* 21日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 21,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_21 = $row['solved'];
        }

        /* 28日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 28,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_28 = $row['solved'];
        }

        /* 56日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 56,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_56 = $row['solved'];
        }

        /* 84日前時点の総クリア数 */
        $sql = "SELECT solved FROM status where id = '".$student_id_number[$i]."' order by datetime DESC limit 84,1";
        $stmt = $dbh->query($sql);
        foreach ($stmt as $row) {
            $solved_84 = $row['solved'];
        }

        $url = "https://judgeapi.u-aizu.ac.jp/users/".$student_id_number[$i];
        $json = file_get_contents($url);
        $obj = json_decode($json);
        $status_solved = $obj->{'status'}->{'solved'};
        /* print("<td>".$status_solved."</td>"); */



        print("<tr>");

        /* 前日クリア数との比較 */
        $str_84 = "<td>".($solved_84 - 0)."</td>";

        if($solved_56 > $solved_84){
            /* $up_or_flat_56 = "<font color='red'>↑</font>"; */
            /* $str_56 = "<td><font color='red'>↑</font>".$solved_56."</td>"; */
            /* $str_56 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_56."</td>"; */
            $str_56 = "<td bgcolor='pink'>".($solved_56 - $solved_84)."</td>";
        }else{
            /* $up_or_flat_56 = "<font color='blue'>→</font>"; */
            /* $str_56 = "<td><font color='blue'>→</font>".$solved_56."</td>"; */
            $str_56 = "<td>".($solved_56 - $solved_84)."</td>";
        }

        if($solved_28 > $solved_56){
            /* $up_or_flat_28 = "<font color='red'>↑</font>"; */
            /* $str_28 = "<td><font color='red'>↑</font>".$solved_28."</td>"; */
            /* $str_28 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_28."</td>"; */
            $str_28 = "<td bgcolor='pink'>".($solved_28 - $solved_56)."</td>";
        }else{
            /* $up_or_flat_28 = "<font color='blue'>→</font>"; */
            /* $str_28 = "<td><font color='blue'>→</font>".$solved_28."</td>"; */
            $str_28 = "<td>".($solved_28 - $solved_56)."</td>";
        }

        if($solved_21 > $solved_28){
            /* $up_or_flat_21 = "<font color='red'>↑</font>"; */
            /* $str_21 = "<td><font color='red'>↑</font>".$solved_21."</td>"; */
            /* $str_21 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_21."</td>"; */
            $str_21 = "<td bgcolor='pink'>".($solved_21 - $solved_28)."</td>";
        }else{
            /* $up_or_flat_21 = "<font color='blue'>→</font>"; */
            /* $str_21 = "<td><font color='blue'>→</font>".$solved_21."</td>"; */
            $str_21 = "<td>".($solved_21 - $solved_28)."</td>";
        }

        if($solved_14 > $solved_21){
            /* $up_or_flat_14 = "<font color='red'>↑</font>"; */
            /* $str_14 = "<td><font color='red'>↑</font>".$solved_14."</td>"; */
            /* $str_14 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_14."</td>"; */
            $str_14 = "<td bgcolor='pink'>".($solved_14 - $solved_21)."</td>";
        }else{
            /* $up_or_flat_14 = "<font color='blue'>→</font>"; */
            /* $str_14 = "<td><font color='blue'>→</font>".$solved_14."</td>"; */
            $str_14 = "<td>".($solved_14 - $solved_21)."</td>";
        }

        if($solved_7 > $solved_14){
            /* $up_or_flat_7 = "<font color='red'>↑</font>"; */
            /* $str_7 = "<td><font color='red'>↑</font>".$solved_7."</td>"; */
            /* $str_7 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_7."</td>"; */
            $str_7 = "<td bgcolor='pink'>".($solved_7 - $solved_14)."</td>";
        }else{
            /* $up_or_flat_7 = "<font color='blue'>→</font>"; */
            /* $str_7 = "<td><font color='blue'>→</font>".$solved_7."</td>"; */
            $str_7 = "<td>".($solved_7 - $solved_14)."</td>";
        }

        if($solved_6 > $solved_7){
            /* $up_or_flat_6 = "<font color='red'>↑</font>"; */
            /* $str_6 = "<td><font color='red'>↑</font>".$solved_6."</td>"; */
            /* $str_6 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_6."</td>"; */
            $str_6 = "<td bgcolor='pink'>".($solved_6 - $solved_7)."</td>";
        }else{
            /* $up_or_flat_6 = "<font color='blue'>→</font>"; */
            /* $str_6 = "<td><font color='blue'>→</font>".$solved_6."</td>"; */
            $str_6 = "<td>".($solved_6 - $solved_7)."</td>";
        }

        if($solved_5 > $solved_6){
            /* $up_or_flat_5 = "<font color='red'>↑</font>"; */
            /* $str_5 = "<td><font color='red'>↑</font>".$solved_5."</td>"; */
            /* $str_5 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_5."</td>"; */
            $str_5 = "<td bgcolor='pink'>".($solved_5 - $solved_6)."</td>";
        }else{
            /* $up_or_flat_5 = "<font color='blue'>→</font>"; */
            /* $str_5 = "<td><font color='blue'>→</font>".$solved_5."</td>"; */
            $str_5 = "<td>".($solved_5 - $solved_6)."</td>";
        }

        if($solved_4 > $solved_5){
            /* $up_or_flat_4 = "<font color='red'>↑</font>"; */
            /* $str_4 = "<td><font color='red'>↑</font>".$solved_4."</td>"; */
            /* $str_4 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_4."</td>"; */
            $str_4 = "<td bgcolor='pink'>".($solved_4 - $solved_5)."</td>";
        }else{
            /* $up_or_flat_4 = "<font color='blue'>→</font>"; */
            /* $str_4 = "<td><font color='blue'>→</font>".$solved_4."</td>"; */
            $str_4 = "<td>".($solved_4 - $solved_5)."</td>";
        }

        if($solved_3 > $solved_4){
            /* $up_or_flat_3 = "<font color='red'>↑</font>"; */
            /* $str_3 = "<td><font color='red'>↑</font>".$solved_3."</td>"; */
            /* $str_3 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_3."</td>"; */
            $str_3 = "<td bgcolor='pink'>".($solved_3 - $solved_4)."</td>";
        }else{
            /* $up_or_flat_3 = "<font color='blue'>→</font>"; */
            /* $str_3 = "<td><font color='blue'>→</font>".$solved_3."</td>"; */
            $str_3 = "<td>".($solved_3 - $solved_4)."</td>";
        }

        if($solved_2 > $solved_3){
            /* $up_or_flat_2 = "<font color='red'>↑</font>"; */
            /* $str_2 = "<td><font color='red'>↑</font>".$solved_2."</td>"; */
            /* $str_2 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_2."</td>"; */
            $str_2 = "<td bgcolor='pink'>".($solved_2 - $solved_3)."</td>";
        }else{
            /* $up_or_flat_2 = "<font color='blue'>→</font>"; */
            /* $str_2 = "<td><font color='blue'>→</font>".$solved_2."</td>"; */
            $str_2 = "<td>".($solved_2 - $solved_3)."</td>";
        }

        if($solved_1 > $solved_2){
            /* $up_or_flat_1 = "<font color='red'>↑</font>"; */
            /* $str_1 = "<td><font color='red'>↑</font>".$solved_1."</td>"; */
            /* $str_1 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_1."</td>"; */
            $str_1 = "<td bgcolor='pink'>".($solved_1 - $solved_2)."</td>";
        }else{
            /* $up_or_flat_1 = "<font color='blue'>→</font>"; */
            /* $str_1 = "<td><font color='blue'>→</font>".$solved_1."</td>"; */
            $str_1 = "<td>".($solved_1 - $solved_2)."</td>";
        }

        if($solved_0 > $solved_1){
            /* $up_or_flat_0 = "<font color='red'>↑</font>"; */
            /* $str_0 = "<td class='pink'><font color='red'>↑</font>".$solved_0."</td>"; */
            /* $str_0 = "<td bgcolor='pink'><font color='red'>↑</font>".$solved_0."</td>"; */
            $str_0 = "<td bgcolor='pink'>".($solved_0 - $solved_1)."</td>";
        }else{
            /* $up_or_flat_0 = "<font color='blue'>→</font>"; */
            /* $str_0 = "<td><font color='blue'>→</font>".$solved_0."</td>"; */
            $str_0 = "<td>".($solved_0 - $solved_1)."</td>";
        }

        if($status_solved > $solved_0){
            $str_now = "<td bgcolor='pink'>".($status_solved - $solved_0)."</td>";
        }else{
            $str_now = "<td>".($status_solved - $solved_0)."</td>";
        }

        /* print("<td>".$student_id_number[$i]."</td><td>".$name."</td><td>".$solved_0."</td><td>".$solved_1."</td><td>".$solved_2."</td><td>".$solved_3."</td><td>".$solved_4."</td><td>".$solved_5."</td><td>".$solved_6."</td><td>".$solved_7."</td><td>".$solved_14."</td><td>".$solved_21."</td><td>".$solved_28."</td><td>".$solved_56."</td><td>".$solved_84."</td>"); */
        /* print("<td>".$student_id_number[$i]."</td><td>".$name."</td><td>".$solved_84."</td><td>".$solved_56."</td><td>".$solved_28."</td><td>".$solved_21."</td><td>".$solved_14."</td><td>".$solved_7."</td><td>".$solved_6."</td><td>".$solved_5."</td><td>".$solved_4."</td><td>".$solved_3."</td><td>".$solved_2."</td><td>".$solved_1."</td><td>".$solved_0."</td>"); */
        /* print("<td>".$student_id_number[$i]."</td><td>".$name."</td><td>".$solved_84."</td><td>".$solved_56.$up_or_flat_56."</td><td>".$solved_28.$up_or_flat_28."</td><td>".$solved_21.$up_or_flat_21."</td><td>".$solved_14.$up_or_flat_14."</td><td>".$solved_7.$up_or_flat_7."</td><td>".$solved_6.$up_or_flat_6."</td><td>".$solved_5.$up_or_flat_5."</td><td>".$solved_4.$up_or_flat_4."</td><td>".$solved_3.$up_or_flat_3."</td><td>".$solved_2.$up_or_flat_2."</td><td>".$solved_1.$up_or_flat_1."</td><td>".$solved_0.$up_or_flat_0."</td>"); */
        /* print("<td>".$student_id_number[$i]."</td><td>".$name."</td><td>".$solved_84."</td><td>".$up_or_flat_56.$solved_56."</td><td>".$up_or_flat_28.$solved_28."</td><td>".$up_or_flat_21.$solved_21."</td><td>".$up_or_flat_14.$solved_14."</td><td>".$up_or_flat_7.$solved_7."</td><td>".$up_or_flat_6.$solved_6."</td><td>".$up_or_flat_5.$solved_5."</td><td>".$up_or_flat_4.$solved_4."</td><td>".$up_or_flat_3.$solved_3."</td><td>".$up_or_flat_2.$solved_2."</td><td>".$up_or_flat_1.$solved_1."</td><td>".$up_or_flat_0.$solved_0."</td>"); */
        print("<td>".$student_id_number[$i]."</td><td>".$name."</td>");
        print($str_84.$str_56.$str_28.$str_21.$str_14.$str_7.$str_6.$str_5.$str_4.$str_3.$str_2.$str_1.$str_0.$str_now);

        print("<td>");
        for($j = 0; $j < $solved_0; $j++){
            /* print("|"); */
            if(($j+1)%10 == 0){
                print("+");
            }else{
                print("-");
            }
        }
        print("</td>");

        print("<td>".$status_solved."</td>");

        print("</tr>");
    }
    
    // データベースとの接続を閉じる
    $dbh = null;

    print("</table>");
    print("</div>");
    
?>
</BODY>
</HTML>
