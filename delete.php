<?php
// Include database connection
include 'connect.php';

// Check if the deleteid parameter is set in the URL
if(isset($_GET['deleteid'])) {
    // Retrieve the ID of the record to be deleted
    $delete_id = $_GET['deleteid'];

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM trip WHERE `S.no` = ?";

    // Prepare and bind the parameter to avoid SQL injection
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $delete_id);

    // Execute the statement
    $execute = $statement->execute();

    // Close prepared statement
    $statement->close();

    if ($execute) {
        // Redirect back to trip details page after deletion
        header('location: display.php');
        exit();
    } else {
        // Handle error if deletion fails
        echo "Error: " . $connection->error;
    }
} else {
    // Redirect to trip details page if deleteid parameter is not set
    header('location: display.php');
    exit();
}
?>
