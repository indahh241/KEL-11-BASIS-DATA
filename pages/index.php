<?php
include '../config/db.php'; // Koneksi database
?>

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
            <li><a href="create.php">Tambah Penilaian</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <header>
            <h1>Dashboard Penilaian</h1>
            <p>Selamat datang di aplikasi penilaian program studi!</p>
        </header>

        <!-- Data Ringkasan -->
        <div class="card-container">
            <div class="card">
                <h3>Total Elemen Penilaian</h3>
                <?php
                $query_elemen = "SELECT COUNT(*) AS total FROM elemen_penilaian";
                $result_elemen = $conn->query($query_elemen);
                $row_elemen = $result_elemen->fetch_assoc();
                echo "<p>{$row_elemen['total']}</p>";
                ?>
            </div>
            <div class="card">
                <h3>Total Indikator</h3>
                <?php
                $query_indikator = "SELECT COUNT(*) AS total FROM indikator";
                $result_indikator = $conn->query($query_indikator);
                $row_indikator = $result_indikator->fetch_assoc();
                echo "<p>{$row_indikator['total']}</p>";
                ?>
            </div>
            <div class="card">
                <h3>Total Penilaian</h3>
                <?php
                $query_penilaian = "SELECT COUNT(*) AS total FROM penilaian_mandiri";
                $result_penilaian = $conn->query($query_penilaian);
                $row_penilaian = $result_penilaian->fetch_assoc();
                echo "<p>{$row_penilaian['total']}</p>";
                ?>
            </div>
        </div>

        <!-- Data Tabel -->
        <section class="data-section">
            <h2>Daftar Penilaian Mandiri</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Elemen</th>
                        <th>Indikator</th>
                        <th>Penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query untuk mengambil data
                    $sql = "SELECT pm.id_penilaian, ep.nama_elemen, i.nama_indikator, pm.nilai 
                            FROM penilaian_mandiri pm
                            LEFT JOIN indikator i ON pm.id_indikator = i.id_indikator
                            LEFT JOIN elemen_penilaian ep ON i.id_elemen = ep.id_elemen";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $nomor = 1; // Nomor urut
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$nomor}</td>
                                <td>" . ($row['nama_elemen'] ? $row['nama_elemen'] : 'Tidak Diketahui') . "</td>
                                <td>" . ($row['nama_indikator'] ? $row['nama_indikator'] : 'Tidak Diketahui') . "</td>
                                <td>{$row['nilai']}</td>
                            </tr>";
                            $nomor++;
                        }
                    } else {
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
