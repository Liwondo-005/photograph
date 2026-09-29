<?php

require_once "Database.php";

class Category extends Database
{

    public function getCategories()
    {

        return $this->conn->query(

        "SELECT * FROM categories"

        );

    }

}
?>