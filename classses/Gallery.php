<?php

require_once "Database.php";

class Gallery extends Database
{

    public function allPhotos()
    {

        return $this->conn->query(

        "SELECT * FROM gallery"

        );

    }

}
?>