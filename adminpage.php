<?php
 $hostName = "localhost";
 $userName = "root";
 $password = "";
 $databaseName = "car_rental";
  $conn = new mysqli($hostName, $userName, $password, $databaseName);
 
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
session_start();

$email = $_SESSION['email'];
$name = $_SESSION['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN PAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Booking details</h2>
 
  <table class="table table-bordered">
  <thead>
            <tr>
                <th>Status</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Car</th>
                <th>Pickup Location</th>
                <th>Drop Of Loaction</th>
                <th>Pickup Date</th>
                <th>Drop Date</th>
                <th>Option</th>
                <th></th>
                
                

            </tr>
        </thead>
        <tbody>
            <?php
            
   
           

            
            
                $sql = "SELECT * FROM book";
                $result = $conn->query($sql);

                
                
            ?>
            <?php 
                
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['status'];?></td>    
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['carname'];?></td>
                <td><?php echo $rows['pickup'];?></td>
                <td><?php echo $rows['dropoff'];?></td>
                <td><?php echo $rows['picktime'];?></td>
                <td><?php echo $rows['droptime'];?></td>
                <td><a href="delete.php?id=<?php echo $rows["id"]; ?>" class="delete" >Delete</a></td>
                <td><a href="pending.php?id=<?php echo $rows["id"]; ?>" class="delete" >finished</a></td>
                
                

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</html>



    <a href="login_form.php" class="btn"><b>Back To Login<b></a>
    <style>
        
        .btn{
            justify-content: center;
            width: 100%;
            padding: 0.4em 0.8em;
            border-radius: 10px;
            align-items: center;
            font-size: 30px;
        }
        .delete{
    background-color: #f44336;
  color: white;
  padding: 6px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
    
}
.delete:hover{
    background-color: green;
}
.confirm{
    background-color: red;
  color: white;
  padding: 2px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
    
}
.finish:hover{
    background-color: red;
}

    </style>
    
</html>