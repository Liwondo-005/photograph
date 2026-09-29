<?php

session_start();

require_once "config/database.php";

$db = new Database();
$conn = $db->connect();

$message = "";

if(isset($_POST['register']))
{

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Every new user becomes Customer
    $role = "customer";

    $sql = "INSERT INTO users
    (full_name,email,phone,password,role)

    VALUES

    (?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssss",
        $full_name,
        $email,
        $phone,
        $password,
        $role
    );

    if($stmt->execute())
    {
        $user_id = $conn->insert_id;

        $sql2 = "INSERT INTO customers(user_id)
                 VALUES(?)";

        $stmt2 = $conn->prepare($sql2);

        $stmt2->bind_param("i",$user_id);

        $stmt2->execute();

        $message = "Registration Successful.";
    }
    else
    {
        $message = "Registration Failed.";
    }

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Register</title>

</head>

<body>

<h2>Create Account</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<input
type="text"
name="full_name"
placeholder="Full Name"
required>

<br><br>

<input
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input
type="text"
name="phone"
placeholder="Phone">

<br><br>

<input
type="password"
name="password"
placeholder="Password"
required>

<br><br>

<button
type="submit"
name="register">

Register

</button>

</form>

<br>

Already have account?

<a href="login.php">

Login

</a>

</body>

</html>