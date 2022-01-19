<?php
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

  <div class="intro">
    <h2>Grèce antique, 515 avant JC.</h2>
    <p>
      Quelque part, au beau milieu des cyclades, à 500 kilomètres de Iolcos...
      Tranquillement installé sur un transat au bord de la piscine de votre villa, vous vous relaxez en regardant la mer…. Mais votre tranquillité est soudainement perturbée par la sonnerie agressive de votre téléphone. C’est votre big boss Jason. Il  veut vous voir tout de suite pour constituer la liste définitive des Argonautes avec lui.
      Mince, vous avez oublié de le prévenir de votre départ pour les îles ! Pas question d’envoyer un papyrus par coursier, cela prendrait des semaines. Pas de panique, vous allez réaliser une application web dynamique comprenant un formulaire de saisie où vous et Jason ajouterez en temps réel la liste des candidats. Un peu d’acronyme CRUD, le tout enrobé dans un joli CSS, et le tour est joué.
      Qui aurait cru que la technologie était aussi avancée en Grèce antique ?
    </p>
  </div>

  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" action="home" method="POST">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" autocomplete="off"/>
    <button type="submit">Envoyer</button>
  </form>

  <!-- Affichage des messages -->
  <div id="msg">
    <?php
    if (!empty($_GET['msg'])) {echo '<div class="success-msg">' . $_GET['msg'] . '</div>';
      }elseif (!empty($_GET['error-msg'])) {echo '<div class="error-msg">' . $_GET['error-msg'] . '</div>';
    }
    ?>
  </div>
  
  <!-- Member list -->

  <h2>Membres de l'équipage</h2>

  <ul class="member-list">
  <?php foreach ($result as $member) {
  ?> 
    <li class="member-item"><?= $member['name']?></li>
  <?php
  }
  ?>
  </ul>


</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>

</footer>

<script src="../assets/script.js"></script>
</body>
</html>