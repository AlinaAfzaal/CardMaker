<?php session_start();
?> 
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Card Maker</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <!-- Favicons -->
  <link href="/CardMaker/assets/img/favicon.png" rel="icon">
  <link href="/CardMaker/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/CardMaker/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/CardMaker/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="/CardMaker/index.php">CardMaker<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/CardMaker/index.php">Home</a></li>
          <li><a class="nav-link scrollto " href="/CardMaker/theme/cards.php">Cards</a></li>
          <li><a class="nav-link scrollto " href="/CardMaker/theme/printingPerson.php">Printers</a></li>
          <li><a class="nav-link scrollto" href="/CardMaker/theme/contact.php">Contact</a></li>
          <?php  if(isset($_SESSION['verified_user_id'])){?>
                  <?php if($_SESSION['role']=="printingperson"){ ?>
                    <li class="dropdown"><a style="text-decoration:none;" href="/CardMaker/panel/printingPerson/index.php?id=<?php echo $_SESSION['verified_user_id'] ?>"><span><?php echo $_SESSION['displayName'] ?></span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                        <li><a href="/CardMaker/theme/savedCards.php">Saved Cards</a></li>
                        <li><a href="/CardMaker/theme/favouriteCards.php">Favourite Cards</a></li>
                        <li><a href="/CardMaker/theme/myorders.php">My Orders</a></li>
                        <li><a href="/CardMaker/theme/logout.php">Logout</a></li>
                      </ul>
                    </li>
                  <?php }elseif($_SESSION['role']=="admin"){?>
                    <li class="dropdown"><a style="text-decoration:none;"href="/CardMaker/panel/admin/index.php?id=<?php echo $_SESSION['verified_user_id'] ?>"><span><?php echo $_SESSION['displayName'] ?></span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                        <li><a href="/CardMaker/theme/savedCards.php">Saved Cards</a></li>
                        <li><a href="/CardMaker/theme/favouriteCards.php">Favourite Cards</a></li>
                        <li><a href="/CardMaker/theme/myorders.php">My Orders</a></li>
                        <li><a href="/CardMaker/theme/logout.php">Logout</a></li>
                      </ul>
                    </li>
                  <?php }elseif($_SESSION['role']=="customer"){?>
                    <li class="dropdown"><a href="#"><span><?php echo $_SESSION['displayName'] ?></span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                        <li><a href="/CardMaker/theme/savedCards.php">Saved Cards</a></li>
                        <li><a href="/CardMaker/theme/favouriteCards.php">Favourite Cards</a></li>
                        <li><a href="/CardMaker/theme/myorders.php">My Orders</a></li>
                        <li><a href="/CardMaker/theme/logout.php">Logout</a></li>
                      </ul>
                    </li>
                <?php }}else{?>
                <li><a class="nav-link scrollto" href="/CardMaker/theme/login.php">Login</a></li>
          <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


