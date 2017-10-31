<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}



if ($_POST) {
    include('db.php');
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $bloodgroup=$_POST['bloodgroup'];
    $placeofbirth=$_POST['placeofbirth'];
    $maritalstatus=$_POST['maritalstatus'];
    $nationality=$_POST['nationality'];
    $nid=$_POST['nid'];
    $place=$_POST['place'];
    $dateofissue=$_POST['dateofissue'];
    $phone=$_POST['phone'];
	
    if($gender == "") {
		$error = 1;
	} 
	elseif($dob == "")	{
		$error = 2;
	}
	
	elseif($bloodgroup == "")	{
		$error = 3;
	}
	
	elseif($placeofbirth == "")	{
		$error = 4;
	}
	
	elseif($maritalstatus == "")	{
		$error = 5;
	}
	
	elseif($nationality == "")	{
		$error = 6;
	}
	
	elseif($nid == "")	{
		$error = 7;
	}
	
	elseif($place == "")	{
		$error = 8;
	}
	
	elseif($dateofissue == "")	{
		$error = 9;
	}
	
	elseif($phone == "")	{
		$error = 10;
	}
	
	else {
		$pid=$_GET['id'];
		$sql = "update personal_information set gender='$gender', dob='$dob', bloodgroup='$bloodgroup', placeofbirth='$placeofbirth', maritalstatus='$maritalstatus', nationality='$nationality', nid='$nid', place='$place', dateofissue='$dateofissue', phone='$phone' where id='$pid'";
		$conn->query($sql);
        $conn->close();
        header('Location: personallist.php?success=1');
	}
}

include('db.php');
$pid = $_GET['id'];
$sql = "select * from personal_information where id='$pid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>
<?php include('header.php'); ?>



<div class="container-fluid" id="content">

    <?php include('leftmenu.php'); ?>

    <div id="main">
        <div class="container-fluid">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                <h2>Personal Information</h2>
                
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
						
						<input type="radio" name="gender" id="gender" value="male" <?php if($row['gender']=="male") echo "checked"; ?> > Male
						<input type="radio" name="gender" id="gender" value="female"  <?php if($row['gender']=="female") echo "checked"; ?>> Female
						<input type="radio" name="gender" id="gender" value="other"  <?php if($row['gender']=="other") echo "checked"; ?>> Other <br>
						<!--
                        <input type="text" id="gender" name="gender" placeholder="Gender" class="form-control">
                       -->
                        <?php if ($_POST && $error == 1) echo "<span> Gender error </span>"; ?> 
                    </div> 
                </div> 
                
                <div class="form-group">
                    <label for="dob" class="col-sm-3 control-label">Dete of Birth</label>
                    <div class="col-sm-9">
                        <input type="text" id="dob" name="dob" placeholder="Select date below" class="IP_calendar" title="Y-m-d" value='<?php echo $row['dob']; ?>'> <br>
                        <?php if ($_POST && $error == 2) echo "<span> Date of Birth error </span>"; ?> 

                    </div>
                </div>
                
                <div class="form-group">
                    <label for="bloodgroup" class="col-sm-3 control-label">Blood Group</label>
                    <div class="col-sm-9">
					<select id="bloodgroup" name="bloodgroup" class="form-control">
                            <option value="">Select Blood group</option>
                            <option value="O+" <?php if($row['bloodgroup']=="O+") echo "selected"; ?>>O+</option>
                            <option value="O-"  <?php if($row['bloodgroup']=="O-") echo "selected"; ?>>O-</option>
                            <option value="A+"  <?php if($row['bloodgroup']=="A+") echo "selected"; ?>>A+</option>
                            <option value="A-"  <?php if($row['bloodgroup']=="A-") echo "selected"; ?>>A-</option>
                            <option value="B+" <?php if($row['bloodgroup']=="B+") echo "selected"; ?>>B+</option>
                            <option value="B-" <?php if($row['bloodgroup']=="B-") echo "selected"; ?>>B-</option>
                            <option value="AB+ <?php if($row['bloodgroup']=="AB+") echo "selected"; ?>">AB+</option>
                            <option value="AB-" <?php if($row['bloodgroup']=="AB-") echo "selected"; ?>>AB-</option>
                     </select>
						
                       <!-- 
                       <input type="text" id="bloodgroup" name="bloodgroup" placeholder="Blood Group" class="form-control">
                       -->
                        <?php if ($_POST && $error == 3) echo "<span> Blood group error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="placeofbirth" class="col-sm-3 control-label">Place of Birth</label>
                    <div class="col-sm-9">
                        <input type="text" id="placeofbirth" name="placeofbirth" placeholder="Place of Birth" value='<?php echo $row['placeofbirth']; ?>' class="form-control">
                        <?php if ($_POST && $error == 4) echo "<span> Place of Birth error </span>"; ?> 

                    </div>
                </div>
                
                <div class="form-group">
                    <label for="maritalstatus" class="col-sm-3 control-label">Marital Status</label>
                    <div class="col-sm-9">
						<select id="maritalstatus" name="maritalstatus" class="form-control">
                            <option value="">Select Marital Status</option>
                            <option value="Single"  <?php if($row['maritalstatus']=="Single") echo "selected"; ?>>Single</option>
                            <option value="Married" <?php if($row['maritalstatus']=="Married") echo "selected"; ?>>Married</option>
                            <option value="Divorced" <?php if($row['maritalstatus']=="Divorced") echo "selected"; ?>>Divorced</option>
                            <option value="Widowed" <?php if($row['maritalstatus']=="Widowed") echo "selected"; ?>>Widowed</option>
                     </select>
                     
                       <!-- <input type="text" id="maritalstatus" name="maritalstatus" placeholder="Marital Status" class="form-control">
                        -->
                        <?php if ($_POST && $error == 5) echo "<span> Marital Status error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nationality" class="col-sm-3 control-label">Nationality</label>
                    <div class="col-sm-9">
						<select id="nationality" name="nationality" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan"  <?php if($row['nationality']=="Afghanistan") echo "selected"; ?>>Afghanistan</option>
						  <option value="Albania" <?php if($row['nationality']=="Albania") echo "selected"; ?>>Albania</option>
						  <option value="Algeria" <?php if($row['nationality']=="Algeria") echo "selected"; ?>>Algeria</option>
						  <option value="American Samoa"  <?php if($row['nationality']=="American Samoa") echo "selected"; ?>>American Samoa</option>
						</select>
							
                        <?php if ($_POST && $error == 6) echo "<span> Nationality error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nid" class="col-sm-3 control-label">National ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="nid" name="nid" placeholder="National ID" value='<?php echo $row['nid']; ?>' class="form-control">
                        <?php if ($_POST && $error == 7) echo "<span> National ID error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="place" class="col-sm-3 control-label">Place</label>
                    <div class="col-sm-9">
                        <input type="text" id="place" name="place" placeholder="Place" class="form-control" value='<?php echo $row['place']; ?>'>
                        <?php if ($_POST && $error == 8) echo "<span> Place error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="dateofissue" class="col-sm-3 control-label">Date of issue</label>
                    <div class="col-sm-9">
                        <input type="text" id="dateofissue" name="dateofissue" placeholder="YYYY-MM-DD" class="form-control" value='<?php echo $row['dateofissue']; ?>'>
                        <?php if ($_POST && $error == 9) echo "<span> Date of issue error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="number" id="phone" name="phone" placeholder="Phone" class="form-control" value='<?php echo $row['phone']; ?>'>
                        <?php if ($_POST && $error == 10) echo "<span> Phone error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </form> <!-- /form -->

        </div>
    </div>

</div>


<script type="text/javascript" src="validation.js">

</script>




<?php include('footer.php'); ?>


