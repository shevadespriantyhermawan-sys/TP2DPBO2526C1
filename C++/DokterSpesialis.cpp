#ifndef DOKTER_SPESIALIS_HPP
#define DOKTER_SPESIALIS_HPP

// Mengimpor kelas induk (Dokter) untuk menerapkan konsep inheritance (pewarisan)
#include "Dokter.cpp" // <--- WAJIB ADA

/**
 * @class DokterSpesialis
 * @brief Kelas turunan (derived class) dari Dokter yang merepresentasikan dokter spesialis.
 * 
 * Memperluas kelas Dokter dengan menambahkan atribut khusus seperti subspesialisasi,
 * biaya konsultasi, dan lokasi rumah sakit utama tempat berpraktik.
 */
class DokterSpesialis : public Dokter {
private:
    // --- Atribut Spesifik Dokter Spesialis ---
    std::string subspesialisasi;  // Bidang kekhususan/subspesialisasi (misal: "Kardiologi Intervensi")
    double biayaKonsultasi;       // Tarif layanan konsultasi dalam satuan mata uang
    std::string rumahSakitUtama;  // Nama rumah sakit/fasilitas kesehatan utama tempat praktik

public:
    /**
     * @brief Konstruktor berparameter dengan nilai default (Default/Parameterized Constructor).
     * 
     * Menginisialisasi atribut kelas induk (Dokter) melalui member initializer list,
     * sekaligus menginisialisasi atribut spesifik milik DokterSpesialis.
     * 
     * @param id ID unik dokter
     * @param nama Nama lengkap dokter
     * @param jenisKelamin Jenis kelamin dokter
     * @param spesialisasi Bidang spesialisasi utama
     * @param noSTR Nomor Surat Tanda Registrasi
     * @param pengalamanTahun Lama pengalaman kerja (dalam tahun)
     * @param subspesialisasi Bidang keahlian khusus
     * @param biayaKonsultasi Biaya satu kali konsultasi
     * @param rumahSakitUtama Lokasi rumah sakit utama
     */
    DokterSpesialis(std::string id = "", std::string nama = "", std::string jenisKelamin = "",
                    std::string spesialisasi = "", std::string noSTR = "", int pengalamanTahun = 0,
                    std::string subspesialisasi = "", double biayaKonsultasi = 0.0, std::string rumahSakitUtama = "")
        : Dokter(id, nama, jenisKelamin, spesialisasi, noSTR, pengalamanTahun),
          subspesialisasi(subspesialisasi), biayaKonsultasi(biayaKonsultasi), rumahSakitUtama(rumahSakitUtama) {}

    // --- Getter (Method Akses Data) ---

    /**
     * @brief Mengambil informasi subspesialisasi dokter.
     * @return std::string Nama subspesialisasi.
     */
    std::string getSubspesialisasi() const { return subspesialisasi; }

    /**
     * @brief Mengambil informasi biaya konsultasi dokter.
     * @return double Biaya konsultasi.
     */
    double getBiayaKonsultasi() const { return biayaKonsultasi; }

    /**
     * @brief Mengambil nama rumah sakit utama tempat dokter berpraktik.
     * @return std::string Nama rumah sakit utama.
     */
    std::string getRumahSakitUtama() const { return rumahSakitUtama; }
};

#endif // DOKTER_SPESIALIS_HPP