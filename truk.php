<?php
// Truk.php
require_once 'Kendaraan.php';

class Truk extends Kendaraan {
    private $kapasitas_muatan_ton;
    private $jumlah_roda;

    public function __construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari, $kapasitas_muatan_ton = null, $jumlah_roda = null) {
        parent::__construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari);
        $this->kapasitas_muatan_ton = $kapasitas_muatan_ton;
        $this->jumlah_roda = $jumlah_roda;
    }

    // OVERRIDING: Dikenakan biaya tambahan surcharge 25% (Sama dengan konsep Kedinasan)
    public function hitungTotalBiaya($jumlah_hari) {
        $biaya_dasar = $this->harga_sewa_per_hari * $jumlah_hari;
        return $biaya_dasar * 1.25;
    }

    public function tampilkanInfoKategori() {
        return "Kategori: Truk | Muatan Maksimal: " . $this->kapasitas_muatan_ton . " Ton | Jumlah Roda: " . $this->jumlah_roda;
    }

    public static function getDaftarTruk($db) {
        $query = "SELECT id_kendaraan, nomor_rangka, merek, tahun_produksi, harga_sewa_per_hari, kapasitas_muatan_ton, jumlah_roda 
                  FROM tabel_kendaraan 
                  WHERE jenis_kendaraan = 'Truk'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>