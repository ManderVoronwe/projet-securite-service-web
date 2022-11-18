<!DOCTYPE html>
<html lang="en">

<head>
  <title>MAKI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>




    .bord{
      border-bottom: 1px solid white;
      padding:5px;
      border-radius: 10px;
    }


    .fct-bouton{
      display: inline-flex;
      flex: 1 1 auto ;
    }

    .hov{
      color: white;
      text-align: end;
    }

    .hov:hover{
      color: yellow;
      text-decoration: underline;
    }

    .griid{
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

<body>


  <header>
  <nav class="navbar navbar-dark bg-dark">
    <div class="flexx container-fluid">
      <div class="navbar-header">
        <!-- <a class="navbar-brand" href="index.php">MAKI's Reviews 🍣</a> -->
        <a class="navbar-brand" href="index.php" style="font-size:1.5em;">MAKI's Reviews 🍣</a>

      </div>
      <a class="hov" href="index.php" style="font-size:1.5em;">Accueil</a>
      <!-- Log out menu starts -->
      <?php if (isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])) { ?>
        <!-- <ul class="nav navbar-nav">
          <li class=" active"><a href="user_add.php">ajouter un restaurant</a></li>
          <li class=" active"><a href="user-dash.php">Mes avis</a></li>
          <li class=" active"><a href="all_restaurant.php">Tous les restaurant</a></li>
        </ul> -->
<!-- 
        <ul class="nav navbar-nav mr-auto">
          <li><a href="user-dash.php"><span class="glyphicon glyphicon-user"></span>
              <?php echo $_SESSION['u_name']; ?>
 
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-link active"><a href="index.php">accueil</a></li>
          <li><a href="all_restaurant.php">Tous les restaurant</a></li> -->
          <li class="nav-item">
          <a class="hov" aria-current="page" href="all_restaurant.php" style="font-size: 1.5em; font-size: bolder;">Tous les restaurants</a>
        </li>

        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-link active"><a href="index.php">accueil</a></li>
          <li><a href="all_restaurant.php">Tous les restaurant</a></li> -->
          <li class="nav-item">
          <a class="hov" aria-current="page" href="all_restaurant.php" style="font-size: 1.5em; font-size: bolder;">ajouter un restaurant</a>
        </li>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-link active"><a href="index.php">accueil</a></li>
          <li><a href="all_restaurant.php">Tous les restaurant</a></li> -->
          <li class="nav-item">
          <a class="hov" aria-current="page" href="all_restaurant.php" style="font-size: 1.5em; font-size: bolder;">Mes avis</a>
        </li>

        </ul>

       
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <div class="fct-button">
        <a href="logout.php">

          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <p class='bord'style="color:white; font-size: 0.5em;"  >Deconnection</p>
          </button>
        </a>

        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Log out menu ends -->
      <?php } else { ?>

        <!-- Normal nav bar -->

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-link active"><a href="index.php">accueil</a></li>
          <li><a href="all_restaurant.php">Tous les restaurant</a></li> -->
          <li class="nav-item">
          <a class="hov" aria-current="page" href="all_restaurant.php" style="font-size: 1.5em; font-size: bolder;">Tous les restaurants</a>
        </li>

        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <div class="fct-button">
        <a href="signin.php">

          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <p class='bord'style="color:white; font-size: 0.5em;"  >Connection</p>
          </button>
        </a>
        <a class="fct-button" href="signup.php">


          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <p class='bord' style='color:white; font-size: 0.5em;'  >Créer un compte</p>
          </button>

        </a>
      </div>

        
        </li>
      
        <!-- <ul class="nav navbar-nav mr-auto">
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Creer un compte</a></li>
          <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span>Connection</a></li>
        </ul> -->


      <?php
      }
      ?>




    </div>
  </nav>
  </header>

</html>
