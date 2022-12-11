<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <title>Recycle&Win</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Font Awesome -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
    <script src="https://kit.fontawesome.com/27b6dfd5eb.js" crossorigin="anonymous"></script>


    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>



    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>

<body>



  <section class="colored-section" id="title">

    <div class="container-fluid">

      <!-- Nav Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark">

        <a class="navbar-brand" href="index.html">Recycle&Win</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="concept-page.html">Concept</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="account-page.html">Contul meu</a>
            </li>
          </ul>

        </div>
      </nav>


      <!-- Title -->

      <div class="row">

        <div class="col-lg-6">
          <h1 class="big-heading">Ajuta-ne sa schimbam planeta!</h1>
                      <button type="button" class="btn btn-dark btn-lg download-button"><i class="fab fa-apple"></i>
              Download</button>
            <button type="button" class="btn btn-outline-light btn-lg download-button"><i
                class="fab fa-google-play"></i>
              Download</button>

        </div>

        <div class="col-lg-6">
            <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title rounded bg-success" style="padding:5px;">Bine ai venit, <?php echo htmlspecialchars($_SESSION["username"]);?>!</h5>
                <img class="card-img-top" src="images/qrcode.jpg" alt="Card image cap">
                <p class="card-text h5 text-info" style="padding:2px; mmargin:10px;">Ai <?php  echo $_SESSION["points"];?> puncte.</p>
                <!-- <a href="#" class="card-link">Card link</a> -->
                    <a href="reset-password.php" class="bg-success card-link text-white rounded" style="padding:5px;" >Reset Your Password</a>
                    <a href="logout.php" class="bg-success card-link text-white rounded" style="padding:5px;">Sign Out</a>
                <!-- <a href="#" class="card-link">Another link</a> -->
            </div>
            </div>
        </div>

        

      

    </div>

  </section>










<div style=" padding-top: 32px;width=100%; display:flex; flex-direction: column ; align-items: center; gap :32px;">



<?Php
require "config.php";
$query="select id, name, price,image FROM vouchers";


if ($result_set = $link->query($query)) {
while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
    $imgPath = "./images/" . $row['image'];
    ?>
    
    
    <div class="card" style="width: 30rem; ">
        <img class="card-img-top" src=<?php echo $imgPath; ?> alt="Card image cap" style="height: 400px; object-fit: cover; object-position:top;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['id'];?>  . <?php echo $row['name']; ?> </h5>
                <p class="card-text"><?php echo $row['price']; ?> points</p>
                <a href="#" class="btn btn-primary" >Ia cuponul</a>
            </div>
    </div>

<?php
}
 $result_set->close();
}
?>

</div>

</body>
</html>





