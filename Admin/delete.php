<?php
require_once "connect.php";
$id = $_GET['id'];
$queryDelete = "DELETE FROM artikel WHERE id='$id'";

if ($connect->query($queryDelete)) {
    echo "<script> alert('delete sukses'); window.location.href='index.php'</script>";
}
?>