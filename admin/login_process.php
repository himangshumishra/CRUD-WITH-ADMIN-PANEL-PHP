<?php
session_start();

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve admin details from the database
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if admin exists
    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        
        // Verify the password
        if ($password === $admin['password']) {
            // Password is correct, login successful
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['role'] = 'admin'; // Assuming this is necessary for access control
            header("Location: index.php");
            exit;
        } else {
            // Invalid password
            echo "Invalid password";
        }
    } else {
        // Admin does not exist
        echo "Admin does not exist";
    }
}
?>
