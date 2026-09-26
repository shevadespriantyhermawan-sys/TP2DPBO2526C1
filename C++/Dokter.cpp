#ifndef DOKTER_HPP
#define DOKTER_HPP

#include "Orang.cpp" // <--- WAJIB ADA

class Dokter : public Orang {
protected:
    std::string spesialisasi;
    std::string noSTR;
    int pengalamanTahun;

public:
    Dokter(std::string id = "", std::string nama = "", std::string jenisKelamin = "",
           std::string spesialisasi = "", std::string noSTR = "", int pengalamanTahun = 0)
        : Orang(id, nama, jenisKelamin), spesialisasi(spesialisasi), noSTR(noSTR), pengalamanTahun(pengalamanTahun) {}

    std::string getSpesialisasi() const { return spesialisasi; }
    std::string getNoSTR() const { return noSTR; }
    int getPengalamanTahun() const { return pengalamanTahun; }
};

#endif