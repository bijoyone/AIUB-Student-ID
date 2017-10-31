<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}

if ($_POST) {
    
    ob_start();
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
    $mailing=$_POST['mailing'];
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
		$address_id=0;
		$length= sizeof($_POST['addresstype']);
		
	for($k=0;$k<$length;$k++){
		$addresstype=$_POST['addresstype'][$k];
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
		
		$sqla = "insert into address values(NULL, '$id', '$addresstype', '$apartmentnumber' , '$houseno' , '$roadno', '$roadname' , '$area' , '$postoffice', '$policestation' , '$city' , '$postcode', '$country',NULL);";
		$conn->query($sqla);
		
		if($mailing==$addresstype){
			$address_id=$conn->insert_id;
		}
	}
    
    $sql = "insert into personal_information values(NULL, '$id', '$gender','$dob','$bloodgroup','$placeofbirth','$maritalstatus', '$nationality', '$nid', '$place', '$dateofissue', '$phone', '$address_id', '', NULL)";
    $conn->query($sql);
    if($conn->insert_id){
        $conn->close();
        header('Location: personallist.php?success=1');
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
                <h2>Personal Information</h2>
                
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
						
							<!--
						   <label class="radio-inline">
							<input type="radio" id="gender" name="gender" class="form-control">Male
							</label>
							<label class="radio-inline">
							<input type="radio" id="gender" name="gender" class="form-control">Female
							</label>
							<label class="radio-inline">
							<input type="radio" id= "gender" name="gender" class="form-control">Other
							</label>
							-->
						
						
						<input type="radio" name="gender" id="gender" value="male" checked> Male
						<input type="radio" name="gender" id="gender" value="female"> Female
						<input type="radio" name="gender" id="gender" value="other"> Other <br>
						
						
						<!--
                        <input type="text" id="gender" name="gender" placeholder="Gender" class="form-control">
                       -->
                        <?php if ($_POST && $error == 1) echo "<span> Gender error </span>"; ?> 
                    </div> 
                </div> 
                
                <div class="form-group">
                    <label for="dob" class="col-sm-3 control-label">Dete of Birth</label>
                    <div class="col-sm-9">
                        <input type="text" id="dob" name="dob" placeholder="Select date below" class="IP_calendar" title="Y-m-d"> <br>
                        <?php if ($_POST && $error == 2) echo "<span> Date of Birth error </span>"; ?> 

                    </div>
                </div>
                
                <div class="form-group">
                    <label for="bloodgroup" class="col-sm-3 control-label">Blood Group</label>
                    <div class="col-sm-9">
					<select id="bloodgroup" name="bloodgroup" class="form-control">
                            <option value="">Select Blood group</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
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
                        <input type="text" id="placeofbirth" name="placeofbirth" placeholder="Place of Birth" class="form-control">
                        <?php if ($_POST && $error == 4) echo "<span> Place of Birth error </span>"; ?> 

                    </div>
                </div>
                
                <div class="form-group">
                    <label for="maritalstatus" class="col-sm-3 control-label">Marital Status</label>
                    <div class="col-sm-9">
						<select id="maritalstatus" name="maritalstatus" class="form-control">
                            <option value="">Select Marital Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
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
						  <option value="Afghanistan">Afghanistan</option>
						  <option value="Albania">Albania</option>
						  <option value="Algeria">Algeria</option>
						  <option value="American Samoa">American Samoa</option>
						  <option value="Andorra">Andorra</option>
						  <option value="Angola">Angola</option>
						  <option value="Anguilla">Anguilla</option>
						  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
						  <option value="Argentina">Argentina</option>
						  <option value="Armenia">Armenia</option>
						  <option value="Aruba">Aruba</option>
						  <option value="Australia">Australia</option>
						  <option value="Austria">Austria</option>
						  <option value="Azerbaijan">Azerbaijan</option>
						  <option value="Bahamas">Bahamas</option>
						  <option value="Bahrain">Bahrain</option>
						  <option value="Bangladesh">Bangladesh</option>
						  <option value="Barbados">Barbados</option>
						  <option value="Belarus">Belarus</option>
					      <option value="Belgium">Belgium</option>
						  <option value="Belize">Belize</option>
						  <option value="Benin">Benin</option>
						  <option value="Bermuda">Bermuda</option>
						  <option value="Bhutan">Bhutan</option>
						  <option value="Bolivia">Bolivia</option>
						  <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
						  <option value="Botswana">Botswana</option>
						  <option value="Brazil">Brazil</option>
						  <option value="Brunei">Brunei</option>
						  <option value="Bulgaria">Bulgaria</option>
						  <option value="Burkina Faso">Burkina Faso</option>
						  <option value="Burundi">Burundi</option>
						  <option value="Cambodia">Cambodia</option>
						  <option value="Cameroon">Cameroon</option>
						  <option value="Canada">Canada</option>
						  <option value="Cape Verde">Cape Verde</option>
						  <option value="Cayman Islands">Cayman Islands</option>
						  <option value="Central African Republic">Central African Republic</option>
						  <option value="Chad">Chad</option>
						  <option value="Chile">Chile</option>
						  <option value="China">China</option>
						  <option value="Colombia">Colombia</option>
						  <option value="Comoros">Comoros</option>
						  <option value="Congo">Congo</option>
						  <option value="Costa Rica">Costa Rica</option>
						  <option value="Croatia">Croatia</option>
						  <option value="Cuba">Cuba</option>
						  <option value="Cyprus">Cyprus</option>
						  <option value="Czech Republic">Czech Republic</option>
						  <option value="Denmark">Denmark</option>
						  <option value="Dominica">Dominica</option>
						  <option value="Dominican Republic">Dominican Republic</option>
						  <option value="East Timor">East Timor</option>
						  <option value="Ecuador">Ecuador</option>
						  <option value="Egypt">Egypt</option>
						  <option value="El Salvador">El Salvador</option>
						  <option value="Equatorial Guinea">Equatorial Guinea</option>
						  <option value="Eritrea">Eritrea</option>
						  <option value="Estonia">Estonia</option>
						  <option value="Ethiopia">Ethiopia</option>
						  <option value="Fiji">Fiji</option>
						  <option value="Finland">Finland</option>
						  <option value="France">France</option>
						  <option value="French Guiana">French Guiana</option>
						  <option value="Gabon">Gabon</option>
						  <option value="Gambia">Gambia</option>
						  <option value="Georgia">Georgia</option>
						  <option value="Germany">Germany</option>
						  <option value="Ghana">Ghana</option>
						  <option value="Gibraltar">Gibraltar</option>
						  <option value="Greece">Greece</option>
						  <option value="Greenland">Greenland</option>
						  <option value="Grenada">Grenada</option>
						  <option value="Guatemala">Guatemala</option>
						  <option value="Guinea">Guinea</option>
						  <option value="Guinea Bissau">Guinea Bissau</option>
						  <option value="Guyana">Guyana</option>
						  <option value="Haiti">Haiti</option>
						  <option value="Honduras">Honduras</option>
						  <option value="Hong Kong">Hong Kong</option>
						  <option value="Hungary">Hungary</option>
						  <option value="Iceland">Iceland</option>
						  <option value="India">India</option>
						  <option value="Indonesia">Indonesia</option>
						  <option value="Iran">Iran</option>
						  <option value="Iraq">Iraq</option>
						  <option value="Ireland">Ireland</option>
						  <option value="Israel">Israel</option>
						  <option value="Italy">Italy</option>
						  <option value="Ivory Coast">Ivory Coast</option>
						  <option value="Jamaica">Jamaica</option>
						  <option value="Japan">Japan</option>
						  <option value="Jordan">Jordan</option>
						  <option value="Kazakhstan">Kazakhstan</option>
						  <option value="Kenya">Kenya</option>
						  <option value="Kiribati">Kiribati</option>
						  <option value="Kuwait">Kuwait</option>
						  <option value="Kyrgyzstan">Kyrgyzstan</option>
						  <option value="Laos">Laos</option>
						  <option value="Latvia">Latvia</option>
						  <option value="Lebanon">Lebanon</option>
						  <option value="Lesotho">Lesotho</option>
						  <option value="Liberia">Liberia</option>
						  <option value="Libya">Libya</option>
						  <option value="Liechtenstein">Liechtenstein</option>
						  <option value="Lithuania">Lithuania</option>
						  <option value="Luxembourg">Luxembourg</option>
						  <option value="Macau">Macau</option>
						  <option value="Macedonia">Macedonia</option>
						  <option value="Madagascar">Madagascar</option>
						  <option value="Malawi">Malawi</option>
						  <option value="Malaysia">Malaysia</option>
						  <option value="Maldives">Maldives</option>
						  <option value="Mali">Mali</option>
						  <option value="Malta">Malta</option>
						  <option value="Martinique">Martinique</option>
						  <option value="Mauritania">Mauritania</option>
						  <option value="Mauritius">Mauritius</option>
						  <option value="Mexico">Mexico</option>
						  <option value="Micronesia">Micronesia</option>
						  <option value="Moldova">Moldova</option>
						  <option value="Monaco">Monaco</option>
						  <option value="Mongolia">Mongolia</option>
						  <option value="Montenegro">Montenegro</option>
						  <option value="Montserrat">Montserrat</option>
						  <option value="Morocco">Morocco</option>
						  <option value="Mozambique">Mozambique</option>
						  <option value="Myanmar">Myanmar</option>
						  <option value="Namibia">Namibia</option>
						  <option value="Nauru">Nauru</option>
						  <option value="Nepal">Nepal</option>
						  <option value="Netherlands">Netherlands</option>
						  <option value="New Caledonia">New Caledonia</option>
						  <option value="New Zealand">New Zealand</option>
						  <option value="Nicaragua">Nicaragua</option>
						  <option value="Niger">Niger</option>
						  <option value="Nigeria">Nigeria</option>
						  <option value="Niue">Niue</option>
						  <option value="North Korea">North Korea</option>
						  <option value="Norway">Norway</option>
						  <option value="Oman">Oman</option>
						  <option value="Pakistan">Pakistan</option>
						  <option value="Palau">Palau</option>
						  <option value="Panama">Panama</option>
						  <option value="Papua New Guinea">Papua New Guinea</option>
						  <option value="Paraguay">Paraguay</option>
						  <option value="Peru">Peru</option>
						  <option value="Philippines">Philippines</option>
						  <option value="Poland">Poland</option>
						  <option value="Polynesia">Polynesia</option>
						  <option value="Portugal">Portugal</option>
						  <option value="Qatar">Qatar</option>
						  <option value="Reunion">Reunion</option>
						  <option value="Romania">Romania</option>
						  <option value="Russia">Russia</option>
						  <option value="Rwanda">Rwanda</option>
						  <option value="Saint Helena">Saint Helena</option>
						  <option value="Saint Lucia">Saint Lucia</option>
						  <option value="Samoa">Samoa</option>
						  <option value="San Marino">San Marino</option>
						  <option value="Saudi Arabia">Saudi Arabia</option>
						  <option value="Senegal">Senegal</option>
						  <option value="Serbia">Serbia</option>
						  <option value="Sierra Leone">Sierra Leone</option>
						  <option value="Singapore">Singapore</option>
						  <option value="Slovakia">Slovakia</option>
						  <option value="Slovenia">Slovenia</option>
						  <option value="Somalia">Somalia</option>
						  <option value="South Africa">South Africa</option>
						  <option value="South Georgia">South Georgia</option>
						  <option value="South Korea">South Korea</option>
						  <option value="Spain">Spain</option>
						  <option value="Sri Lanka">Sri Lanka</option>
						  <option value="Sudan">Sudan</option>
						  <option value="Suriname">Suriname</option>
						  <option value="Sweden">Sweden</option>
						  <option value="Switzerland">Switzerland</option>
						  <option value="Syria">Syria</option>
						  <option value="Taiwan">Taiwan</option>
						  <option value="Tajikistan">Tajikistan</option>
						  <option value="Tanzania">Tanzania</option>
						  <option value="Thailand">Thailand</option>
						  <option value="Togo">Togo</option>
						  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
						  <option value="Tunisia">Tunisia</option>
						  <option value="Turkey">Turkey</option>
						  <option value="Turkmenistan">Turkmenistan</option>
						  <option value="Uganda">Uganda</option>
						  <option value="Ukraine">Ukraine</option>
						  <option value="United Arab Emirates">United Arab Emirates</option>
						  <option value="United Kingdom">United Kingdom</option>
						  <option value="United States">United States</option>
						  <option value="Uruguay">Uruguay</option>
						  <option value="Uzbekistan">Uzbekistan</option>
						  <option value="Venezuela">Venezuela</option>
						  <option value="Vietnam">Vietnam</option>
						  <option value="Yemen">Yemen</option>
						  <option value="Zaire">Zaire</option>
						  <option value="Zambia">Zambia</option>
						  <option value="Zimbabwe">Zimbabwe</option>
						</select>
							
                        <?php if ($_POST && $error == 6) echo "<span> Nationality error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nid" class="col-sm-3 control-label">National ID</label>
                    <div class="col-sm-9">
                        <input type="number" id="nid" name="nid" placeholder="National ID" class="form-control">
                        <?php if ($_POST && $error == 7) echo "<span> National ID error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="place" class="col-sm-3 control-label">Place</label>
                    <div class="col-sm-9">
                        <input type="text" id="place" name="place" placeholder="Place" class="form-control">
                        <?php if ($_POST && $error == 8) echo "<span> Place error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="dateofissue" class="col-sm-3 control-label">Date of issue</label>
                    <div class="col-sm-9">
                        <input type="text" id="dateofissue" name="dateofissue" placeholder="YYYY-MM-DD" class="form-control">
                        <?php if ($_POST && $error == 9) echo "<span> Date of issue error </span>"; ?> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="number" id="phone" name="phone" placeholder="Phone" class="form-control">
                        <?php if ($_POST && $error == 10) echo "<span> Phone error </span>"; ?> 
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Present Address</label>
                    <input type="hidden" name="addresstype[0]" id="addresstype[0]" value="present"/>
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
                    <label for="address" class="col-sm-3 control-label">Premanent Address</label>
                    <input type="hidden" name="addresstype[1]" id="addresstype[1]" value="premanent"/>
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
                        <?php if ($_POST && $error == 1) echo "<span> Gender error </span>"; ?> 
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


<script type="text/javascript">
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "titlehint.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>



<script type="text/javascript" src="validation.js">

</script>



<script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js">

</script>



<?php include('footer.php'); ?>


