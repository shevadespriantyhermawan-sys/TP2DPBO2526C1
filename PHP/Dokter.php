<?php
// Mengimpor file kelas induk (Orang.php) agar kelas Dokter dapat melakukan pewarisan (inheritance)
require_once 'Orang.php';

/**
 * Kelas Dokter
 * Merupakan kelas turunan (child class) dari kelas Orang.
 */
class Dokter extends Orang {
    // Deklarasi atribut khusus untuk Dokter dengan hak akses protected
    protected $spesialisasi;
    protected $noSTR;
    protected $pengalamanTahun;

    /**
     * Konstruktor Kelas Dokter
     * Memanggil konstruktor kelas induk (Orang) dan menginisialisasi atribut khusus Dokter.
     * 
     * @param string $id              ID unik dokter
     * @param string $nama            Nama lengkap dokter
     * @param string $jenisKelamin    Jenis kelamin
     * @param string $spesialisasi    Bidang spesialisasi medis
     * @param string $noSTR           Nomor Surat Tanda Registrasi
     * @param int    $pengalamanTahun Lama pengalaman praktik (dalam tahun)
     */
    public function __construct($id = "", $nama = "", $jenisKelamin = "", $spesialisasi = "", $noSTR = "", $pengalamanTahun = 0) {
        // Mengirimkan parameter umum ke konstruktor kelas induk (Orang)
        parent::__construct($id, $nama, $jenisKelamin);
        
        // Mengisi atribut spesifik kelas Dokter
        $this->spesialisasi = $spesialisasi;
        $this->noSTR = $noSTR;
        $this->pengalamanTahun = $pengalamanTahun;
    }

    // --- Getter Methods (Fungsi untuk mengambil nilai atribut) ---

    // Mengambil bidang spesialisasi
    public function getSpesialisasi() { 
        return $this->spesialisasi; 
    }

    // Mengambil nomor STR
    public function getNoSTR() { 
        return $this->noSTR; 
    }

    // Mengambil lama pengalaman praktik dalam tahun
    public function getPengalamanTahun() { 
        return $this->pengalamanTahun; 
    }
}
?>