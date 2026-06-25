<?php
// index.php

// 1. Import koneksi database dan kelas-kelas anak
require_once 'koneksi/database.php';
require_once 'Mobil.php';
require_once 'Motor.php';
require_once 'Truk.php';

// 2. Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

// Jumlah hari sewa simulasi (misal untuk menghitung total biaya sewa selama 3 hari)
$durasi_sewa = 3; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kendaraan - Showroom / Sewa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; }
        h2 { margin-top: 40px; color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #34495e; color: #fff; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .info-spesifik { font-style: italic; color: #7f8c8d; }
        .total-biaya { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>Sistem Informasi Manajemen Kendaraan (PBO)</h1>
    <p style="text-align: center;">Simulasi Perhitungan Total Biaya Sewa untuk <strong><?html echo $durasi_sewa; ?> Hari</strong></p>

    <h2>Daftar Kendaraan: Kategori Mobil</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Rangka</th>
                <th>Merek</th>
                <th>Tahun</th>
                <th>Tarif / Hari</th>
                <th>Informasi Spesifik Kategori</th>
                <th>Total Biaya (+ Surcharge/Diskon)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Memanggil metode query spesifik dari Tahap 4
            $daftarMobil = Mobil::getDaftarMobil($db);
            foreach ($daftarMobil as $row) {
                // Instansiasi objek Mobil agar bisa menggunakan metode polimorfik
                $mobilObj = new Mobil(
                    $row['id_kendaraan'], $row['nomor_rangka'], $row['merek'], 
                    $row['tahun_produksi'], $row['harga_sewa_per_hari'], 
                    $row['kapasitas_penumpang'], $row['tipe_mobil']
                );
                ?>
                <tr>
                    <td><?php echo $row['id_kendaraan']; ?></td>
                    <td><?php echo $row['nomor_rangka']; ?></td>
                    <td><?php echo $row['merek']; ?></td>
                    <td><?php echo $row['tahun_produksi']; ?></td>
                    <td>Rp <?php echo number_format($row['harga_sewa_per_hari'], 2, ',', '.'); ?></td>
                    <td class="info-spesifik"><?php echo $mobilObj->tampilkanInfoKategori(); ?></td>
                    <td class="total-biaya">Rp <?php echo number_format($mobilObj->hitungTotalBiaya($durasi_sewa), 2, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Daftar Kendaraan: Kategori Motor</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Rangka</th>
                <th>Merek</th>
                <th>Tahun</th>
                <th>Tarif / Hari</th>
                <th>Informasi Spesifik Kategori</th>
                <th>Total Biaya (+ Surcharge/Diskon)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $daftarMotor = Motor::getDaftarMotor($db);
            foreach ($daftarMotor as $row) {
                $motorObj = new Motor(
                    $row['id_kendaraan'], $row['nomor_rangka'], $row['merek'], 
                    $row['tahun_produksi'], $row['harga_sewa_per_hari'], 
                    $row['kapasitas_cc'], $row['tipe_stang']
                );
                ?>
                <tr>
                    <td><?php echo $row['id_kendaraan']; ?></td>
                    <td><?php echo $row['nomor_rangka']; ?></td>
                    <td><?php echo $row['merek']; ?></td>
                    <td><?php echo $row['tahun_produksi']; ?></td>
                    <td>Rp <?php echo number_format($row['harga_sewa_per_hari'], 2, ',', '.'); ?></td>
                    <td class="info-spesifik"><?php echo $motorObj->tampilkanInfoKategori(); ?></td>
                    <td class="total-biaya">Rp <?php echo number_format($motorObj->hitungTotalBiaya($durasi_sewa), 2, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Daftar Kendaraan: Kategori Truk</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Rangka</th>
                <th>Merek</th>
                <th>Tahun</th>
                <th>Tarif / Hari</th>
                <th>Informasi Spesifik Kategori</th>
                <th>Total Biaya (+ Surcharge/Diskon)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $daftarTruk = Truk::getDaftarTruk($db);
            foreach ($daftarTruk as $row) {
                $trukObj = new Truk(
                    $row['id_kendaraan'], $row['nomor_rangka'], $row['merek'], 
                    $row['tahun_produksi'], $row['harga_sewa_per_hari'], 
                    $row['kapasitas_muatan_ton'], $row['jumlah_roda']
                );
                ?>
                <tr>
                    <td><?php echo $row['id_kendaraan']; ?></td>
                    <td><?php echo $row['nomor_rangka']; ?></td>
                    <td><?php echo $row['merek']; ?></td>
                    <td><?php echo $row['tahun_produksi']; ?></td>
                    <td>Rp <?php echo number_format($row['harga_sewa_per_hari'], 2, ',', '.'); ?></td>
                    <td class="info-spesifik"><?php echo $trukObj->tampilkanInfoKategori(); ?></td>
                    <td class="total-biaya">Rp <?php echo number_format($trukObj->hitungTotalBiaya($durasi_sewa), 2, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>