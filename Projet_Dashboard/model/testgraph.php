<?php



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
        $sql = $db->prepare("SELECT ROUND(SUM(prix_vente),2) AS prix_vente,SUM(nbre_vente) AS nbre_vente FROM vente");
        $sql->execute();
        $totalvente=$sql->fetch();
        return $totalvente;
    }

    //recup mois annee table livres
    public function getmonth()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT MONTH(date_achat) AS mois, YEAR(date_achat) AS year,ROUND(SUM(prix),2) AS prixcat, categorie FROM livres WHERE date_achat BETWEEN '2020-01-01' AND '2020-12-31' GROUP BY categorie ");
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

    public function nmbreachat()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT COUNT(*) AS achat FROM livres
");
        $sql->execute();
        $nbrachat=$sql->fetch();
        return $nbrachat;
    }

    public function top5()
    {
        $db=$this->dbConnect();
        $sql = $db->prepare("SELECT *  FROM vente ORDER BY nbre_vente DESC LIMIT 10
");
        $sql->execute();
        $top5=$sql->fetchAll();
        return $top5;
    }
}//fin CLASS
