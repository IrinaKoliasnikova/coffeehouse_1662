<?php require_once '../functions/connect.php';

session_start();

$login=$_POST['login'];
$password=$_POST['password'];

$sql = $pdo->prepare("SELECT id,login FROM user WHERE login=:login AND password=:password");
$sql->execute(array('login' => $login, 'password' => $password ));
$array=$sql->fetch(PDO::FETCH_ASSOC);

if ($array["id"] > 0) {
	$_SESSION['login'] = $array["login"];
	header('Location:../panel.php');
}
else {
	header('Location:../entry.php');
}
?>