<?php
session_start();
$id = $_SESSION['id'];
if ($id == "") {
    header("Location:index.php?error=2");
}
include('db.php');
$sql="select * from personal_information where user_id ='$id'";
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
                        <?php if(isset($_GET['success']) && $_GET['success']==1) echo "Personal Information has been successfully created"; ?>
                        <?php if(isset($_GET['success']) && $_GET['success']==2) echo "Personal Information has been successfully deleted"; ?>
                        <?php //if(isset($_GET['success']) && $_GET['success']==3) echo "Course has been successfully updated"; ?>
                        </th></tr>
                    <tr>
                        <th>ID</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Blood Group</th>
                        <th>Place of Birth</th>
                        <th>Marital Status</th>
                        <th>Nationality</th>
                        <th>National ID</th>
                        <th>Place</th>
                        <th>Date of Issue</th>
                        <th>Phone</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['bloodgroup'] ?></td>
                        <td><?php echo $row['placeofbirth'] ?></td>
                        <td><?php echo $row['maritalstatus'] ?></td>
                        <td><?php echo $row['nationality'] ?></td>
                        <td><?php echo $row['nid'] ?></td>
                        <td><?php echo $row['place'] ?></td>
                        <td><?php echo $row['dateofissue'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td>
                            <a href="personalinfoedit.php?id=<?php echo $row['id'] ?>"><button>Edit</button></a>
                            <a href="personalinfodelete.php?id=<?php echo $row['id'] ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                
            </table>

        </div>
    </div>

</div>


<?php include('footer.php'); ?>

