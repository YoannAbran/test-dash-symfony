<?php
abstract class Database
{
    protected function dbConnect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projet_dashboard";

        try {
            $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
