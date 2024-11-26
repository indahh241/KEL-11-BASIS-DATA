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

$result = $conn->query("SELECT * FROM penilaian_mandiri WHERE id_penilaian = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nilai = $_POST['nilai'];
    $sql = "UPDATE penilaian_mandiri SET nilai = $nilai WHERE id_penilaian = $id";
    if ($conn->query($sql)) {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Penilaian</title>
</head>
<body>
    <h1>Edit Nilai</h1>
    <form method="POST">
        <label>Nilai:</label>
        <input type="number" name="nilai" value="<?= $data['nilai'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
