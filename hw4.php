<?php

echo 'Homework 4. </br>';
echo '</br>';
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'full');

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

$sql = "SELECT * FROM users";
$query = mysqli_query($connect, $sql);

while($res[] = mysqli_fetch_assoc($query)){
	$users = $res;
}
// foreach ($users as $user) {
// 	echo '<br/>' . 'Имя: '.$user['user_name'].', пароль: '.$user['password'].'<br/>';
// }

// $res = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS kol FROM users"));

// echo $res['kol'] . '<br/>';

$sql2 = "INSERT INTO users SET user_name='Venya', password='qwerty'";
// mysqli_query($connect, $sql2);

$sql3 = "UPDATE users SET password='XXXXXX' WHERE user_name='Venya'";
// mysqli_query($connect, $sql3);

$sql4 = "DELETE FROM users WHERE user_id=3";
// mysqli_query($connect, $sql4);

for($i = 1; $i <= 55; $i++){
	$ins = "INSERT INTO users SET user_name='Login".$i."', password='pass".$i."'";
	//mysqli_query($connect, $ins);
}
if(empty($_GET['page'])){
	$page = 0;
} else {
	$page = ($_GET['page'] - 1) * 10;
}
 $sql5 = "SELECT u.user_name, u.password FROM users u ORDER BY user_id DESC LIMIT ".$page.", 10"; //ASC
 $query5 = mysqli_query($connect, $sql5);
 while($res5[] = mysqli_fetch_assoc($query5)){
 	$users5 = $res5;
 }
foreach ($users5 as $user5) {
	echo 'Name: ' . $user5['user_name'] . '. Password: ' . $user5['password'].'</br/>';
}

$res = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS kol FROM users"));

echo '<br/>';
$page = ceil($res['kol']/10);
for($i = 1; $i <= $page; $i++){
	echo '<a style="padding: 2px 4px; border: 1px solid #000; cursor: pointer; margin: 10px 5px; text-decoration: none; " href="hw4.php?page='.$i.'">'.$i.'</a>';
}
echo '<br/>';
echo '<br/>'.'Всего:'. ' '. $res['kol'].' '. 'записей'. '<br/>';
?>
