<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}
include('db.php');
$sql="select * from address where user_id='$id'";
$result=$conn->query($sql);
$conn->close();
?>

<?php include('header.php'); ?>



<div class="container-fluid" id="content">

    <?php include('leftmenu.php'); ?>

    <div id="main">
        <div class="container-fluid">
            <table class="table-bordered table table-responsive">
                <thead>
                    <tr><th colspan="8">
                        <?php if(isset($_GET['success']) && $_GET['success']==1) echo "Address Information has been successfully created"; ?>
                        <?php if(isset($_GET['success']) && $_GET['success']==2) echo "Address Information has been successfully deleted"; ?>
                        <?php //if(isset($_GET['success']) && $_GET['success']==3) echo "Course has been successfully updated"; ?>
                        </th></tr>
                    <tr>
                        <th>ID</th>
                        <th>Address Type</th>
                        <th>Apartment Number</th>
                        <th>House No</th>
                        <th>Road No</th>
                        <th>Road Name</th>
                        <th>Area</th>
                        <th>Post Office</th>
                        <th>Police Station</th>
                        <th>City</th>
                        <th>Post Code</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['apartmentnumber'] ?></td>
                        <td><?php echo $row['houseno'] ?></td>
                        <td><?php echo $row['roadno'] ?></td>
                        <td><?php echo $row['roadname'] ?></td>
                        <td><?php echo $row['area'] ?></td>
                        <td><?php echo $row['postoffice'] ?></td>
                        <td><?php echo $row['policestation'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['postcode'] ?></td>
                        <td><?php echo $row['country'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td>
                            <a href="addressinfoedit.php?id=<?php echo $row['id'] ?>"><button>Edit</button></a>
                            <a href="addressinfodelete.php?id=<?php echo $row['id'] ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                
            </table>

        </div>
    </div>

</div>


<?php include('footer.php'); ?>

