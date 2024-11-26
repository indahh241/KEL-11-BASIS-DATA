<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penilaian</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
include '../config/db.php';
$id = $_GET['id'];
$sql = "DELETE FROM penilaian_mandiri WHERE id_penilaian = $id";
if ($conn->query($sql)) {
    header("Location: index.php");
}
?>
