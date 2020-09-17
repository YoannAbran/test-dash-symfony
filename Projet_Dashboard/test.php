<?php
require('controller/controller.php');


class testgraph extends Database
{
    //work, recupere la somme des prix pae categorie
    public function testcat()
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT ROUND(SUM(prix),2) AS prixcat, categorie FROM livres GROUP BY categorie ");
        $sql->execute();
        $prix=$sql->fetchAll();
        return $prix;
    }
    //work, recupere le prix total des livres
    public function testtot()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT ROUND(SUM(prix),2) AS prixtotal FROM livres");
        $sql->execute();
        $prixtot=$sql->fetch();
        return $prixtot;
    }
    //recupere combien et le nombre de livre par nom
    public function teststock()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT COUNT(*) AS nomC, nom FROM livres
GROUP BY nom");
        $sql->execute();
        $nbrenom=$sql->fetchAll();
        return $nbrenom;
    }
    public function nmbreachat()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT COUNT(*) AS achat FROM livres
");
        $sql->execute();
        $nbrachat=$sql->fetchAll();
        return $nbrachat;
    }

    //recup tout dans la table vente_direct
    public function getnomvente()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT * FROM vente");
        $sql->execute();
        $nomvente=$sql->fetchAll();
        return $nomvente;
    }

    //insert nouveau livre dans la table vente update si le livre existe deja
    public function insertvente($nom, $stock)
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("INSERT INTO vente (nom,stock,prix_vente,nbre_vente) VALUES (:nom,:stock,:prix_vente,:nbre_vente)
  ON DUPLICATE KEY UPDATE stock = :stock, prix_vente = :prix_vente, nbre_vente = :nbre_vente");
        $prix_vente=rand(6, 12);
        $nbrevente=rand(3, 20);
        $add=$sql->execute(array(
      ':nom'=>$nom,
      ':stock'=>$stock,
      ':prix_vente'=>$prix_vente,
      ':nbre_vente'=>$nbrevente
  ));
        return $add;
    }

    //recup et calcul le nombre de vente et le prix total des vente par livre
    public function gettotalvente()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT ROUND(SUM(prix_vente),2) AS prix_vente,ROUND(SUM(nbre_vente),2) AS nbre_vente FROM vente");
        $sql->execute();
        $totalvente=$sql->fetch();
        return $totalvente;
    }
    //recup mois annee table livres
    public function getmonth()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT MONTH(date_achat) AS mois, YEAR(date_achat) AS year,ROUND(SUM(prix),2) AS prixcat, categorie FROM livres WHERE date_achat BETWEEN '2020-01-01' AND '2020-12-31' GROUP BY mois ");
        $sql->execute();
        $month=$sql->fetchAll();
        return $month;
    }
    public function prixtotyear()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT ROUND(SUM(prix),2) AS prixtotal FROM livres WHERE date_achat BETWEEN '2020-01-01' AND '2020-12-31'");
        $sql->execute();
        $prixtotyear=$sql->fetch();
        return $prixtotyear;
    }
}//fin CLASS

//recup mois
function recupmonth()
{
    $test = new testgraph;
    $month = $test->getmonth();
    foreach ($month as $mois) {
        echo " *".$mois['mois']." / ";
        echo $mois['year']." : ";
        echo $mois['prixcat']." / ";
        echo $mois['categorie']."<br>";
    }
}
//recup le nombre de vente total
function nbretotalvente()
{
    $test=new testgraph;
    $totalvente=$test->gettotalvente();
    echo $totalvente['nbre_vente'];
}
function nbretotalachat()
{
    $test=new testgraph;
    $nbreachat=$test->nmbreachat();
    echo $nbreachat['achat'];
}

// recup le prix total des vente
function prixtotalvente()
{
    $test=new testgraph;
    $totalvente=$test->gettotalvente();
    echo $totalvente['prix_vente']*$totalvente['nbre_vente'];
}

//recup le prix total d'achat
function testctotgraph()
{
    $test=new testgraph;
    $prix=$test->testtot();
    echo $prix['prixtotal'];
}

//recup les categorie
function testcatgraph()
{
    $test=new testgraph;
    $prix=$test->testcat();
    foreach ($prix as $pri) {
        echo "'".$pri['categorie']."',";
    }
}

//recup prix total d'achat par categorie
function testprix()
{
    $test=new testgraph;
    $prix=$test->testcat();
    foreach ($prix as $pri) {
        echo $pri['prixcat'].",";
    }
}

// liste par nom + nombre de livre avec le meme nom
function nbrenom()
{
    $test=new testgraph;
    $noms=$test->teststock();
    foreach ($noms as $nom) {
        echo $nom['nom']."/";
        echo $nom['nomC'].";";
    }
}

//recup tout dans la table vente
function nomvente()
{
    $test=new testgraph;
    $nomvente=$test->getnomvente();
    foreach ($nomvente as $vente) {
        echo  $vente['nom'].",";
        echo $vente['stock'].",";
        echo $vente['prix_vente'].",";
        echo $vente['nbre_vente'].",";
        echo $vente['prix_vente']*$vente['nbre_vente']."/";
    }
}

//recup le nom des livre ds la table vente
function labelvente()
{
    $test=new testgraph;
    $nomvente=$test->getnomvente();
    foreach ($nomvente as $vente) {
        echo  "'".$vente['nom']."',";
    }
}

//recup le nombre de vente
function nbrevente()
{
    $test=new testgraph;
    $nomvente=$test->getnomvente();
    foreach ($nomvente as $vente) {
        echo  $vente['nbre_vente'].",";
    }
}

//recupère le prix total des vente par livre
function vente()
{
    $test=new testgraph;
    $nomvente=$test->getnomvente();
    foreach ($nomvente as $vente) {
        echo  $vente['prix_vente']*$vente['nbre_vente'].",";
    }
}
function getpritotyear()
{
    $test = new testgraph;
    $yeartot = $test->prixtotyear();
    echo "'".$yeartot['prixtotal']."'";
}
//fonction pour mettre a jour table vente
// function addvente(){
//   $test=new testgraph;
//   $noms=$test->teststock();
//   $nomvente=$test->getnomvente();
//   foreach ($nomvente as $nomv) {
//     $nomve=$nomv['nom'];
//   }
// foreach ($noms as $vente) {
//   $nom=$vente['nom'];
//   $stock=$vente['nomC'];
//   $test->insertvente($nom,$stock);
// }
// }


// echo testprix()."<br>";
// echo testcatgraph()."<br>";
// echo testctotgraph()."<br>";
echo nomvente()."<br>";
// echo nbrenom()."<br>";
// addvente();
echo nbretotalvente()."<br>";
echo prixtotalvente()."<br>";
echo recupmonth()."<br>";
echo getpritotyear();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Yoann Abran, Kévin Nguma, Warrenn Maunier">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3bd5358b64.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
<div class="container-fluid d-flex">
  <div class="container">
    <canvas id="myChart" ></canvas>
  </div>
  <div class="container">
    <canvas id="myChart2" ></canvas>
  </div>
  <div class="container">
    <canvas id="myChart3" ></canvas>
  </div>
</div>


<script>

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
// The type of chart we want to create
type: 'pie',
// The data for our dataset
data: {
  labels: [<?php echo testcatgraph();?>],/*'total'*/
  datasets: [{
      label: 'cout',
      data: [<?php echo testprix(); ?>],/*echo testctot();*/
      backgroundColor:
          poolColors([<?php echo testcatgraph(); ?>].length),

      borderColor:
          poolColors([<?php echo testcatgraph(); ?>].length),


  }]
},
// Configuration options go here
options: {}
});

var ctx = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx, {
// The type of chart we want to create
type: 'doughnut',
// The data for our dataset
data: {
  labels: [<?php echo labelvente();?>],/*'total'*/
  datasets: [{
      label: 'nombre de vente',
      data: [<?php echo nbrevente(); ?>],/*echo testctot();*/
      backgroundColor:
          poolColors([<?php echo nbrevente(); ?>].length),

      borderColor:
          poolColors([<?php echo nbrevente(); ?>].length),


  }]
},
// Configuration options go here
options: {}
});

var ctx = document.getElementById('myChart3').getContext('2d');
var chart = new Chart(ctx, {
// The type of chart we want to create
type: 'bar',

// The data for our dataset
data: {
  labels: [<?php echo labelvente();?>],/*'total'*/
  datasets: [{
      label: 'total des vente en €',
      data: [<?php echo vente(); ?>],/*echo testctot();*/
      backgroundColor: poolColors([<?php echo vente(); ?>].length),
      borderColor:
          poolColors([<?php echo vente(); ?>].length),

  }]
},

// Configuration options go here
options: {}
});
//random color rgba
function dynamicColors() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + ", 0.5)";
}
//color with array.lenght for graph
function poolColors(a) {
    var pool = [];
    for(i = 0; i < a; i++) {
        pool.push(dynamicColors());
    }
    return pool;
}
</script>
<script type="text/javascript">
var testcat = <?php echo testcatgraph();?>
var testprix = <?php echo testprix(); ?>
var labelvente = <?php echo labelvente();?>
var nbrevente = <?php echo nbrevente(); ?>
var vente = <?php echo vente(); ?>
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
