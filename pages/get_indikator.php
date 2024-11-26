<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_elemen = $_POST['id_elemen'];

    $query_indikator = "SELECT id_indikator, nama_indikator FROM indikator WHERE id_elemen = ?";
    $stmt = $conn->prepare($query_indikator);
    $stmt->bind_param("i", $id_elemen);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<option value="">Pilih Indikator</option>';
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_indikator']}'>{$row['nama_indikator']}</option>";
        }
    } else {
        echo '<option value="">Tidak ada indikator tersedia</option>';
    }

    $stmt->close();
    $conn->close();
}
?>
