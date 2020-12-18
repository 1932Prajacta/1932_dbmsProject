 <?php

include('config.php');  

       if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
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

    <?php  $results = mysqli_query($db, "SELECT * FROM faculty_tbl"); ?>
<button  onclick="document.location='all.php'" >BACK</button>
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
        </tr>
    <?php } ?>
</table>
</body>
</html>



