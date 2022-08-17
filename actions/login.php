<?php
    if (isset($_POST['signInBtn'])) {
        $email = $_POST['signInEmail'];
        $password = $_POST['signInPass'];
    }

    if ($email === 'admin@example.com' and $password === '123') {
        session_start();
        $_SESSION['signIn'] = true;
        header('location: ../admin/dashboard.php');
    } elseif ($email === 'student@example.com' and $password === '123') {
        session_start();
        $_SESSION['student'] = true;
        header('location: ../student/dashboard.php');
    } else {
        echo "<script>alert('Invalid email or password')</script>";
    }
?>