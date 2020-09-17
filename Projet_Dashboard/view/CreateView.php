<?php ob_start();
session_start();
session_regenerate_id();?>

<div id="particles-js"></div>
<div id=container>

<form class="container-fluid pt-5 d-flex flex-column align-items-center" action='<?php  htmlspecialchars('index.php?action=insertnew')?>' method="post" enctype='multipart/form-data'>
<link rel='stylesheet' type='text/css' href=public/css/createStyle.css />
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">

  <h1 class='d-flex justify-content-center'>Ajouter un produit</h1>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputNom">Nom</label>
      <input type="text" class="form-control" id="" name="nom" required>
    </div>
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputReference">Référence</label>
      <input type="text" class="form-control" name="reference" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label  class="d-flex justify-content-center" for="inputDate_achat">Date d'achat</label>
    <input type="date" class="form-control" placeholder="" name="date_achat" required>
  </div>
  <div class="form-group col-md-6">
    <label class="d-flex justify-content-center" for="inputdate_garantie">Date de garantie</label>
    <input type="date" class="form-control" placeholder="" name="garantie" required>
  </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputlieux_achat_select">Lieux d'achat</label>
      <select class="form-control" name="lieux_achat" required>
        <option selected>Choose...</option>
        <option>vente direct</option>
        <option>e-commerce</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputlieux_achat">Adresse ou URL</label>
      <input type="text" class="form-control" name="adresse"  required>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputprix">Prix</label>
      <input type="number" step="0.01" class="form-control" name="prix" required>
    </div>
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputcategorie">Catégorie</label>
      <input type="text" class="form-control" name="categorie" required>
    </div>
    </div>
    <div style="margin-top:40px;" class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputconseil">Conseil d'utilisation</label>
      <textarea class="form-control" name="conseil" rows="8" cols="80" required></textarea>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputphoto_ticket">Photo du ticket de caisse</label>
      <input type='file' name='ticket' required/>
    </div>
    <div class="form-group col-md-6">
      <label class="d-flex justify-content-center" for="inputphoto">Photo</label>
      <input type='file' name='photo' required/>
    </div>
    </div>


  <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
</form>

<script type="text/javascript" src="public/script/particles.js"></script>
<script type="text/javascript" src="public/script/app.js"></script>

<?php
$content = ob_get_clean();
 require('template.php');
