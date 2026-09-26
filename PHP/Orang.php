<?php
/**
 * Kelas Orang
 * Merupakan kelas dasar (base class / parent class) yang menyimpan informasi identitas dasar.
 */
class Orang {
    // Deklarasi atribut dasar dengan hak akses protected agar dapat diakses oleh kelas turunan
    protected $id;
    protected $nama;
    protected $jenisKelamin;

    /**
     * Konstruktor Kelas Orang
     * Menginisialisasi identitas dasar individu.
     * 
     * @param string $id           ID unik individu
     * @param string $nama         Nama lengkap
     * @param string $jenisKelamin Jenis kelamin (contoh: "Laki-Laki" / "Perempuan")
     */
    public function __construct($id = "", $nama = "", $jenisKelamin = "") {
        // Mengisi atribut kelas Orang
        $this->id = $id;
        $this->nama = $nama;
        $this->jenisKelamin = $jenisKelamin;
    }

    // --- Getter Methods (Fungsi untuk mengambil nilai atribut) ---

    // Mengambil ID unik
    public function getId() { 
        return $this->id; 
    }

    // Mengambil nama lengkap
    public function getNama() { 
        return $this->nama; 
    }

    // Mengambil jenis kelamin
    public function getJenisKelamin() { 
        return $this->jenisKelamin; 
    }
}
?>