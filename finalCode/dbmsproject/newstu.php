<?php  
include('config.php');  

 if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM stud_tbl WHERE id=$id");

        if (mysqli_num_rows($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $f_name =  $n['f_name'];
            $l_name=$n['l_name'];
            $gender=$n['gender'];
            $dob=$n['dob'];
    
            $address=$n['address'];
            $phone=$n['phone'];
            $email=$n['email'];
    
        }
    }

     if (isset($_POST['save'])) {
       
        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];;

        $q1="INSERT INTO stud_tbl VALUES('' ,'$f_name' , '$l_name', '$gender', '$dob', '$address', '$phone', '$email')";
        mysqli_query($db,$q1);
            $_SESSION['message'] = "Data Inserted Succesfully";
    }


        if (isset($_POST['update'])) {
         $id = $_POST['id'];
       $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];;

        mysqli_query($db, "UPDATE stud_tbl SET f_name='$f_name', l_name='$l_name', gender='$gender', dob='$dob', address='$address', phone='$phone', email='$email'  WHERE id=$id");
        $_SESSION['message'] = "Data updated!"; 
        }

    if (isset($_GET['delbb'])) {
    $id = $_GET['delbb'];
    mysqli_query($db, "DELETE FROM stud_tbl WHERE id=$id");
    $_SESSION['message'] = "Data deleted!"; 
    }


    //search
    

?>


<!DOCTYPE html>
<html>
<head>
   <head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>College</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />

<div class="dropdownmenu_container">
</head>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<body>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <?php  $results = mysqli_query($db, "SELECT * FROM stud_tbl"); ?>
<button  onclick="document.location='all.php'" >HOME</button>

<table>
    <thead>
        <tr>
            
            <th>First Name</th>
            <th >Last Name</th>
            <th>Gender</th>
             <th>DOB</th>
            <th >Address</th>
            <th>Phone</th>
             <th>Email</th>
            
            <th colspan="2">Action</th>
        </tr>
    </thead> 

 <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['f_name']; ?></td>
            <td><?php echo $row['l_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td> 
        
             <td>
                <a href="newstu.php?edit=<?php echo $row['id']; ?>" class="edit_btn" alt="Update" /> Update</a>
            </td>


            <td>
                <a href="newstu.php?delbb=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>

        </tr>
    <?php } ?>
   


    <form method="post" action="newstu.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>First name</label>
            <input type="text" name="f_name" value="<?php echo $f_name; ?>">
        </div>
        <div class="input-group">
            <label>last name</label>
            <input type="text" name="l_name" value="<?php echo $l_name; ?>">
        </div>

        <div class="input-group">
            <label>gender</label>
            <input type="text" name="gender" value="<?php echo $gender; ?>">
        </div>

        <div class="input-group">
            <label>dob</label>
            <input type="date" name="dob" value="<?php echo $dob; ?>">
        </div>

        <div class="input-group">
            <label>address</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
        </div>

        <div class="input-group">
            <label>phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>

        <div class="input-group">
            <label>email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>

    
             <div class="input-group">
           <?php if ($update == true): ?>
    <input  class="btn" type="submit" name="update" value= "UPDATE" style="background: #556B2F;" >
    <?php else: ?>
    <input  class="btn" type="submit" name="save" value= "SAVE" >
<?php endif ?>
        </div>

    </form>
</body>
</html>   