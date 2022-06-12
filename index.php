<?php
  /* cpuのカードを決定する */
  if (empty($_POST)){
    $cpuNum = rand(1,13);
    $cpuType = rand(1,4);
  } else {
    $cpuNum = $_POST['cpuNum'];
    $cpuType = $_POST['cpuType'];
  }

 $cpuImg = $cpuNum.'-'.$cpuType;

  //cpuのカードの強さがPOST送信されていたらその値を変数に格納する
  // if(){
  //   //cpuのカードの強さを乱数で決定し、変数に格納する
  // } else {
  //   $cpuNum  = $_POST['cpuNum'];
  //   $cpuType = $_POST['cpuType'];
  // }

  /* 表示するカード画像を決定する */
  
  $playerImg = 'back-of-cards';
  $subTitle  = 'HIGHER? OR LOWER?';

  /* Highが選択された場合 */
  if(isset($_POST['highSet'])){
    //Playerのカードの強さを乱数で決定し、変数に格納する
    $playerNum = rand(1,13);
    $playerType = rand(1,4);
    $playerImg = $playerNum.'-'.$playerType;
    //変数に格納した値をもとにカードのファイル名を変数に格納する

    //cpuとplayerとの勝敗を条件分岐で決定する
    if($cpuNum<$playerNum){
         
      $subTitle = "You Win!";
      $link = new mysqli('localhost','root','root','mydb');
      mysqli_set_charset($link, 'utf-8');
      $result = mysqli_query($link,'INSERT INTO tbl_match_history(win,lose) VALUES (1,0)');
      $link->close();

      }else{
        $subTitle = "You Lose.. Try again!!";
        $link = new mysqli('localhost','root','root','mydb');
        mysqli_set_charset($link, 'utf-8');
        $result = mysqli_query($link,'INSERT INTO tbl_match_history(win,lose) VALUES (0,1)');
        $link->close();
      }

    //cpuとplayerとの勝敗とHighの予想が一致しているから条件分岐で決定する

    /* db接続を行う */
    // $link = new mysqli(/* 各自設定する */);
    // mysqli_set_charset($link, 'utf-8');

    //DBにデータをINSERTする

    //$subtitleを勝ちor負けがわかるよう再代入する

    $link->close();
  }

    /* Lowが選択された場合 */
    if(isset($_POST['lowSet'])){
      $playerNum = rand(1,13);
      $playerType = rand(1,4);
      $playerImg = $playerNum.'-'.$playerType;
      //Playerのカードの強さを乱数で決定し、変数に格納する
      //変数に格納した値をもとにカードのファイル名を変数に格納する

      //cpuとplayerとの勝敗を条件分岐で決定する
      if($cpuNum>$playerNum){
         
        $subTitle = "You Win!";
        $link = new mysqli('localhost','root','root','mydb');
        mysqli_set_charset($link, 'utf-8');
        $result = mysqli_query($link,'INSERT INTO tbl_match_history(win,lose) VALUES (1,0)');
        $link->close();

        }else{
        
          $subTitle = "You Lose.. Try again!!";
          $link = new mysqli('localhost','root','root','mydb');
          mysqli_set_charset($link, 'utf-8');
          $result = mysqli_query($link,'INSERT INTO tbl_match_history(win,lose) VALUES (0,1)');
          $link->close();

        }

      //cpuとplayerとの勝敗とHighの予想が一致しているから条件分岐で決定する

      /* db接続を行う */
      // $link = new mysqli(/* 各自設定する */);
      // mysqli_set_charset($link, 'utf-8');

      //DBにデータをINSERTする

      //$subtitleを勝ちor負けがわかるよう再代入する

      $link->close();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no,email=no,address=no">
<title>High&Low</title>
<meta name="description" content="High&Lowのゲーム画面です">
<link rel="stylesheet" href="./css/extra.css">

</head>
<body>

<main>
  <section class="title-section">
    <h1 class="title-section-h1"><img src="./common/img/others/card_game.png" alt="画像ありません"></h1>
    <p class="title-section-result"><?php echo $subTitle; ?></p>
  </section>
  <div class="contents">
    <div class="sp-cards">
      <div class="panel sp-sides sp-slide-top">
        <div class="panel-image-wrapper sp-image-left"><img src="./common/img/_new_trump/<?php echo $cpuImg; ?>.png" alt="cpu画像" width="300" height="450"></div>
      </div>
      <form method="post" action="" method="post" class="pc-only">
        <div class="panel">
          <div class="panel-image-wrapper sp-image-right"><img src="./common/img/_new_trump/<?php echo $playerImg; ?>.png" alt="player画像" width="300" height="450"></div>
          <div class="btn-wrapper sp-button pc-only">
            <input type="hidden" name="cpuNum" value="<?php echo $cpuNum ?>">
            <input type="hidden" name="cpuType" value="<?php echo $cpuType ?>">
            <input type="submit" class="btn opt-red" name="highSet" value="">
            <input type="submit" class="btn opt-green" name="lowSet" value="">
          </div>
        </div>
      </form>

      <div class="panel sp-sides sp-slide-top sp-only">
        <div class="panel-image-wrapper sp-image-right"><img src="./common/img/_new_trump/<?php echo $playerImg; ?>.png" alt="player画像" width="300" height="450"></div>
      </div>
    </div>
    <form method="post" action="" method="post" class="sp-sides sp-only">
      <div class="btn-wrapper">
        <input type="hidden" name="cpuNum" value="<?php echo $cpuNum ?>">
        <input type="hidden" name="cpuType" value="<?php echo $cpuType ?>">
        <input type="submit" class="btn opt-red" name="highSet" value="">
        <input type="submit" class="btn opt-green" name="lowSet" value="">
        <p>test</p>
      </div>
    </form>
    
    <!-- <div class="btn-wrapper sp-only">
          <input type="hidden" name="cpuNum" value="<?php echo $cpuNum ?>">
          <input type="hidden" name="cpuType" value="<?php echo $cpuType ?>">
          <input type="submit" class="btn opt-red" name="highSet" value="">
          <input type="submit" class="btn opt-green" name="lowSet" value="">
    </div> -->
  </div>
  <a href="result.php" class="history">Score Board</a>
</main>

<script src="./js/libs/libs.js"></script>
<script src="./js/all.js"></script>
</body>
</html>