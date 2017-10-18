<?php
require_once '../include.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $_SESSION['webname']; ?>-欢迎来到幻想者的世界！</title>
  <?php
  include("../common/headlink.html");
  ?>
</head>

<body>
  <?php
  include("../common/navbar.php");
  ?>

<div class="container">
    <div>
      <h1 class="text-center">活动</h1>
      <hr>
    </div>
    <div class="jumbotron yunyou-bgblur yunyou-background">
      <div class="text-center">
         <img src="../image/matchImage/ninthLogo.png" alt="..." height="72px">
      </div>
      <hr>
      <h1>第九届上海高校幻想节 — <small style="color:#eee;">海事赛场</small></h1>
      <hr>
      <p>
      <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <a class="btn btn-primary btn-lg btn-block" href="../competition" title="群星回响">报名入口</a>
        <a class="btn btn-primary btn-lg btn-block" href="../competition/MatchMember.php" title="群星回响">人员情况</a>
      </div>
      </p>
    </div>
  </div>
</div>

<?php
include("../common/footer.php");
?>

</body>
</html>