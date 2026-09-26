<?php
require_once 'Dokter.php';

class DokterSpesialis extends Dokter {
    private $subspesialisasi;
    private $biayaKonsultasi;
    private $rumahSakitUtama;
    private $foto; // Atribut Khusus PHP

    public function __construct($id = "", $nama = "", $jenisKelamin = "", $spesialisasi = "", $noSTR = "", $pengalamanTahun = 0,
                                $subspesialisasi = "", $biayaKonsultasi = 0, $rumahSakitUtama = "", $foto = "default.jpg") {
        parent::__construct($id, $nama, $jenisKelamin, $spesialisasi, $noSTR, $pengalamanTahun);
        $this->subspesialisasi = $subspesialisasi;
        $this->biayaKonsultasi = $biayaKonsultasi;
        $this->rumahSakitUtama = $rumahSakitUtama;
        $this->foto = $foto;
    }

    public function getSubspesialisasi() { return $this->subspesialisasi; }
    public function getBiayaKonsultasi() { return $this->biayaKonsultasi; }
    public function getRumahSakitUtama() { return $this->rumahSakitUtama; }
    public function getFoto() { return $this->foto; }
}
?>