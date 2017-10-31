<?php

session_start();
$id = $_SESSION['id'];
if ($id == "") {
	// logged out
    $data['sessionstatus'] = 0;
    echo json_encode($data);
} else {
    include('db.php');
    $user_id=$_GET['id'];
	$sql="select * from personal_information where user_id='$user_id' ";
	$result= $conn->query($sql);
	$perinforesult=$result->fetch_assoc();
	$sql="select * from address where user_id='$user_id' and type='present' ";
	$result= $conn->query($sql);
	$presentresult=$result->fetch_assoc();
	$sql="select * from address where user_id='$user_id' and type='permanent' ";
	$result= $conn->query($sql);
	$permanentresult=$result->fetch_assoc();
	$conn->close();

    
	$data['perinforesult']=$perinforesult;
	$data['presentresult']=$presentresult;
	$data['permanentresult']=$permanentresult;
	$data['sessionstatus'] = 1;
	echo json_encode($data);
    
}