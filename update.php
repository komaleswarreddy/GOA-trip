<?php
include 'connect.php';

$id = $_GET['updateid'];
$result = $connection->query("SELECT * FROM trip WHERE `S.no`='$id'");
$row = $result->fetch_assoc();

if (!empty($_POST)) {
    $s_no = isset($_POST['s_no']) ? $_POST['s_no'] : 0;
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "UPDATE trip SET `name`='$name', `age`='$age', `gender`='$gender', `email`='$email', `ph.no`='$phone', `Other`='$desc' WHERE `S.no`='$id'";

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
        @media only screen and max-width: (768px) {
    .container {
        max-width: 90%;
        padding: 20px;
    }

    input,
    textarea {
        width: 100%;
    }
}
    </style>
</head>
<body>
    <div id="video-container">
        <video autoplay loop muted>
            <source src=" 135860-764362114_small.mp4 " type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    
    <div class="container">
        <h1>Welcome to the GOA Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <form action="" method="post">
    <input type="text" name="s_no" id="s_no" placeholder="Enter ID.no" value="<?php echo isset($row['S.no']) ? $row['S.no'] : ''; ?>">
    <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
    <input type="text" name="age" id="age" placeholder="Enter your Age" value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender" value="<?php echo isset($row['gender']) ? $row['gender'] : ''; ?>">
    <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
    <input type="tel" name="phone" id="phone" placeholder="Enter your phone" value="<?php echo isset($row['ph.no']) ? $row['ph.no'] : ''; ?>">
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"><?php echo isset($row['Other']) ? $row['Other'] : ''; ?></textarea>
    <button class="btn" type="submit">Update</button> 
</form>

    </div>
</body>
</html>

