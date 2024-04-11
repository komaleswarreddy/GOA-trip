<?php
include 'connect.php';
if (!empty($_POST)) {
    $s_no = isset($_POST['s_no']) ? $_POST['s_no'] : 0; 
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO trip (`S.no`, `Name`, `Age`, `Gender`, `email`, `ph.no`, `Other`) VALUES ('$s_no', '$name', '$age', '$gender', '$email', '$phone', '$desc')";

    if ($connection->query($sql) === TRUE) {
        header('Location: display.php');
    }
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .container .btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            margin: 5px;
            transition: all 0.3s ease;
            outline: none;
            display: inline-block;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #d62976, #fa7e1e);
        }
        .container .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }
        .container .btn::after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0);
            transition: background-color 0.3s;
            border-radius: 6px;
        }
        .container .btn:hover::after {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .container .btn::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            z-index: -1;
            transition: transform 0.3s;
        }
        .container .btn:hover::before {
            transform: rotate(10deg);
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video autoplay loop muted>
            <source src="61d9da7e9ec1143bb90742608f033a82 (1).mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    
    <div class="container">
        <h1>Welcome to the GOA Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <form action="" method="post"> 
            <input type="text" name="s_no" id="s_no" placeholder="Enter ID.no">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn" type="submit">Submit</button> 
        </form>
    </div>
</body>
</html>

 
