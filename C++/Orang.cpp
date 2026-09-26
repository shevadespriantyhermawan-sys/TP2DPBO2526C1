#ifndef ORANG_HPP
#define ORANG_HPP

#include <string>

class Orang {
protected:
    std::string id;
    std::string nama;
    std::string jenisKelamin;

public:
    Orang(std::string id = "", std::string nama = "", std::string jenisKelamin = "")
        : id(id), nama(nama), jenisKelamin(jenisKelamin) {}

    std::string getId() const { return id; }
    std::string getNama() const { return nama; }
    std::string getJenisKelamin() const { return jenisKelamin; }
};

#endif