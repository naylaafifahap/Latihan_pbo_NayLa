<?php
// Kendaraan.php

abstract class Kendaraan {
    // Properti Terenkapsulasi (protected)
    protected $id_kendaraan;
    protected $nomor_rangka;
    protected $merek;
    protected $tahun_produksi;
    protected $harga_sewa_per_hari;

    // Constructor untuk menginisialisasi properti
    public function __construct($id_kendaraan, $nomor_rangka, $merek, $tahun_produksi, $harga_sewa_per_hari) {
        $this->id_kendaraan = $id_kendaraan;
        $this->nomor_rangka = $nomor_rangka;
        $this->merek = $merek;
        $this->tahun_produksi = $tahun_produksi;
        $this->harga_sewa_per_hari = $harga_sewa_per_hari;
    }

    // =========================================================================
    // TAHAP 3 (Lanjutan): Deklarasi Metode Abstrak (Tanpa Isi/Body)
    // Method ini wajib di-override dan diimplementasikan oleh class-class anak
    // =========================================================================
    
    // Menggantikan abstract public function hitungTotalBiaya();
    abstract public function hitungTotalBiaya($jumlah_hari);

    // Menggantikan abstract public function tampilkanInfoJalur();
    abstract public function tampilkanInfoKategori();
}
?>