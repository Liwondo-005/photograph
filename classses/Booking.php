<?php

require_once "Database.php";

class Booking extends Database
{

    public function allBookings()
    {

        return $this->conn->query(

        "SELECT * FROM bookings"

        );

    }

}
?>