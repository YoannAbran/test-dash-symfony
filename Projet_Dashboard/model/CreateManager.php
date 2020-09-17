<?php
class CreateManager extends Database
{
    public function addnew($nom, $reference, $date_achat, $date_garantie, $prix, $categorie, $conseil, $direct, $ecommerce)
    {
        $conn = $this->dbConnect();
        $add = $conn->prepare("INSERT INTO livres (nom, reference, date_achat, date_garantie, prix,conseil, photo_ticket, photo,categorie) VALUES (:nom,:reference,:date_achat,:date_garantie,:prix,:conseil,:photo_ticket,:photo,:categorie) ");

        $ticketname = input($_FILES['ticket']['name']);
        $photoname = input($_FILES['photo']['name']);

        // Location
        $target_ticket = 'public/img/'.$ticketname;
        $target_photo = 'public/img/'.$photoname;
        // file extension
        $file_extension_ticket = pathinfo($target_ticket, PATHINFO_EXTENSION);
        $file_extension_photo = pathinfo($target_photo, PATHINFO_EXTENSION);
        $file_extension_ticket = strtolower($file_extension_ticket);
        $file_extension_photo = strtolower($file_extension_photo);
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg","PNG");
        if (in_array($file_extension_ticket, $valid_extension) && in_array($file_extension_photo, $valid_extension)) {
            // Upload file
            if (move_uploaded_file($_FILES['ticket']['tmp_name'], $target_ticket) && move_uploaded_file($_FILES['photo']['tmp_name'], $target_photo)) {
            }
        }
        $add->bindParam(':nom', $nom, PDO::PARAM_STR);
        $add->bindParam(':reference', $reference, PDO::PARAM_STR);
        $add->bindParam(':date_achat', $date_achat);
        $add->bindParam(':date_garantie', $date_garantie);
        $add->bindParam(':prix', $prix);
        $add->bindParam(':conseil', $conseil, PDO::PARAM_STR);
        $add->bindParam(':photo_ticket', $target_ticket, PDO::PARAM_STR);
        $add->bindParam(':photo', $target_photo, PDO::PARAM_STR);
        $add->bindParam(':categorie', $categorie, PDO::PARAM_STR);

        $addnew = $add->execute();

        $query="INSERT INTO lieux_achat (vente_direct,ecommerce,id_livre) VALUES(?,?,LAST_INSERT_ID())";
        $addnew = $conn->prepare($query);
        $addnew->execute(array($direct,$ecommerce));
        return $addnew;
    }
}
