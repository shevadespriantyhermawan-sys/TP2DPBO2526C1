<?php
require_once 'Orang.php';

class Dokter extends Orang {
    protected $spesialisasi;
    protected $noSTR;
    protected $pengalamanTahun;

    public function __construct($id = "", $nama = "", $jenisKelamin = "", $spesialisasi = "", $noSTR = "", $pengalamanTahun = 0) {
        parent::__construct($id, $nama, $jenisKelamin);
        $this->spesialisasi = $spesialisasi;
        $this->noSTR = $noSTR;
        $this->pengalamanTahun = $pengalamanTahun;
    }

    public function getSpesialisasi() { return $this->spesialisasi; }
    public function getNoSTR() { return $this->noSTR; }
    public function getPengalamanTahun() { return $this->pengalamanTahun; }
}
?>