<?php  
include('config.php');  

 if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM faculty_tbl WHERE id=$id");

        if (mysqli_num_rows($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $f_name =  $n['f_name'];
            $l_name=$n['l_name'];
            $gender=$n['gender'];
            $department=$n['department'];
            $salary=$n['salary'];
            $phone=$n['phone'];
            $email=$n['email'];
    
        }
    }

     if (isset($_POST['save'])) {
       
        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $gender=$_POST['gender'];
        $department=$_POST['department'];
        $salary=$_POST['salary'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];;

        $q1="INSERT INTO faculty_tbl VALUES('' ,'$f_name' , '$l_name', '$gender', '$department', $salary, '$phone', '$email')";
        mysqli_query($db,$q1);
            $_SESSION['message'] = "Data saved";       
    }

        if (isset($_POST['update'])) {
         $id = $_POST['id'];
       $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $gender=$_POST['gender'];
        $department=$_POST['department'];
        $salary=$_POST['salary'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];;

        mysqli_query($db, "UPDATE faculty_tbl SET f_name='$f_name', l_name='$l_name', gender='$gender', department='$department', salary='$salary', phone='$phone', email='$email'  WHERE id=$id");
        $_SESSION['message'] = "Data updated!"; 
        }

    if (isset($_GET['delbb'])) {
    $id = $_GET['delbb'];
    mysqli_query($db, "DELETE FROM faculty_tbl WHERE id=$id");
    $_SESSION['message'] = "Data deleted!"; 
    }


?>


<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <?php  $results = mysqli_query($db, "SELECT * FROM faculty_tbl"); ?>
<button  onclick="document.location='all.php'" >HOME</button>
<table>
    <thead>
        <tr>
            
            <th>First Name</th>
            <th >Last Name</th>
            <th>Gender</th>
             <th>Department</th>
            <th >Salary</th>
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
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td> 
        
             <td>
                <a href="faculty.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Update</a>
            </td>

            <td>
                <a href="faculty.php?delbb=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
   


    <form method="post" action="faculty.php" >
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
            <label>Department</label>
            <input type="text" name="department" value="<?php echo $department; ?>">
        </div>

        <div class="input-group">
            <label>Salary</label>
            <input type="text" name="salary" value="<?php echo $salary; ?>">
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