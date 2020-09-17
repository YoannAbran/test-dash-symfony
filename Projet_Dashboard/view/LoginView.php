
<?php
ob_start();
session_start();
session_regenerate_id(); ?>
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
<link rel='stylesheet' type='text/css' href=public/css/loginStyle.css />

<div id="particles-js"></div>
<div id=container>


<form class="box" action="<?php  htmlspecialchars('index.php?action=login')?>" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<div class="m-4 d-flex justify-content-center">

<input type="text" class="box-input" name="user" placeholder="Nom d'utilisateur" required>
<input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
<input type="submit" value="Connexion " name="submit" class="box-button">
</div>

<script type="text/javascript" src="public/script/particles.js"></script>
<script type="text/javascript" src="public/script/app.js"></script>
<?php
$content = ob_get_clean();
 require('template.php');
