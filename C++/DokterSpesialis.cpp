#ifndef DOKTER_SPESIALIS_HPP
#define DOKTER_SPESIALIS_HPP

#include "Dokter.cpp" // <--- WAJIB ADA

class DokterSpesialis : public Dokter {
private:
    std::string subspesialisasi;
    double biayaKonsultasi;
    std::string rumahSakitUtama;

public:
    DokterSpesialis(std::string id = "", std::string nama = "", std::string jenisKelamin = "",
                    std::string spesialisasi = "", std::string noSTR = "", int pengalamanTahun = 0,
                    std::string subspesialisasi = "", double biayaKonsultasi = 0.0, std::string rumahSakitUtama = "")
        : Dokter(id, nama, jenisKelamin, spesialisasi, noSTR, pengalamanTahun),
          subspesialisasi(subspesialisasi), biayaKonsultasi(biayaKonsultasi), rumahSakitUtama(rumahSakitUtama) {}

    std::string getSubspesialisasi() const { return subspesialisasi; }
    double getBiayaKonsultasi() const { return biayaKonsultasi; }
    std::string getRumahSakitUtama() const { return rumahSakitUtama; }
};

#endif