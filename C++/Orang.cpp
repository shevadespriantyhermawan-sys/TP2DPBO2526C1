#ifndef ORANG_HPP
#define ORANG_HPP

#include <string>

/**
 * @class Orang
 * @brief Kelas dasar (base class) yang merepresentasikan data entitas manusia secara umum.
 * 
 * Kelas ini menyimpan atribut-atribut identitas dasar dan berfungsi sebagai induk 
 * (super class) untuk diturunkan ke kelas yang lebih spesifik seperti Dokter.
 */
class Orang {
protected:
    // --- Atribut Dasar (Dapat diakses oleh kelas turunan) ---
    std::string id;            // Identitas unik individu
    std::string nama;          // Nama lengkap individu
    std::string jenisKelamin;   // Jenis kelamin individu

public:
    /**
     * @brief Konstruktor berparameter dengan nilai default (Default/Parameterized Constructor).
     * 
     * Menginisialisasi atribut dasar individu dengan nilai parameter yang diberikan 
     * atau menggunakan string kosong sebagai nilai default.
     * 
     * @param id ID unik individu
     * @param nama Nama lengkap
     * @param jenisKelamin Jenis kelamin
     */
    Orang(std::string id = "", std::string nama = "", std::string jenisKelamin = "")
        : id(id), nama(nama), jenisKelamin(jenisKelamin) {}

    // --- Getter (Method Akses Data) ---

    /**
     * @brief Mengambil informasi ID individu.
     * @return std::string ID unik.
     */
    std::string getId() const { return id; }

    /**
     * @brief Mengambil informasi nama lengkap individu.
     * @return std::string Nama lengkap.
     */
    std::string getNama() const { return nama; }

    /**
     * @brief Mengambil informasi jenis kelamin individu.
     * @return std::string Jenis kelamin.
     */
    std::string getJenisKelamin() const { return jenisKelamin; }
};

#endif // ORANG_HPP