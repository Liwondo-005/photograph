<?php

require_once "Database.php";

class Payment extends Database
{

    public function allPayments()
    {

        return $this->conn->query(

        "SELECT * FROM payments"

        );

    }

}
?>