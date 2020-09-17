
<?php
  ob_start();
  session_start();
  session_regenerate_id();
  $id=(int) abs($_GET['id']);
  foreach ($visuals as $visual) {
  }

?>

<div id="particles-js"></div>
<div id=container>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href=public/css/editStyle.css />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Basic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">

    <h1>Modifier un produit</h1>

    <div id='formandimages' class="row">

    <div id='formulaires' class='col'>
    <form name="edition" enctype ="multipart/form-data" method="post" action="index.php?action=edit&id=<?= $id ?>">
      <ul id=editform>

        <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Nom</div>
        </div>
        <input type="text" class="form-control" name="nom" value="<?php echo $visual['nom']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Date d'achat</div>
        </div>
        <input type="date" class="form-control" name="date_achat" value="<?php echo $visual['date_achat']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Date de garantie</div>
        </div>
        <input type="date" class="form-control" name="date_garantie" value="<?php echo $visual['date_garantie']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Prix</div>
        </div>
        <input type="text" class="form-control" name="prix" value="<?php echo $visual['prix']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Conseil</div>
        </div>
        <input type="text" class="form-control" name="conseil" value="<?php echo $visual['conseil']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Catégorie</div>
        </div>
        <input type="text" class="form-control" name="categorie" value="<?php echo $visual ['categorie']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Référence</div>
        </div>
        <input type="text" class="form-control" name="reference" value="<?php echo $visual ['reference']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Id</div>
        </div>
        <input type="text" class="form-control" name="id" value="<?php echo $visual ['id']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Photo Ticket</div>
        </div>
        <input class="form-control" type="file" accept="image/jpeg, image/png, image/jpg" name="photo_ticket" value=""/></p></li>
        <input type="hidden" name="old_ticket" value="<?php echo $visual['photo_ticket']?>"/>
      </div>
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Photo</div>
        </div>
        <input class="form-control" type="file" accept="image/jpeg, image/png, image/jpg" name="photo" value="<?php echo $visual['photo']?>"/><p></li>
        <input type="hidden"  name="old_photo" value="<?php echo $visual['photo']?>"/>
      </div>
    </div>

    <div class="d-flex justify-content-center">
        <li><p><input id='editbutton' class='buttons btn btn-primary ' type="submit" name="edit" value="Edit"/><p><li>
    </div>
      </ul>

    </form>
  </div>
<!-- displaying images from the table -->

    <div id=imagecontainer class="col row">
      <div id='image1' class='p-1 d-flex justify-content-center align-items-center col col-lg-6'>
        <img src="<?php echo $visual['photo_ticket']?> ">
      </div>
      <div id=image2 class='p-1 d-flex justify-content-center align-items-center col col-lg-6'>
        <img src="<?php echo $visual['photo']?> ">
      </div>
    </div>
</div>


<script type="text/javascript" src="public/script/particles.js"></script>
<script type="text/javascript" src="public/script/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<?php
$content = ob_get_clean();
 require('template.php');
