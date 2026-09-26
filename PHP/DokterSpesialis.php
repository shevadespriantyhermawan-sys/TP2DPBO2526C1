<?php
// Mengimpor file kelas Dokter (Dokter.php) agar kelas DokterSpesialis dapat melakukan pewarisan (inheritance)
require_once 'Dokter.php';

/**
 * Kelas DokterSpesialis
 * Merupakan kelas turunan (child class) dari kelas Dokter (dan cucu dari kelas Orang).
 */
class DokterSpesialis extends Dokter {
    // Deklarasi atribut khusus DokterSpesialis dengan hak akses private
    private $subspesialisasi;
    private $biayaKonsultasi;
    private $rumahSakitUtama;
    private $foto; // Atribut khusus untuk menyimpan nama berkas gambar/foto dokter

    /**
     * Konstruktor Kelas DokterSpesialis
     * Memanggil konstruktor kelas induk (Dokter) dan menginisialisasi atribut spesifik dokter spesialis.
     * 
     * @param string $id              ID unik dokter
     * @param string $nama            Nama lengkap dokter
     * @param string $jenisKelamin    Jenis kelamin
     * @param string $spesialisasi    Bidang spesialisasi medis
     * @param string $noSTR           Nomor Surat Tanda Registrasi
     * @param int    $pengalamanTahun Lama pengalaman praktik (dalam tahun)
     * @param string $subspesialisasi Bidang subspesialisasi/fokus keahlian
     * @param float  $biayaKonsultasi Biaya tarif konsultasi dokter (dalam Rupiah)
     * @param string $rumahSakitUtama Nama rumah sakit tempat praktik utama
     * @param string $foto            Nama berkas foto dokter (default: "default.jpg")
     */
    public function __construct($id = "", $nama = "", $jenisKelamin = "", $spesialisasi = "", $noSTR = "", $pengalamanTahun = 0,
                                $subspesialisasi = "", $biayaKonsultasi = 0, $rumahSakitUtama = "", $foto = "default.jpg") {
        // Mengirimkan parameter umum ke konstruktor kelas induk (Dokter)
        parent::__construct($id, $nama, $jenisKelamin, $spesialisasi, $noSTR, $pengalamanTahun);
        
        // Mengisi atribut spesifik kelas DokterSpesialis
        $this->subspesialisasi = $subspesialisasi;
        $this->biayaKonsultasi = $biayaKonsultasi;
        $this->rumahSakitUtama = $rumahSakitUtama;
        $this->foto = $foto;
    }

    // --- Getter Methods (Fungsi untuk mengambil nilai atribut) ---

    // Mengambil bidang subspesialisasi
    public function getSubspesialisasi() { 
        return $this->subspesialisasi; 
    }

    // Mengambil nominal biaya konsultasi
    public function getBiayaKonsultasi() { 
        return $this->biayaKonsultasi; 
    }

    // Mengambil nama rumah sakit tempat praktik utama
    public function getRumahSakitUtama() { 
        return $this->rumahSakitUtama; 
    }

    // Mengambil nama berkas foto dokter
    public function getFoto() { 
        return $this->foto; 
    }
}
?>