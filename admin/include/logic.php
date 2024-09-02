<?php

$sql = "SELECT * FROM user_table";
$query = mysqli_query($conn, $sql);

// Get post data based on id
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM user_table WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}
