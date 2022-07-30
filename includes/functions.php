<?php
function get_classes($con) {
    $query = mysqli_query($con, "SELECT * FROM classes");
    $output = array();

    while($classes = mysqli_fetch_object($query)) {
        $output[] = $classes;
    }

    return $output;
}
?>