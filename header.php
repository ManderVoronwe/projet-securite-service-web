<!DOCTYPE html>
<html lang="en">

<head>
  <title>MAKI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f6df1cce00.js" crossorigin="anonymous"></script>

  <style>
    .bord {
      border-bottom: 1px solid white;
      padding: 5px;
      border-radius: 10px;
    }


    .fct-bouton {
      display: inline-flex;
      flex: 1 1 auto;
    }

    .hov {
      color: white;
      text-align: end;
    }

    .hov:hover {
      color: yellow;
      text-decoration: underline;
    }

    .griid {
      display: grid;
      grid-template-columns: 3fr 3fr 1fr;
    }
  </style>

</head>
<!--  header ends-->

<?php
include "database.php";
include "session.php";
?>
<!-- Navigation bar starts from here -->

<body class = "body" style="min-height : 100vh">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="width: 100%; margin: 0px;">
    <a class="navbar-brand float-right" href="index.php" style="font-size:1.5em;">MAKI's Reviews 🍣</a>
    <!-- Log out menu starts -->
    <div class="container-fluid">
      <?php if (isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])) { ?>

        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link hov" href="index.php" style="font-size: 1.5em; font-size: bolder;">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hov" aria-current="page" href="all_restaurant.php" style="font-size: 1.5em; font-size: bolder;">Tous les restaurants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hov" aria-current="page" href="user_add.php" style="font-size: 1.5em; font-size: bolder;">Ajouter un restaurant</a>
          </li>
          <?php
            $sql = "SELECT * FROM RESTAURANT WHERE r_by  = " . $_SESSION['u_id'];
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
          ?>
            <li class="nav-item">
              <a class="nav-link hov" aria-current="page" href="user-dash.php" style="font-size: 1.5em; font-size: bolder;">Mes restaurants</a>
            </li>
          <?php }
          $sql = "SELECT * FROM REVIEW WHERE r_by  = " . $_SESSION['u_id'];
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0) {
          ?>
          <li class="nav-item">
            <a class="nav-link hov" aria-current="page" href="user-review.php" style="font-size: 1.5em; font-size: bolder;">Mes avis</a>
          </li>
          <?php } ?>

        </ul>




        <div class="d-flex">
          <a href="logout.php" type="bord" class="btn btn-default btn-lg ">
            <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>

            <p class='bord' style="color:white; font-size: 1.5em;">Déconnexion</p>
          </a>
        </div>

        <!-- Log out menu ends -->
      <?php } else { ?>
        <!-- Normal nav bar -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link hov" aria-current="page" href="all_restaurant.php" style="font-size: 1.5em; font-size: bolder;">Tous les restaurants</a>
          </li>

        </ul>



        <div class="d-flex">

          <a href="signup.php" type="bord" class="btn btn-default btn-lg ">
            <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>

            <p class='bord' style="color:white; font-size: 1.5em;">Créer un compte</p>

          </a>

          <a href="signin.php" type="bord" class="btn btn-default btn-lg ">
            <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>

            <p class='bord' style="color:white; font-size: 1.5em;">Se connecter</p>
          </a>
        </div>
      <?php } ?>



    </div>

  </nav>