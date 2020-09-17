<?php
//recup mois
function recupmonth()
{
    $test = new testgraph;
    $month = $test->getmonth();
    foreach ($month as $mois) {
        echo $mois['mois']." / ";
        echo $mois['year']." : ";
        echo $mois['prixcat']." / ";
        echo $mois['categorie']."<br>";
    }
}

function getcatyear()
{
    $test = new testgraph;
    $month = $test->getmonth();
    foreach ($month as $mois) {
        echo "'".$mois['categorie']."',";
    }
}
function getpriyear()
{
    $test = new testgraph;
    $month = $test->getmonth();
    foreach ($month as $mois) {
        echo $mois['prixcat'].",";
    }
}
function getpritotyear()
{
    $test = new testgraph;
    $yeartot = $test->prixtotyear();
    echo "'".$yeartot['prixtotal']."'";
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

function top5control()
{
    $test=new testgraph;
    $ventetop=$test->top5();
      require("view/IndexView.php");

}
