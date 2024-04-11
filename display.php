 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Details</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        #video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        #video-container video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .content {
            position: relative;
            z-index: 1;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            height: 80vh;
            overflow-y: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6e6e6;
            transition: background-color 0.3s ease;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-update, .btn-delete {
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            margin: 5px;
            transition: all 0.3s ease;
            outline: none;
            display: inline-block;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-update {
            background: linear-gradient(45deg, #2196f3, #3f51b5);
        }

        .btn-delete {
            background: linear-gradient(45deg, #f44336, #ff5722);
        }

        .btn-update:hover, .btn-delete:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-update::after, .btn-delete::after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            transition: background-color 0.3s;
            border-radius: 30px;
            z-index: -1;
        }

        .btn-update:hover::after, .btn-delete:hover::after {
            background-color: rgba(255, 255, 255, 0.4);
        }
        @media only screen and (max-width: 768px) {
    .content {
        height: auto;
        max-height: 80vh;
        border-radius: 10px;
    }

    table {
        font-size: 14px;
    }

    th, td {
        padding: 8px;
    }

    .btn-update, .btn-delete {
        font-size: 14px;
        padding: 8px 16px;
    }
}
        @keyframes shake {
            0% { transform: translateX(0); }
            20% { transform: translateX(-5px) rotate(2deg); }
            40% { transform: translateX(5px) rotate(-2deg); }
            60% { transform: translateX(-5px) rotate(2deg); }
            80% { transform: translateX(5px) rotate(-2deg); }
            100% { transform: translateX(0); }
        }

        .btn-update.shake {
            animation: shake 0.5s ease-in-out;
        }

        .btn-delete.shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .content {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video autoplay loop muted>
            <source src=" mixkit-white-sand-beach-background-1564-medium.mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="content">
        <h2 style="text-align: center;">Trip Details</h2>
        <table>
            <tr>
                <th>ID.NO</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Other</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'connect.php';
            $result = $connection->query("SELECT * FROM trip");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['S.no'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Age'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['ph.no'] . "</td>";
                echo "<td>" . $row['Other'] . "</td>";
                echo '<td class="btn-container">';
                echo '<a href="update.php?updateid=' . $row['S.no'] . '" class="btn-update">Update</a>';
                echo '<a href="delete.php?deleteid=' . $row['S.no'] . '" class="btn-delete">Delete</a>';
                echo '</td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>