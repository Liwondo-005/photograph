<?php

session_start();

require_once "config/database.php";

$db = new Database();

$conn = $db->connect();

$message = "";

if(isset($_POST['login']))
{

$email = $_POST['email'];

$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE email=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s",$email);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0)
{

$user = $result->fetch_assoc();

if(password_verify($password,$user['password']))
{

$_SESSION['user_id'] = $user['user_id'];

$_SESSION['name'] = $user['full_name'];

$_SESSION['role'] = $user['role'];

switch($user['role'])
{

case "admin":
header("Location: dashboard/admin.php");
break;

case "manager":
header("Location: dashboard/manager.php");
break;

case "photographer":
header("Location: dashboard/photographer.php");
break;

case "customer":
header("Location: dashboard/customer.php");
break;

}

exit();

}
else
{

$message="Incorrect Password.";

}

}
else
{

$message="Account Not Found.";

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Login</title>

</head>

<body>

<h2>Login</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<input
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input
type="password"
name="password"
placeholder="Password"
required>

<br><br>

<button
type="submit"
name="login">

Login

</button>

</form>

<br>

<a href="register.php">

Create Account

</a>

</body>

</html>