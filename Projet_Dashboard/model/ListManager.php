<?php

class ListManager extends Database
{
    public function selectAll($offset, $total_records_per_page, $order, $ascdesc)
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT *
  FROM livres ORDER BY $order $ascdesc LIMIT $offset, $total_records_per_page ");
        $sql->execute();
        $rows = $sql->fetchAll();
        return $rows;
    }

    public function get_search($offset, $total_records_per_page, $order, $ascdesc, $search)
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT * FROM livres WHERE nom LIKE :search OR reference LIKE :search OR categorie LIKE :search ORDER BY $order $ascdesc LIMIT $offset, $total_records_per_page ");//OR reference LIKE $search OR categorie LIKE $search
        $sql->execute([':search'=>"$search"]);
        $result = $sql;
        return $result;
    }
    public function get_cat($offset, $total_records_per_page, $order, $ascdesc, $cat)
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT * FROM livres WHERE categorie = :cat ORDER BY $order $ascdesc LIMIT $offset, $total_records_per_page");
        $sql->execute([':cat'=>$cat]);
        $result = $sql;
        return $result;
    }
    public function get_all_cat()
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT categorie FROM livres GROUP BY categorie");
        $sql->execute();
        $result = $sql;
        return $result;
    }

    public function pagination()
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT * FROM livres");
        $sql->execute();
        $total_records = $sql->rowCount();
        return $total_records;
    }
    public function paginationsearch($search)
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT * FROM livres WHERE nom LIKE :search OR reference LIKE :search OR categorie LIKE :search");
        $sql->execute([':search'=>"$search"]);
        $total_records = $sql->rowCount();
        return $total_records;
    }
    public function paginationcat($cat)
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("SELECT * FROM livres WHERE categorie = :cat");
        $sql->execute([':cat'=>$cat]);
        $total_records = $sql->rowCount();
        return $total_records;
    }
    public function remove($id)
    {
        $conn = $this->dbConnect();
        $sql = $conn->prepare("DELETE FROM livres WHERE id = :id");
        $sql->execute([':id'=>$id]);

    }
}
