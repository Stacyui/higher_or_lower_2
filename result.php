<?php

$link = new mysqli('localhost','root','root','mydb');
mysqli_set_charset($link, 'utf-8');
$result = mysqli_query($link,"SELECT * FROM `tbl_match_history`");
$link->close();
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no,email=no,address=no">
<title>High&Low</title>
<meta name="description" content="high&lowの対戦履歴画面です">
<link rel="stylesheet" href="./css/extra.css">

</head>
<body>

<main>
  <section class="title-section">
    <h1 class="title-section-h1">Higher or Lower</h1>
    <p class="title-section-result">Score Board</p>
  </section>

  <div class="history-table" style="margin:0px;padding:0px;" align="center">
    <table width="98%" style="border-collapse: collapse;border:1px solid #000000;background-color:#FFFFFF;color:#000000;text-align:left;">
      <tbody>
        <tr>
          <th style="border:1px solid #000000;background-color:#808080;color:#FFFFFF;text-align:center;"></th>
          <th style="border:1px solid #000000;background-color:#808080;color:#FFFFFF;text-align:center;">win</th>
          <th style="border:1px solid #000000;background-color:#808080;color:#FFFFFF;text-align:center;">lose</th>
        </tr>
<?php
        while($row = $result->fetch_assoc()){
          if($row['win']>=1){
            $winshow = "○";
            $loseshow = "×";
          }else{
            $winshow = "×";
            $loseshow = "○";
          }

        echo<<<eof
        <tr>
          <td style="border:1px solid #000000;text-align:left;">Round{$row['id']}</td>
          <td style="border:1px solid #000000;text-align:left;">{$winshow}</td>
          <td style="border:1px solid #000000;text-align:left;">{$loseshow}</td>
        </tr>
        eof;
      }
?>
      </tbody>
    </table>
  </div>

  <a href="high_and_low_index.php" class="history">Back to main page</a>

</main>

</body>
