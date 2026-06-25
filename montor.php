<?php
// Motor.php
require_once 'Kendaraan.php';

class Motor extends Kendaraan {
    private $kapasitas_cc;
    private $tipe_stang;

    public function __construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari, $kapasitas_cc = null, $tipe_stang = null) {
        parent::__construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari);
        $this->kapasitas_cc = $kapasitas_cc;
        $this->tipe_stang = $tipe_stang;
    }

    // OVERRIDING: Mendapatkan potongan Rp50.000 (Sama dengan konsep Prestasi)
    public function hitungTotalBiaya($jumlah_hari) {
        $biaya_dasar = $this->harga_sewa_per_hari * $jumlah_hari;
        return $biaya_dasar - 50000;
    }

    public function tampilkanInfoKategori() {
        return "Kategori: Motor | Kapasitas CC: " . $this->kapasitas_cc . "cc | Tipe Stang: " . $this->tipe_stang;
    }

    public static function getDaftarMotor($db) {
        $query = "SELECT id_kendaraan, nomor_rangka, merek, tahun_produksi, harga_sewa_per_hari, kapasitas_cc, tipe_stang 
                  FROM tabel_kendaraan 
                  WHERE jenis_kendaraan = 'Motor'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>