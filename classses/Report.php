<?php

require_once "Database.php";

class Report extends Database
{

    public function totalRevenue()
    {

        return $this->conn->query(

        "SELECT SUM(amount) total FROM payments
         WHERE payment_status='Paid'"

        );

    }

}
?>