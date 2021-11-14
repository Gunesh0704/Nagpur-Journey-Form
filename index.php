<?php
$insert =false;
// set connection variables
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password ="";

//create database connection
$con = mysqli_connect($server, $username, $password);

//check database connection
if(!$con){
    die("connection to this database failed due to". mysqli_connect_error());
}
//echo "Sucessfully connected to DataBase"

//Collect post Variable
$name= $_POST['name'];
$age= $_POST['age'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$desc= $_POST['desc'];
$sql = "INSERT INTO `ngp_jrn`.`ngp_jrn` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `date/time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

//Execute the query
if($con->query($sql) == true){
    //echo "Successfully inserted";

    //program successfully done.
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $conn->error";

}

//close db conn.
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="image" src="bg.jpg" alt="Nagpur">
    <div class="container">
        <h1>Welcome to Nagpur Jorney Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
       echo "<p class='submsg'>Thank you for submitting your Details. Welcome to Nagpur Jorney</p>";
    }
    ?>
       
       
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
          
<!--
    INSERT INTO `ngp_jrn` (`sno.`, `name`, `age`, `gender`, `email`, `phone`, `desc`, `date/time`) VALUES (NULL, 'testname', '20', 'male', 'joe@how.com', '999999999', 'i am very tired', current_timestamp());
-->

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>