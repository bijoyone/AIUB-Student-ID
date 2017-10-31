<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}

if ($_POST) {
    include('db.php');
	$user_id=$_POST['user_id'];
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
	
}
include('db.php');
$sql="select * from users";
$result= $conn->query($sql);
$conn->close();
?>
<?php include('header.php'); ?>



<div class="container-fluid" id="content">

    <?php include('leftmenu.php'); ?>

    <div id="main">
        <div class="container-fluid">
            <form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
                    <label for="user_id" class="col-sm-3 control-label">Users</label>
                    <div class="col-sm-9">
					<select id="user_id" name="user_id" class="form-control">
                            <option value="">Select User</option>
							 <?php while ($row=$result->fetch_assoc()){ ?>
                              <option value="<?php echo $row['id']; ?>" <?php if($_POST && $_POST['user_id']==$row['id']) echo "selected"?>><?php echo $row['name']; ?></option>
							<?php } ?>
                     </select>
						
                    </div>
                </div>
			 <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Go</button>
                    </div>
             </div>
            </form> <!-- /form -->
			   <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                <h2>Personal Information</h2>
                
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
						
						<input type="radio" name="gender" id="gender" value="male" <?php if($_POST && $perinforesult['gender']=='male') echo "checked";?>> Male
						<input type="radio" name="gender" id="gender" value="female" <?php if($_POST && $perinforesult['gender']=='female') echo "checked";?>> Female
						<input type="radio" name="gender" id="gender" value="other" <?php if($_POST && $perinforesult['gender']=='other') echo "checked";?>> Other <br>
						<!--
                        <input type="text" id="gender" name="gender" placeholder="Gender" class="form-control">
                       -->
                        
                    </div> 
                </div> 
                
                <div class="form-group">
                    <label for="dob" class="col-sm-3 control-label">Dete of Birth</label>
                    <div class="col-sm-9">
                        <input type="text" id="dob" name="dob" placeholder="Select date below" class="IP_calendar" title="Y-m-d" value='<?php if($_POST) echo $perinforesult['dob'];?>'> <br>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="bloodgroup" class="col-sm-3 control-label">Blood Group</label>
                    <div class="col-sm-9">
					<select id="bloodgroup" name="bloodgroup" class="form-control">
                            <option value="">Select Blood group</option>
                            <option value="O+" <?php if($_POST && $perinforesult['bloodgroup']=='O+') echo "selected";?>>O+</option>
                            <option value="O-" <?php if($_POST && $perinforesult['bloodgroup']=='O-') echo "selected";?>>O-</option>
                            <option value="A+" <?php if($_POST && $perinforesult['bloodgroup']=='A+') echo "selected";?>>A+</option>
                            <option value="A-" <?php if($_POST && $perinforesult['bloodgroup']=='A-') echo "selected";?>>A-</option>
                            <option value="B+" <?php if($_POST && $perinforesult['bloodgroup']=='B+') echo "selected";?>>B+</option>
                            <option value="B-" <?php if($_POST && $perinforesult['bloodgroup']=='B-') echo "selected";?>>B-</option>
                            <option value="AB+" <?php if($_POST && $perinforesult['bloodgroup']=='AB+') echo "selected";?> >AB+</option>
                            <option value="AB-" <?php if($_POST && $perinforesult['bloodgroup']=='AB-') echo "selected";?>>AB-</option>
                     </select>
						
                      
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="placeofbirth" class="col-sm-3 control-label">Place of Birth</label>
                    <div class="col-sm-9">
                        <input type="text" id="placeofbirth" name="placeofbirth" placeholder="Place of Birth" class="form-control" value='<?php if($_POST) echo $perinforesult['dob'];?>'>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="maritalstatus" class="col-sm-3 control-label">Marital Status</label>
                    <div class="col-sm-9">
						<select id="maritalstatus" name="maritalstatus" class="form-control">
                            <option value="">Select Marital Status</option>
                            <option value="Single" <?php if($_POST && $perinforesult['maritalstatus']=='Single') echo "selected";?>>Single</option>
                            <option value="Married" <?php if($_POST && $perinforesult['maritalstatus']=='Married') echo "selected";?>>Married</option>
                            <option value="Divorced" <?php if($_POST && $perinforesult['maritalstatus']=='Divorced') echo "selected";?>>Divorced</option>
                            <option value="Widowed" <?php if($_POST && $perinforesult['maritalstatus']=='Widowed') echo "selected";?>>Widowed</option>
                     </select>
                      
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nationality" class="col-sm-3 control-label">Nationality</label>
                    <div class="col-sm-9">
						<select id="nationality" name="nationality" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan" <?php if($_POST && $perinforesult['nationality']=='Afghanistan') echo "selected";?>>Afghanistan</option>
						  <option value="Albania" <?php if($_POST && $perinforesult['nationality']=='Albania') echo "selected";?>>Albania</option>
						  <option value="Algeria" <?php if($_POST && $perinforesult['nationality']=='Algeria') echo "selected";?>>Algeria</option>
						  <option value="American Samoa" <?php if($_POST && $perinforesult['nationality']=='American Samoa') echo "selected";?>>American Samoa</option>
						</select>
							
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nid" class="col-sm-3 control-label">National ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="nid" name="nid" placeholder="National ID" class="form-control" value='<?php if($_POST) echo $perinforesult['nid'];?>'>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="place" class="col-sm-3 control-label">Place</label>
                    <div class="col-sm-9">
                        <input type="text" id="place" name="place" placeholder="Place" class="form-control" value='<?php if($_POST) echo $perinforesult['place'];?>'>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="dateofissue" class="col-sm-3 control-label">Date of issue</label>
                    <div class="col-sm-9">
                        <input type="text" id="dateofissue" name="dateofissue" placeholder="YYYY-MM-DD" class="form-control" value='<?php if($_POST) echo $perinforesult['dateofissue'];?>'>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="number" id="phone" name="phone" placeholder="Phone" class="form-control" value='<?php if($_POST) echo $perinforesult['phone'];?>'>
                    </div>
                </div>
                
               <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Present Address</label>
                    <input type="hidden" name="addresstype[0]" id="addresstype[0]" value="present"/>
                    <div class="col-sm-6">
                        <input type="text" name="apartmentnumber[0]" id="apartmentnumber[0]" placeholder="Apartment No" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['apartmentnumber[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="houseno[0]" id="houseno[0]" placeholder="House No" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['houseno[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadno[0]" id="roadno[0]" placeholder="Road No" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['roadno[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadname[0]" id="roadname[0]" placeholder="Road Name" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['roadname[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="area[0]" id="area[0]" placeholder="Area" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['area[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="postoffice[0]" id="postoffice[0]" placeholder="Post Office Name" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['postoffice[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
					
                    <div class="col-sm-3">
                        <input type="text" name="policestation[0]" id="policestation[0]" placeholder="Police Station Name" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['policestation[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="postcode[0]" id="postcode[0]" placeholder="Post Code" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['postcode[0]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="city[0]" id="city[0]" class="form-control" placeholder="City" value='<?php if($_POST) echo $perinforesult['city[0]'];?>'/>

                    </div>
                    <div class="col-sm-3">
					<select id="country[0]" name="country[0]" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan" <?php if($_POST && $perinforesult['country[0]']=='Afghanistan') echo "selected";?>>Afghanistan</option>
						  <option value="Albania" <?php if($_POST && $perinforesult['country[0]']=='Albania') echo "selected";?>>Albania</option>
						  <option value="Algeria" <?php if($_POST && $perinforesult['country[0]']=='Algeria') echo "selected";?>>Algeria</option>
						  <option value="American Samoa" <?php if($_POST && $perinforesult['country[0]']=='American Samoa') echo "selected";?>>American Samoa</option>
						</select>
                        <!--<input type="text" name="country[0]" id="country[0]" class="form-control" placeholder="Country"/>-->

                    </div>
                </div>
				  
               <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Permanent Address</label>
                    <input type="hidden" name="addresstype[1]" id="addresstype[1]" value="permanent"/>
                    <div class="col-sm-6">
                        <input type="text" name="apartmentnumber[1]" id="apartmentnumber[1]" placeholder="Apartment No" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['apartmentnumber[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="houseno[1]" id="houseno[1]" placeholder="House No" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['houseno[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadno[1]" id="roadno[1]" placeholder="Road No" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['roadno[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="roadname[1]" id="roadname[1]" placeholder="Road Name" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['roadname[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="area[1]" id="area[1]" placeholder="Area" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['area[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="postoffice[1]" id="postoffice[1]" placeholder="Post Office Name" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['postoffice[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
					
                    <div class="col-sm-3">
                        <input type="text" name="policestation[1]" id="policestation[1]" placeholder="Police Station Name" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['policestation[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="postcode[1]" id="postcode[1]" placeholder="Post Code" class="form-control" autofocus value='<?php if($_POST) echo $perinforesult['postcode[1]'];?>'>
                        <!--<span class="help-block">Appartment No, House No,Road No,Area,Post Office,City</span>-->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="city[1]" id="city[1]" class="form-control" placeholder="City" value='<?php if($_POST) echo $perinforesult['city[1]'];?>'/>

                    </div>
                    <div class="col-sm-3">
					<select id="country[1]" name="country[1]" class="form-control"> 
						  <option value="None selected">Select Country Below</option>
						  <option value="Afghanistan" <?php if($_POST && $perinforesult['country[1]']=='Afghanistan') echo "selected";?>>Afghanistan</option>
						  <option value="Albania" <?php if($_POST && $perinforesult['country[1]']=='Albania') echo "selected";?>>Albania</option>
						  <option value="Algeria" <?php if($_POST && $perinforesult['country[1]']=='Algeria') echo "selected";?>>Algeria</option>
						  <option value="American Samoa" <?php if($_POST && $perinforesult['country[1]']=='American Samoa') echo "selected";?>>American Samoa</option>
						</select>
                        <!--<input type="text" name="country[1]" id="country[1]" class="form-control" placeholder="Country"/>-->

                    </div>
                </div>
				 <div class="form-group">
                    <label for="Mailing" class="col-sm-3 control-label">Mailing Address</label>
                    <div class="col-sm-9">
						
						<input type="radio" name="mailing" id="present" value="present" <?php if($_POST && $perinforesult['address_id']==$presentresult['id']) echo "checked";?>> Present Address
						<input type="radio" name="mailing" id="permanent" value="permanent" <?php if($_POST && $perinforesult['address_id']==$permanentresult['id']) echo "checked";?>> Permanent Address
                    </div> 
                </div> 

            </form> <!-- /form -->
               

        </div>
    </div>

</div>

<script>
    function getinfo() {
        var id = document.getElementById("user_id").value;
		if(id=="")
			return false;
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var response = JSON.parse(xmlhttp.responseText);
                if (response.sessionstatus == 0) {
					//logged out
                    window.location = "index.php";
                } else {
					/// if logged in
					// radio button
                    if (response.perinforesult.gender == 'male') {
                        document.getElementById("male").checked = true;
                    } else if (response.perinforesult.gender == 'female') {
                        document.getElementById("female").checked = true;
					} else if (response.perinforesult.gender == 'other') {
                        document.getElementById("other").checked = true;
                    }
					// for input field
                    document.getElementById("dob").value = response.perinforesult.dob;
                    document.getElementById("placeofbirth").value = response.perinforesult.placeofbirth;
                    document.getElementById("nid").value = response.perinforesult.nid;
                    document.getElementById("place").value = response.perinforesult.place;
                    document.getElementById("dateofissue").value = response.perinforesult.dateofissue;
                    document.getElementById("phone").value = response.perinforesult.phone;
                    
                    
                    document.getElementById("apartmentnumber[0]").value = response.perinforesult.apartmentnumber[0];
                    document.getElementById("houseno[0]").value = response.perinforesult.roadno[0];
                    document.getElementById("roadno[0]").value = response.perinforesult.roadno[0];
                    document.getElementById("roadname[0]").value = response.perinforesult.roadname[0];
                    document.getElementById("area[0]").value = response.perinforesult.area[0];
                    document.getElementById("postoffice[0]").value = response.perinforesult.postoffice[0];
                    document.getElementById("policestation[0]").value = response.perinforesult.policestation[0];
                    document.getElementById("postcode[0]").value = response.perinforesult.postcode[0];
                    document.getElementById("city[0]").value = response.perinforesult.city[0];
                    
                                        
                    document.getElementById("apartmentnumber[1]").value = response.perinforesult.apartmentnumber[1];
                    document.getElementById("houseno[1]").value = response.perinforesult.roadno[1];
                    document.getElementById("roadno[1]").value = response.perinforesult.roadno[1];
                    document.getElementById("roadname[1]").value = response.perinforesult.roadname[1];
                    document.getElementById("area[1]").value = response.perinforesult.area[1];
                    document.getElementById("postoffice[1]").value = response.perinforesult.postoffice[1];
                    document.getElementById("policestation[1]").value = response.perinforesult.policestation[1];
                    document.getElementById("postcode[1]").value = response.perinforesult.postcode[1];
                    document.getElementById("city[1]").value = response.perinforesult.city[1];
                    
					// dropdown list
					if(response.perinforesult.bloodgroup=="O+")
                       document.getElementById("bloodgroup").selectedIndex = 1;
				   else if(response.perinforesult.bloodgroup=="O-")
                       document.getElementById("bloodgroup").selectedIndex = 2;
				   else if(response.perinforesult.bloodgroup=="A+")
                       document.getElementById("bloodgroup").selectedIndex = 3;
				   else if(response.perinforesult.bloodgroup=="A-")
                       document.getElementById("bloodgroup").selectedIndex = 4;
                   else if(response.perinforesult.bloodgroup=="B+")
                       document.getElementById("bloodgroup").selectedIndex = 5;
                   else if(response.perinforesult.bloodgroup=="B-")
                       document.getElementById("bloodgroup").selectedIndex = 6;
                   else if(response.perinforesult.bloodgroup=="AB+")
                       document.getElementById("bloodgroup").selectedIndex = 7;
                   else if(response.perinforesult.bloodgroup=="AB-")
                       document.getElementById("bloodgroup").selectedIndex = 8;
                   
                    if(response.perinforesult.maritalstatus=="Single")
                       document.getElementById("maritalstatus").selectedIndex = 1;
                    else if(response.perinforesult.maritalstatus=="Married")
                       document.getElementById("maritalstatus").selectedIndex = 2;
                    else if(response.perinforesult.maritalstatus=="Divorced")
                       document.getElementById("maritalstatus").selectedIndex = 3;
                    else if(response.perinforesult.maritalstatus=="Widowed")
                       document.getElementById("maritalstatus").selectedIndex = 4;
                       
                     if(response.perinforesult.nationality=="Afghanistan")
                       document.getElementById("nationality").selectedIndex = 1;
                     else if(response.perinforesult.nationality=="A-")
                       document.getElementById("nationality").selectedIndex = 2;
                     else if(response.perinforesult.nationality=="A-")
                       document.getElementById("nationality").selectedIndex = 3;
                     else if(response.perinforesult.nationality=="A-")
                       document.getElementById("nationality").selectedIndex = 4;
                       
                    
				     if(response.perinforesult.country[0]=="Afghanistan")
                       document.getElementById("country[0]").selectedIndex = 1;
                     else if(response.perinforesult.country[0]=="Albania")
                       document.getElementById("country[0]").selectedIndex = 2;
                     else if(response.perinforesult.country[0]=="Algeria")
                       document.getElementById("country[0]").selectedIndex = 3;
                     else if(response.perinforesult.country[0]=="American Samoa")
                       document.getElementById("country[0]").selectedIndex = 4;
                       
                     if(response.perinforesult.country[1]=="Afghanistan")
                       document.getElementById("country[1]").selectedIndex = 1;
                     else if(response.perinforesult.country[1]=="Albania")
                       document.getElementById("country[1]").selectedIndex = 2;
                     else if(response.perinforesult.country[1]=="Algeria")
                       document.getElementById("country[1]").selectedIndex = 3;
                     else if(response.perinforesult.country[1]=="American Samoa")
                       document.getElementById("country[1]").selectedIndex = 4;
                       
				   // radio button mailling address
				   if (response.perinforesult.address_id == response.presentresult.id) {
                        document.getElementById("present").checked = true;
                    } else if (response.perinforesult.address_id ==  response.permanentresult.id) {
                        document.getElementById("permanent").checked = true;
					}
				   
                   
                }

            }
        };
        xmlhttp.open("GET", "getpersonalinforesult.php?id=" + id, true);
        xmlhttp.send();
    }
</script>



<script type="text/javascript" src="validation.js">

</script>




<?php include('footer.php'); ?>


