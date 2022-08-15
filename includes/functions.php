<?php
function get_classes($con)
{
    $query = mysqli_query($con, "SELECT * FROM classes");
    $output = array();

    while ($classes = mysqli_fetch_object($query)) {
        $output[] = $classes;
    }

    return $output;
}

function get_post(array $args = [])
{
    global $con;

    if (!empty($args)) {
        $condition = "WHERE 0 ";
        foreach ($args as $k => $v) {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }

        if ($condition_ar > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
    };


    $sql = "SELECT * FROM posts $condition";
    $query = mysqli_query($con, $sql);

    return mysqli_fetch_object($query);
}

function get_posts(array $args = [], string $type = 'object')
{
    global $con;
    $condition = "WHERE 0 ";

    if (!empty($args)) {
        foreach ($args as $k => $v) {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }

        if ($condition_ar > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
    };


    $sql = "SELECT * FROM posts $condition";
    $query = mysqli_query($con, $sql);

    return data_output($query, $type);
}

function get_metadata($item_id, $meta_key = '', $type = 'object')
{
    global $con;
    $query = mysqli_query($con, "SELECT * FROM metadata WHERE item_id = $item_id");

    if (!empty($meta_key)) {
        $query = mysqli_query($con, "SELECT * FROM metadata WHERE item_id = $item_id AND meta_key = '$meta_key'");
    }

    return data_output($query, $type);
}


function data_output($query, $type = 'object')
{
    $output = array();

    if ($type == 'object') {
        while ($result = mysqli_fetch_object($query)) {
            $output[] = $result;
        }
    } else {
        while ($result = mysqli_fetch_assoc($query)) {
            $output[] = $result;
        }
    }

    return $output;
}

function get_user_data($user_id, $type = 'object')
{
    global $con;
    $query = mysqli_query($con, "SELECT * FROM accounts WHERE id = $user_id");

    return data_output($query, $type);
}
