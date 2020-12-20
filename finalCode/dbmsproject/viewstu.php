 <?php

include('config.php');  

       if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
       // $update = true;
        $record = mysqli_query($db, "SELECT * FROM stud_tbl WHERE id=$id");

        if (mysqli_num_rows($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $f_name =  $n['f_name'];
            $l_name=$n['l_name'];
            $gender=$n['gender'];
            $dob=$n['yy']."/".$n['mm']."/".$n['dd'];
    
            $address=$n['address'];
            $phone=$n['phone'];
            $email=$n['email'];

            $result = mysqli_query($db, "SELECT count(*) as total FROM stud_tbl");
            $row = mysqli_fetch_array($result);
            $count = $row['count'];
            echo $count['total'];
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
           
        </tr>
    <?php } ?>
    

    </form>
</body>
</html>   


