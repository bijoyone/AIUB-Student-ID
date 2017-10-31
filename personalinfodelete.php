<?php

session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}

include('db.php');
$pid=$_GET['id'];
if($pid==""){
	header('Location: personallist.php');
}
$sql="select * from personal_information where id='$pid'";

$result=$conn->query($sql);

$row=$result->fetch_assoc();
if(empty($row)){
	header('Location: personallist.php');
}else if($row['user_id']==$id){
	$sql = "delete from personal_information where id='$pid'";
	$conn->query($sql);
	$conn->close();
	header('Location: personallist.php?success=2');
}else{
	header('Location: personallist.php');
}

?>
