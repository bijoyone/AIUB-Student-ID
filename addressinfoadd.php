<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}


if ($_POST) {
	    ob_start();
    include('db.php');
    
	
	{
		$address_id=0;
		$length= sizeof($_POST['type']);
		
	for($k=0;$k<$length;$k++){
		$addresstype=$_POST['type'][$k];
		$apartmentnumber=$_POST['apartmentnumber'][$k];
		$houseno=$_POST['houseno'][$k];
		$roadno=$_POST['roadno'][$k];
		$roadname=$_POST['roadname'][$k];
		$area=$_POST['area'][$k];
		$postoffice=$_POST['postoffice'][$k];
		$policestation=$_POST['policestation'][$k];
		$city=$_POST['city'][$k];
		$postcode=$_POST['postcode'][$k];
		$country=$_POST['country'][$k];
		
		$sql = "insert into address values(NULL, '$id', '$addresstype', '$apartmentnumber' , '$houseno' , '$roadno', '$roadname' , '$area' , '$postoffice', '$policestation' , '$city' , '$postcode', '$country',NULL);";
		$conn->query($sql);
    
   }
}
}
?>


<?php include('header.php'); ?>



<div class="container-fluid" id="content">

    <?php include('leftmenu.php'); ?>

    <div id="main">
        <div class="container-fluid">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                <h2>Address Information</h2>
                
                
                      <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Present Address</label>
                    <input type="hidden" name="type[0]" id="type[0]" value="present"/>
                    <div class="col-sm-6">
                        <input type="text" name="apartmentnumber[0]" id="apartmentnumber[0]" placeholder="Apartment No" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="houseno[0]" id="houseno[0]" placeholder="House No" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadno[0]" id="roadno[0]" placeholder="Road No" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadname[0]" id="roadname[0]" placeholder="Road Name" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="area[0]" id="area[0]" placeholder="Area" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="postoffice[0]" id="postoffice[0]" placeholder="Post Office Name" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
					
                    <div class="col-sm-3">
                        <input type="text" name="policestation[0]" id="policestation[0]" placeholder="Police Station Name" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="postcode[0]" id="postcode[0]" placeholder="Post Code" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="city[0]" id="city[0]" class="form-control" placeholder="City"/>

                    </div>
                    <div class="col-sm-3">
					<select id="country[0]" name="country[0]" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan">Afghanistan</option>
						  <option value="Albania">Albania</option>
						  <option value="Algeria">Algeria</option>
						  <option value="American Samoa">American Samoa</option>
						</select>
                        <!--<input type="text" name="country[0]" id="country[0]" class="form-control" placeholder="Country"/>-->

                    </div>
                </div>
				  
               <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Permanent Address</label>
                    <input type="hidden" name="type[1]" id="type[1]" value="permanent"/>
                    <div class="col-sm-6">
                        <input type="text" name="apartmentnumber[1]" id="apartmentnumber[1]" placeholder="Apartment No" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="houseno[1]" id="houseno[1]" placeholder="House No" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadno[1]" id="roadno[1]" placeholder="Road No" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadname[1]" id="roadname[1]" placeholder="Road Name" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="area[1]" id="area[1]" placeholder="Area" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="postoffice[1]" id="postoffice[1]" placeholder="Post Office Name" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
					
                    <div class="col-sm-3">
                        <input type="text" name="policestation[1]" id="policestation[1]" placeholder="Police Station Name" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="postcode[1]" id="postcode[1]" placeholder="Post Code" class="form-control" autofocus>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="city[1]" id="city[1]" class="form-control" placeholder="City"/>

                    </div>
                    <div class="col-sm-3">
					<select id="country[1]" name="country[1]" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan">Afghanistan</option>
						  <option value="Albania">Albania</option>
						  <option value="Algeria">Algeria</option>
						  <option value="American Samoa">American Samoa</option>
						</select>
                        <!--<input type="text" name="country[1]" id="country[1]" class="form-control" placeholder="Country"/>-->

                    </div>
                </div>
				 <div class="form-group">
                    <label for="Mailing" class="col-sm-3 control-label">Mailing Address</label>
                    <div class="col-sm-9">
						
						<input type="radio" name="mailing" id="present" value="present"> Present Address
						<input type="radio" name="mailing" id="premanent" value="premanent"> Premanent Address
						<!--
                        <input type="text" id="gender" name="gender" placeholder="Gender" class="form-control">
                       -->
                    </div> 
                </div> 
               

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block" onclick="return validation();">Add</button>
                    </div>
                </div>
            </form> <!-- /form -->

        </div>
    </div>
    
</div>


<script type="text/javascript" src="validation.js">

</script>

<?php include('footer.php'); ?>
