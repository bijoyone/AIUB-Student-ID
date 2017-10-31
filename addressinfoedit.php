<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}



if ($_POST) {
    include('db.php');
    $type=$_POST['type'];
    $apartmentnumber=$_POST['apartmentnumber'];
    $houseno=$_POST['houseno'];
    $roadno=$_POST['roadno'];
    $roadname=$_POST['roadname'];
    $area=$_POST['area'];
    $postoffice=$_POST['postoffice'];
    $policestation=$_POST['policestation'];
    $city=$_POST['city'];
    $postcode=$_POST['postcode'];
    $country=$_POST['country'];

	
    if($type == "") {
		$error = 1;
	} 
	elseif($apartmentnumber == "")	{
		$error = 2;
	}
	
	elseif($houseno == "")	{
		$error = 3;
	}
	
	elseif($roadno == "")	{
		$error = 4;
	}
	
	elseif($roadname == "")	{
		$error = 5;
	}
	
	elseif($area == "")	{
		$error = 6;
	}
	
	elseif($postoffice == "")	{
		$error = 7;
	}
	
	elseif($policestation == "")	{
		$error = 8;
	}
	
	elseif($city == "")	{
		$error = 9;
	}
	
	elseif($postcode == "")	{
		$error = 10;
	}
	
	elseif($country == "")	{
		$error = 11;
	}
	
	else {
		$aid=$_GET['id'];
		$sql = "update address set type='$type', apartmentnumber='$apartmentnumber', houseno='$houseno', roadno='$roadno', roadname='$roadname', area='$area', postoffice='$postoffice', policestation='$policestation', city='$city', postcode='$postcode', country='$country' where id='$aid'";
		$conn->query($sql);
        $conn->close();
        header('Location: addresslist.php?success=1');
	}
}

include('db.php');
$pid = $_GET['id'];
$sql = "select * from address where id='$pid'";
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
                <h2>Address Information</h2>
                
                <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Address Type</label>
                    <div class="col-sm-9">
						
						<input type="radio" name="type" id="type" value="present" <?php if($row['type']=="present") echo "checked"; ?> > Present 
						<input type="radio" name="type" id="type" value="permanent"  <?php if($row['type']=="permanent") echo "checked"; ?>> Permanent
						<!--
                        <input type="text" id="gender" name="gender" placeholder="Gender" class="form-control">
                       -->
                        <?php if ($_POST && $error == 1) echo "<span> Address Type error </span>"; ?> 
                    </div> 
                </div> 
                
                <div class="form-group">
                    <label for="apartmentnumber" class="col-sm-3 control-label">Apartment No</label>
                    <div class="col-sm-9">
                        <input type="text" id="apartmentnumber" name="apartmentnumber" placeholder="Apartment No" value='<?php echo $row['apartmentnumber']; ?>' class="form-control">
                        <?php if ($_POST && $error == 2) echo "<span> Apartment No error </span>"; ?> 

                    </div>
                </div>
                
				<div class="form-group">
                    <label for="houseno" class="col-sm-3 control-label">House No</label>
                    <div class="col-sm-9">
                        <input type="text" id="houseno" name="houseno" placeholder="House No" value='<?php echo $row['houseno']; ?>' class="form-control">
                        <?php if ($_POST && $error == 3) echo "<span> House No error </span>"; ?> 

                    </div>
                </div>
                
                <div class="form-group">
                    <label for="roadno" class="col-sm-3 control-label">Road No</label>
                    <div class="col-sm-9">
                        <input type="number" id="roadno" name="roadno" placeholder="Road No" value='<?php echo $row['roadno']; ?>' class="form-control">
                        <?php if ($_POST && $error == 4) echo "<span> Road No error </span>"; ?> 

                    </div>
                </div>
                
				  <div class="form-group">
                    <label for="roadname" class="col-sm-3 control-label">Road Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="roadname" name="roadname" placeholder="Road Name" value='<?php echo $row['roadname']; ?>' class="form-control">
                        <?php if ($_POST && $error == 5) echo "<span> Road Name error </span>"; ?> 

                    </div>
                </div>
                
				 <div class="form-group">
                    <label for="area" class="col-sm-3 control-label">Area</label>
                    <div class="col-sm-9">
                        <input type="text" id="area" name="area" placeholder="Area" value='<?php echo $row['area']; ?>' class="form-control">
                        <?php if ($_POST && $error == 6) echo "<span> Area error </span>"; ?> 

                    </div>
                </div>
                
              <div class="form-group">
                    <label for="postoffice" class="col-sm-3 control-label">Post Office</label>
                    <div class="col-sm-9">
                        <input type="text" id="postoffice" name="postoffice" placeholder="Post Office" value='<?php echo $row['postoffice']; ?>' class="form-control">
                        <?php if ($_POST && $error == 7) echo "<span> Post Office error </span>"; ?> 

                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="policestation" class="col-sm-3 control-label">Police station</label>
                    <div class="col-sm-9">
                        <input type="text" id="policestation" name="policestation" placeholder="Police Station" value='<?php echo $row['area']; ?>' class="form-control">
                        <?php if ($_POST && $error == 8) echo "<span> Police Station error </span>"; ?> 

                    </div>
                </div>
                
                	 <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" id="city" name="city" placeholder="City" value='<?php echo $row['city']; ?>' class="form-control">
                        <?php if ($_POST && $error == 9) echo "<span> City error </span>"; ?> 

                    </div>
                </div>
                
                   <div class="form-group">
                    <label for="postcode" class="col-sm-3 control-label">Post Code</label>
                    <div class="col-sm-9">
                        <input type="number" id="postcode" name="postcode" placeholder="Post Code"  value='<?php echo $row['postcode']; ?>' class="form-control">
                        <?php if ($_POST && $error == 10) echo "<span> Post Code error </span>"; ?> 
                    </div>
                </div>
                
                   <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
						<select id="country" name="country" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan"  <?php if($row['country']=="Afghanistan") echo "selected"; ?>>Afghanistan</option>
						  <option value="Albania" <?php if($row['country']=="Albania") echo "selected"; ?>>Albania</option>
						  <option value="Algeria" <?php if($row['country']=="Algeria") echo "selected"; ?>>Algeria</option>
						  <option value="American Samoa"  <?php if($row['country']=="American Samoa") echo "selected"; ?>>American Samoa</option>
						</select>
							
                        <?php if ($_POST && $error == 11) echo "<span> Country error </span>"; ?> 
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



