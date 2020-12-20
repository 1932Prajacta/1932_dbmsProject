 <?php

include('config.php');  

       if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $record = mysqli_query($db, "SELECT * FROM courses WHERE id=$id");

        if (mysqli_num_rows($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $course_name =  $n['course_name'];
            $credits=$n['credits'];
            $department=$n['department'];
        }
    }

?>


 <!DOCTYPE html>
<html>
<head>
    <title>College</title>
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
            
            
        </tr>
    </thead> 

 <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['credits']; ?></td>
            <td><?php echo $row['department']; ?></td>

        </tr>
    <?php } ?>

</table>
</body>
</html>



