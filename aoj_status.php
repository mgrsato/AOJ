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
    /* mysql:host=ホスト名; dbname=データベース名; charset=文字エンコード */
    $dsn = 'mysql:host=localhost; dbname=aoj; charset=utf8';
    $user = 'root';
    $password = 'rootpass';

/*
    DB Column
    NULL, dateTime, id, name, affiliation, registerDate, lastSubmitDate, policy, country, birthYear, displayLanguage, defaultProgrammingLanguage, avatar, submissions, solved, accepted, wrongAnswer, timeLimit, memoryLimit, outputLimit, compileError, runtimeError, url
*/
    $scope = "";
    if(isset($_GET['scope'])) {
        $scope = htmlspecialchars($_GET['scope']);
    }

    /* $dateTimeToday = date('YmdHi'); // ex) 201810260300 */
    $dateTimeToday = date('Ymd'); // ex) 20181026
    /* print("<p>".$dateTimeToday."</p>"); */

    try {
        /* PDOインスタンスを生成 */
        $dbh = new PDO($dsn, $user, $password);

        if(scope == "day"){
            /* 前日と比較した際の進捗 */

        }elseif(scope == "week"){
            /* ここ一週間での進捗 */

        }elseif(scope == "month"){
            /* ここ一か月での進捗 */

        }elseif(scope == "all"){
            /* 全期間での進捗 */

        }else{
            /* 今日の状況 */
            /* $sql = "SELECT * FROM status where dateTime = '".$dateTimeToday."'"; */
            $sql = "SELECT * FROM status where dateTime like '".$dateTimeToday."%'";
        }

        /* SQLステートメントを実行し、結果を変数に格納 */
        $stmt = $dbh->query($sql);


        print("<div class='boxElementResult'>");
        print("<H1>AOJ進捗状況</H1>");
        print("<table CLASS='table3'>");
        print("<tr>");
        /* id, name, lastSubmitDate, submissions, solved */
        print("<th>id</th><th>name</th><th>lastSubmitDate</th><th>submissions</th><th>solved</th>");
        print("</tr>");
        
        /* foreach文で配列の中身を一行ずつ出力 */
        foreach ($stmt as $row) {
            // データベースのフィールド名で取り出し，同名のPHPの変数に格納
            $num = $row['num'];
            $dateTime = $row['dateTime'];
            $id = $row['id'];
            $name = $row['name'];
            $affiliation = $row['affiliation'];
            $registerDate = $row['registerDate'];
            $lastSubmitDate = $row['lastSubmitDate'];
            $policy = $row['policy'];
            $country = $row['country'];
            $birthYear = $row['birthYear'];
            $displayLanguage = $row['displayLanguage'];
            $defaultProgrammingLanguage = $row['defaultProgrammingLanguage'];
            $avatar = $row['avatar'];
            $submissions = $row['submissions'];
            $solved = $row['solved'];
            $accepted = $row['accepted'];
            $wrongAnswer = $row['wrongAnswer'];
            $timeLimit = $row['timeLimit'];
            $memoryLimit = $row['memoryLimit'];
            $outputLimit = $row['outputLimit'];
            $compileError = $row['compileError'];
            $runtimeError = $row['runtimeError'];
            $url = $row['url'];

            print("<tr>");
            print("<td>".$id."</td><td>".$name."</td><td>".$lastSubmitDate."</td><td>".$submissions."</td><td>".$solved."</td>");
            print("</tr>");
        }
        
        // データベースとの接続を閉じる
        $dbh = null;

        print("</table>");
        print("</div>");
        
    } catch (PDOException $e) {
        // エラーメッセージを表示させる
        echo 'データベースにアクセスできません！' . $e->getMessage();

        // 強制終了
        exit;
    }
?>
</BODY>
</HTML>