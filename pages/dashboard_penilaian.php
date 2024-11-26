<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penilaian</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="../images/logo.png" alt="Logo" class="logo-img">
        </div>
        <h2>Menu</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <header>
            <h1>Dashboard Penilaian</h1>
            <p>Selamat datang di aplikasi penilaian program studi!</p>
        </header>

        <!-- Data Tabel -->
        <section class="data-section">
            <h2>Daftar Penilaian Mandiri</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Elemen Penilaian</th>
                        <th>Indikator</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query untuk mengambil data
                    $sql = "SELECT ep.id_elemen, ep.nama_elemen, i.nama_indikator, pm.nilai 
                            FROM elemen_penilaian ep
                            JOIN indikator i ON ep.id_elemen = i.id_elemen
                            LEFT JOIN penilaian_mandiri pm ON i.id_indikator = pm.id_indikator";

                    // Eksekusi query
                    $result = $conn->query($sql);

                    // Periksa apakah query berhasil
                    if (!$result) {
                        echo "<tr><td colspan='4'>Error: " . $conn->error . "</td></tr>";
                    } elseif ($result->num_rows > 0) {
                        // Nomor urut
                        $nomor = 1;

                        // Tampilkan data jika ada
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$nomor}</td>
                                <td>{$row['nama_elemen']}</td>
                                <td>{$row['nama_indikator']}</td>
                                <td>{$row['nilai']}</td>
                            </tr>";
                            $nomor++;
                        }
                    } else {
                        // Tampilkan pesan jika data kosong
                        echo "<tr><td colspan='4'>Tidak ada data yang tersedia.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Penilaian Aplikasi | Hak Cipta Dilindungi</p>
    </footer>
</body>
</html>
