<?php
class AdminManager extends Database
{
    public function getLogin($user, $password)
    {
        $conn = $this->dbConnect();
        $sql = "SELECT password, id FROM admin WHERE nom = :nom";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nom', $user);
        $stmt->execute();
        $result = $stmt->fetch();
        $isValid = password_verify($password, $result[0]);

        if ($isValid) {
            $_SESSION['isAdmin'] = true;
            $_SESSION['authUser'] = $user;
            $_SESSION['id'] = $result[1];
            header('Location:index.php');
            exit;
        } else {
            echo "Get out you're not authorized";
        }
    }

    public function isAdmin()
    {
        if ($_SESSION['isAdmin']) {
            echo "<div class='alert bg-transparent text-center font-weight-bolder p-0 m-0'><p>Welcome " . $_SESSION['authUser']. "</p></div>";
        } else {
            echo "Get out you're not authorized";
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function deco()
    {
        session_start();

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');

        header('Location: index.php');
        exit;
    }

    public function getRegister($nom, $mail, $password)
    {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare("SELECT * FROM admin where nom=?");
        $stmt->execute([$nom]);
        $noms =$stmt->fetch();
        if ($noms) {
            echo "<div class='sucess'>Le nom d'utilisateur est déjà utilisé.</div>";
        } else {
            $conn = $this->dbConnect();
            $query=$conn->prepare("INSERT INTO admin (nom,mail,password) VALUES(:nom,:mail,:password)");
            $query->execute(array(
        ':nom' => $nom,
        ':mail' => $mail,
        ':password' => password_hash($password, PASSWORD_DEFAULT),
      ));
            echo "<div class='sucess'>
             <h3>Vous avez ajouter un administrateur avec succès.</h3>
       </div>";
        }
    }
}
