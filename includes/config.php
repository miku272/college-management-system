<?php
$con = mysqli_connect('localhost', 'root', '', 'college_management_system');

if($con) {
    echo "Database Connection Successful!";
} else {
    echo "Connection failed...";
}

?>