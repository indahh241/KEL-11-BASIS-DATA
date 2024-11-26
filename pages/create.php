<?php
include '../config/db.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $elemen = $_POST['elemen'];
    $indikator = $_POST['indikator'];
    $nilai = $_POST['nilai'];

    // Validasi input
    if (!$elemen || !$indikator || !$nilai) {
        die("Semua data harus diisi!");
    }

    // Insert data ke dalam tabel penilaian_mandiri
    $sql = "INSERT INTO penilaian_mandiri (elemen, indikator, nilai) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $elemen, $indikator, $nilai);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penilaian</title>
</head>
<link rel="stylesheet" href="../css/style.css">
<body>
    <h1>Tambah Penilaian</h1>
    <form action="create.php" method="POST">
        <label for="elemen">Elemen:</label>
        <input type="text" name="elemen" id="elemen" required>

        <label for="indikator">Indikator:</label>
        <input type="text" name="indikator" id="indikator" required>

        <label for="nilai">Nilai:</label>
        <input type="number" name="nilai" id="nilai" required>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
