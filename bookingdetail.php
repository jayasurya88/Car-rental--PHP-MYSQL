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
// $id = $_SESSION['id']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING DETAIL</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
   <h1 style="color:green;text-align: center;font-weight: 500;">Your order is confirmed .</h1> 
   <h4 style="color:#ff4d30 ;text-align: center;font-weight: 500;">Our Authorized Staff will contact you soon for further Agreement Procedure </h4>   
    <h3 style="color:black;text-align: center;font-weight: 500;">Booking details of <?php echo $name?></h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                
                <th>Car</th>
                <th>Pickup Location</th>
                <th>Drop Of Loaction</th>
                <th>Pickup Date</th>
                <th>Drop Date</th>
                <th>Cancel Booking</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
   
           

            
            
                $sql = "SELECT * FROM book WHERE email = '$email'";
                $result = $conn->query($sql);

                
                
            ?>
            <?php 
                
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
               
                
                <td><?php echo $rows['carname'];?></td>
                <td><?php echo $rows['pickup'];?></td>
                <td><?php echo $rows['dropoff'];?></td>
                <td><?php echo $rows['picktime'];?></td>
                <td><?php echo $rows['droptime'];?></td>
                <td><a href="delete1.php?id=<?php echo $rows["id"]; ?>" class="delete" >Cancel</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <a href="booking.php" class="btn"><b>Back To Booking<b></a>
    <style>
        
        .btn{
            justify-content: center;
            width: 100%;
            padding: 0.4em 0.8em;
            border-radius: 10px;
            align-items: center;
            font-size: 30px;
            background-color:#ff4d30 

            
        }
        #navbar h3 {
    font-size: 1.5rem;
    padding: 20px 10px;

}

:root {
    --navbar-bg-color: hsl(0, 0%, 15%);
    --navbar-text-color: hsl(0, 0%, 85%);
    --navbar-text-color-focus: white;
    --navbar-bg-contrast: hsl(0, 0%, 25%);
}


.container {
    max-width: 1000px;
    padding-left: 1.4rem;
    padding-right: 1.4rem;
    margin-left: auto;
    margin-right: auto;
}

#navbar {
    --navbar-height: 100px;
    position: fixed;
    height: var(--navbar-height);
    background-color: #fff;
    left: 0;
    right: 0;
    box-shadow: 0 0 10px rgba(0, 0, 0, .09);
    z-index: 200;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    height: 100%;
    align-items: center;
}

.navbar-item {
    margin: 0.4em;
    width: 100%;
}

.home-link,
.navbar-link {
    text-decoration: none;
    color: #2d2e32;
    font-size: 1.17rem;
    position: relative;
    display: flex;
    align-items: center;

}

.home-link:is(:focus, :hover) {
    color: var(--navbar-text-color-focus);
}

.navbar-link {
    justify-content: center;
    width: 100%;
    padding: 0.4em 0.8em;
    border-radius: 5px;
    align-items: center;
    font-size: 17px;
}


.navbar-link::after {
    content: '';
    width: 0;
    height: 3px;
    background: #ff4d30;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;

}

.navbar-link:hover::after {
    width: 100%;
}

#navbar-toggle {
    cursor: pointer;
    border: none;
    background-color: #2d2e32;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.icon-bar {
    display: block;
    width: 25px;
    height: 4px;
    margin: 2px;
    background-color: var(--navbar-text-color);
}

#navbar-toggle:is(:focus, :hover) .icon-bar {
    background-color: var(--navbar-text-color-focus);
}

#navbar-toggle[aria-expanded="true"] .icon-bar:is(:first-child, :last-child) {
    position: absolute;
    margin: 0;
    width: 30px;
}

#navbar-toggle[aria-expanded="true"] .icon-bar:first-child {
    transform: rotate(45deg);
}

#navbar-toggle[aria-expanded="true"] .icon-bar:nth-child(2) {
    opacity: 0;
}

#navbar-toggle[aria-expanded="true"] .icon-bar:last-child {
    transform: rotate(-45deg);
}

#navbar-menu {
    position: fixed;
    top: var(--navbar-height);
    bottom: 0;
    opacity: 0;
    visibility: hidden;
    left: 0;
    right: 0;
}

#navbar-toggle[aria-expanded="true"]+#navbar-menu {
    background-color: rgba(0, 0, 0, 0.4);
    opacity: 1;
    visibility: visible;
}

.navbar-links {
    list-style: none;
    position: absolute;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    left: 0;
    right: 0;
    margin: 1.4rem;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
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
        

    </style>
  
        
    </body>
</html>