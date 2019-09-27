<HTML>
<HEAD> 
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>AOJ進捗確認</TITLE>
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

        /* font-size: 12px; */
    }

    .table1 {
        border-collapse: collapse;
        table-layout: fixed;
        /* width: 1200px; */
    }
    .table1 th,
    .table1 td {
        border: 1px solid #CCCCCC;
        padding: 5px 10px;
        text-align: left;
        background-color: #FFFFFF;
    }
-->
</STYLE>
</HEAD>

<BODY>


<?php
    $student_id_number = ['ksato', 'K188001', 'K188002', 'K188003', 'K188004', 'K188005', 'K188006', 'K188007', 'K188008', 'K188009', 'K188010', 'K188011', 'K188012', 'K188013', 'K188014', 'K188015', 'K188016', 'K188017', 'K188018', 'K185001', 'K185003', 'K185004', 'K185005', 'K185006', 'K185008', 'K185009', 'K185010', 'K185011', 'K185012', 'K185015', 'K185016', 'K185017', 'K185018', 'K185019', 'K185020', 'K185021', 'K185022', 'K185023', 'K185025', 'K185027', 'K185028', 'K185029', 'K185030', 'K185031'];

    print("<table CLASS='table1'>");
    print("<tr>");
    print("<th>id</th>");
    print("<th>name</th>");
    /* print("<th>affiliation</th>"); */
    /* print("<th>register<br>Date</th>"); */
    print("<th>last<br>Submit<br>Date</th>");
    /* print("<th>policy</th>"); */
    /* print("<th>country</th>"); */
    /* print("<th>birthYear</th>"); */
    /* print("<th>displayLanguage</th>"); */
    /* print("<th>defaultProgrammingLanguage</th>"); */
    /* print("<th>avatar</th>"); */
    /* print("<th>url</th>"); */
    print("<th>submissions</th>");
    print("<th>solved</th>");
    /* print("<th>accepted</th>"); */
    /* print("<th>wrongAnswer</th>"); */
    /* print("<th>timeLimit</th>"); */
    /* print("<th>memoryLimit</th>"); */
    /* print("<th>outputLimit</th>"); */
    /* print("<th>compileError</th>"); */
    /* print("<th>runtimeError</th>"); */
    print("<th>進捗</th>");
    print("</tr>");
    
    for ($i = 0; $i < count($student_id_number); $i++){
        /* print $student_id_number[$i]."\n"; */

        /* $json = file_get_contents('https://judgeapi.u-aizu.ac.jp/users/ksato'); */
        $url = "https://judgeapi.u-aizu.ac.jp/users/".$student_id_number[$i];
        $json = file_get_contents($url);
        $obj = json_decode($json);

        /* "id":"ksato","name":"stkn","affiliation":"ACY","registerDate":1538025192373,"lastSubmitDate":1538373763994,"policy":"private","country":"jp","birthYear":null,"displayLanguage":"Japanese","defaultProgrammingLanguage":"C++","avatar":null,"status":{"submissions":5,"solved":2,"accepted":5,"wrongAnswer":0,"timeLimit":0,"memoryLimit":0,"outputLimit":0,"compileError":0,"runtimeError":0},"url":null */
        $id = $obj->{'id'};
        $name = $obj->{'name'};
        $affiliation = $obj->{'affiliation'};
        $registerDate = $obj->{'registerDate'};
        $lastSubmitDate = $obj->{'lastSubmitDate'};
        $policy = $obj->{'policy'};
        $country = $obj->{'country'};
        $birthYear = $obj->{'birthYear'};
        $displayLanguage = $obj->{'displayLanguage'};
        $defaultProgrammingLanguage = $obj->{'defaultProgrammingLanguage'};
        $avatar = $obj->{'avatar'};
        $url = $obj->{'url'};

        $status_submissions = $obj->{'status'}->{'submissions'};
        $status_solved = $obj->{'status'}->{'solved'};
        $status_accepted = $obj->{'status'}->{'accepted'};
        $status_wrongAnswer = $obj->{'status'}->{'wrongAnswer'};
        $status_timeLimit = $obj->{'status'}->{'timeLimit'};
        $status_memoryLimit = $obj->{'status'}->{'memoryLimit'};
        $status_outputLimit = $obj->{'status'}->{'outputLimit'};
        $status_compileError = $obj->{'status'}->{'compileError'};
        $status_runtimeError = $obj->{'status'}->{'runtimeError'};

        /* print $id."\n";
        print $name."\n";
        print $affiliation."\n";
        print $registerDate."\n";
        print $lastSubmitDate."\n";
        print $policy."\n";
        print $country."\n";
        print $birthYear."\n";
        print $displayLanguage."\n";
        print $defaultProgrammingLanguage."\n";
        print $avatar."\n";
        print $url."\n";
        print $status_submissions."\n";
        print $status_solved."\n";
        print $status_accepted."\n";
        print $status_wrongAnswer."\n";
        print $status_timeLimit."\n";
        print $status_memoryLimit."\n";
        print $status_outputLimit."\n";
        print $status_compileError."\n";
        print $status_runtimeError."\n";
        print "<br>"; */


        print("<td>".$id."</td>");
        print("<td>".$name."</td>");
        /* print("<td>".$affiliation."</td>"); */
        /* print("<td>".$registerDate."</td>"); */
        print("<td>".$lastSubmitDate."</td>");
        /* print("<td>".date("Y年m月d日 H時i分s秒", $lastSubmitDate)."</td>"); */
        /* print("<td>".$policy."</td>"); */
        /* print("<td>".$country."</td>"); */
        /* print("<td>".$birtdYear."</td>"); */
        /* print("<td>".$displayLanguage."</td>"); */
        /* print("<td>".$defaultProgrammingLanguage."</td>"); */
        /* print("<td>".$avatar."</td>"); */
        /* print("<td>".$url."</td>"); */
        print("<td>".$status_submissions."</td>");
        print("<td>".$status_solved."</td>");
        /* print("<td>".$status_accepted."</td>"); */
        /* print("<td>".$status_wrongAnswer."</td>"); */
        /* print("<td>".$status_timeLimit."</td>"); */
        /* print("<td>".$status_memoryLimit."</td>"); */
        /* print("<td>".$status_outputLimit."</td>"); */
        /* print("<td>".$status_compileError."</td>"); */
        /* print("<td>".$status_runtimeError."</td>"); */
        print("<td>");
        for($j = 0; $j < $status_solved; $j++){
            print("★");
        }
        print("</td>");
        print("</tr>");

        

    }
    print("</table>");
?>

</BODY>
</HTML>
