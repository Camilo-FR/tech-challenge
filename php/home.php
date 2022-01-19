<?php

// session_start();

// $newsession = '';

// $_SESSION["user"] = $newsession; 

require_once('connect.php');
require('add.php');

$db;
connexion($db);

// On récupère les informations dans notre table

$sql = 'SELECT *, members.id as id, members.name as name FROM `members` ';

// On prépare la requête puis on l'éxécute

$query = $db->prepare($sql);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
    <title>My Crew</title>
</head>
<body>

<div class="burger-menu">
    <i class="fas fa-bars"></i>
</div>
<header id="nav">
  <nav>
    <h1>
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
  </nav>
</header>

<main>
<div class="lottie-svg">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_4iojwfsa.json"  background="transparent"  speed="1"  style="width: 400px; height: 300px;"  loop  autoplay></lottie-player>
</div>

<a href="#" id="back-to-top"></a>
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" action="home" method="POST">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" autocomplete="off" />
    <button type="submit">Envoyer</button>
  </form>

  <!-- Affichage des messages -->
  <div id="msg">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    echo '<div class="error-msg" role="alert">
                ' . $_SESSION['erreur'] . '
              </div>';
                    $_SESSION['erreur'] = "";
                }

                if (!empty($_SESSION['message'])) {
                    echo '<div class="success-msg" role="alert">
                ' . $_SESSION['message'] . '
              </div>';
                    $_SESSION['message'] = "";
                }
                ?>
    </div>
  
  <!-- Member list -->

  <h2>Membres de l'équipage</h2>
  <?php foreach ($result as $member) {
  ?> 
  <ul class="member-list">
    <li class="member-item"><?= $member['name']?></li>
  </ul>
  <?php
  }
  ?>

</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>

</footer>

<script src="../assets/script.js"></script>
</body>
</html>