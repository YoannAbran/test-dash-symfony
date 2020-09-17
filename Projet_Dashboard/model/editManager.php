<!-- UPDATE `jeux_video`
SET developpeur = 'arc_system'
WHERE id='7' -->

<?php

// Table Editor


class editManager extends Database
{
    public function selectAll()
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT *
  FROM livres");
        $sql->execute();
        $rows = $sql->fetchAll();
        return $rows;
    }


    public function editor($id, $nom, $reference, $date_achat, $date_garantie, $prix, $conseil, $categorie)
    {
        $conn = $this->dbConnect();
        $stmt =$conn->prepare("UPDATE `livres` SET
     nom = :nom,
     reference = :reference,
     date_achat = :date_achat,
     date_garantie = :date_garantie,
     prix = :prix,
     conseil = :conseil,
     categorie = :categorie
     WHERE id = :id");

    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':reference',$reference);
    $stmt->bindParam(':date_achat',$date_achat);
    $stmt->bindParam(':date_garantie',$date_garantie);
    $stmt->bindParam(':prix',$prix);
    $stmt->bindParam(':conseil',$conseil);
    $stmt->bindParam(':categorie',$categorie);
    $stmt->bindParam(':id',$id);

    $updatefunc=$stmt->execute();

  // echo"<font color = 'green'><br>Book's info UPDATED</font>";
  echo "<p class='alert alert-success text-center p-2 m-0'>Book updated</p>";
  return $updatefunc;
}


    //image management for edition
    public function editimg($id)
    {
        $conn = $this->dbConnect();
        $edit3 = $conn->prepare("UPDATE livres SET photo_ticket = :photo_ticket, photo = :photo WHERE id=:id");
        $ticket = input($_POST['old_ticket']);
        $photo = input($_POST['old_photo']);

        if (!empty($_FILES['photo_ticket']['name'])) {
            $ticketname = input($_FILES['photo_ticket']['name']);
            $target_ticket = 'public/img/'.$ticketname;
            $file_extension_ticket = pathinfo($target_ticket, PATHINFO_EXTENSION);
            $file_extension_ticket = strtolower($file_extension_ticket);
            $valid_extension = array("png","jpeg","jpg","PNG");
            if (in_array($file_extension_ticket, $valid_extension)) {
                if (move_uploaded_file($_FILES['photo_ticket']['tmp_name'], $target_ticket)) {
                }
            }
        } else {
            $target_ticket=$ticket;
        }
        if (!empty($_FILES['photo']['name'])) {
            $photoname = input($_FILES['photo']['name']);
            $target_photo = 'public/img/'.$photoname;
            $file_extension_photo = pathinfo($target_photo, PATHINFO_EXTENSION);
            $file_extension_photo = strtolower($file_extension_photo);
            $valid_extension = array("png","jpeg","jpg","PNG");
            if (in_array($file_extension_photo, $valid_extension)) {
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_photo)) {
                }
            }
        } else {
            $target_photo=$photo;
        }

        // $edit3->bindParam(':photo_ticket',$target_ticket, PDO::PARAM_STR);
        // $edit3->bindParam(':photo',$target_photo, PDO::PARAM_STR);

        $editnew = $edit3->execute(array(':photo_ticket' => $target_ticket, ':photo' => $target_photo, ':id' => $id);

        return $editnew;
    }
    public function displayimg($id)
    {
        $conn = $this-> dbConnect();
        $imagesarray = $conn->prepare("SELECT * FROM `livres` WHERE id=:id");
        $imagesarray -> execute([':id'=>$id]);
        $displayer = $imagesarray -> fetchAll();
        return $displayer;
    }
}
?>
