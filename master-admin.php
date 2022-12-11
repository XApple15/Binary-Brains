<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin-login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MASTER ADMIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .row{ }
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">MASTER ADMIN Hi, <b><?php echo htmlspecialchars($_SESSION["username"]);?></b>. ADMIN.</h1>
    <h2> You have  <?php  echo $_SESSION["points"];?> points</h2>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    <br>
    <br>
    <br>
    <!-- interogare dupa nume de utilizator si editare date daca e posibil-->
    <?Php
require "config.php";
$query="select id, name, price,image FROM vouchers ";


if ($result_set = $link->query($query)) {
while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
    ?>
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="/images/$row['image']" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['id'],$row['name']; ?></h5>
    <p class="card-text"><?php echo $row['price']; ?></p>
    <a href="#" class="btn btn-primary" >Ia cuponul</a>
  </div>
</div>
          
<?php
}
 $result_set->close();
}
?>
    <!-- selectare clasa produs -->
    
</body>
</html>

