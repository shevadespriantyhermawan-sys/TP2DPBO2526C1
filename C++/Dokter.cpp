#ifndef DOKTER_HPP
#define DOKTER_HPP

// Mengimpor file definisi kelas induk (Orang) agar kelas Dokter dapat melakukan pewarisan (inheritance)
#include "Orang.cpp" // <--- WAJIB ADA

/**
 * Kelas Dokter
 * Merupakan kelas turunan (child class) yang mewarisi sifat dari kelas Orang secara publik.
 */
class Dokter : public Orang {
protected:
    // Deklarasi atribut khusus Dokter dengan hak akses protected agar dapat diakses oleh kelas turunan selanjutnya
    std::string spesialisasi;
    std::string noSTR;
    int pengalamanTahun;

public:
    /**
     * Konstruktor Kelas Dokter
     * Memanggil konstruktor kelas induk (Orang) dan menginisialisasi atribut khusus Dokter
     * menggunakan Member Initializer List.
     * 
     * @param id              ID unik dokter
     * @param nama            Nama lengkap dokter
     * @param jenisKelamin    Jenis kelamin
     * @param spesialisasi    Bidang spesialisasi medis
     * @param noSTR           Nomor Surat Tanda Registrasi
     * @param pengalamanTahun Lama pengalaman praktik (dalam tahun)
     */
    Dokter(std::string id = "", std::string nama = "", std::string jenisKelamin = "",
           std::string spesialisasi = "", std::string noSTR = "", int pengalamanTahun = 0)
        : Orang(id, nama, jenisKelamin), spesialisasi(spesialisasi), noSTR(noSTR), pengalamanTahun(pengalamanTahun) {}

    // --- Getter Methods (Fungsi konstan untuk mengambil nilai atribut) ---

    // Mengambil bidang spesialisasi
    std::string getSpesialisasi() const { return spesialisasi; }

    // Mengambil nomor STR
    std::string getNoSTR() const { return noSTR; }

    // Mengambil lama pengalaman praktik dalam tahun
    int getPengalamanTahun() const { return pengalamanTahun; }
};

#endif // DOKTER_HPP