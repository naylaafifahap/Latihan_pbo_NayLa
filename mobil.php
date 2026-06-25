<?php
// Mobil.php
require_once 'Kendaraan.php';

class Mobil extends Kendaraan {
    private $kapasitas_penumpang;
    private $tipe_mobil;

    public function __construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari, $kapasitas_penumpang = null, $tipe_mobil = null) {
        parent::__construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari);
        $this->kapasitas_penumpang = $kapasitas_penumpang;
        $this->tipe_mobil = $tipe_mobil;
    }

    // OVERRIDING: Tarif standar murni (Sama dengan konsep Reguler)
    public function hitungTotalBiaya($jumlah_hari) {
        return $this->harga_sewa_per_hari * $jumlah_hari;
    }

    public function tampilkanInfoKategori() {
        return "Kategori: Mobil | Tipe: " . $this->tipe_mobil . " | Kapasitas: " . $this->kapasitas_penumpang . " Orang";
    }

    public static function getDaftarMobil($db) {
        $query = "SELECT id_kendaraan, nomor_rangka, merek, tahun_produksi, harga_sewa_per_hari, kapasitas_penumpang, tipe_mobil 
                  FROM tabel_kendaraan 
                  WHERE jenis_kendaraan = 'Mobil'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>