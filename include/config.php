<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_pma_fajar');

function query($query)
{
    global $conn;

    $res = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }

    return $rows;
}
function insert($sql){
    global $conn;
    mysqli_query($conn,$sql);
}
?>