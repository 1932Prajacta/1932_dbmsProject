<?php  
include('config.php');  

 if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM courses WHERE id=$id");

        if (mysqli_num_rows($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $course_name =  $n['course_name'];
            $credits=$n['credits'];
            $department=$n['department'];
    
        }
    }

     if (isset($_POST['save'])) {
       
        $course_name=$_POST['course_name'];
        $credits=$_POST['credits'];
        $department=$_POST['department'];

        $q1="INSERT INTO courses VALUES('' ,'$course_name' , '$credits', '$department')";
        mysqli_query($db,$q1);
            $_SESSION['message'] = "Data saved";       
    }

        if (isset($_POST['update'])) {
         $id = $_POST['id'];
       $course_name=$_POST['course_name'];
        $credits=$_POST['credits'];
        $department=$_POST['department'];

        mysqli_query($db, "UPDATE courses SET course_name='$course_name', credits='$credits', department='$department' WHERE id=$id");
        $_SESSION['message'] = "Data updated!"; 
        }

    if (isset($_GET['delbb'])) {
    $id = $_GET['delbb'];
    mysqli_query($db, "DELETE FROM courses WHERE id=$id");
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

    <?php  $results = mysqli_query($db, "SELECT * FROM courses"); ?>
<button  onclick="document.location='all.php'" >HOME</button>
<table>
    <thead>
        <tr>
            
            <th>Course Name</th>
            <th >Credits</th>
             <th>Department</th>
            
            <th colspan="2">Action</th>
        </tr>
    </thead> 

 <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['credits']; ?></td>
            <td><?php echo $row['department']; ?></td>
            
             <td>
                <a href="course.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>

            <td>
                <a href="course.php?delbb=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
   


    <form method="post" action="course.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Course name</label>
            <input type="text" name="course_name" value="<?php echo $course_name; ?>">
        </div>
        <div class="input-group">
            <label>Credits</label>
            <input type="text" name="credits" value="<?php echo $credits; ?>">
        </div>

        <div class="input-group">
            <label>Department</label>
            <input type="text" name="department" value="<?php echo $department; ?>">
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