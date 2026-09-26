#include <iostream>
#include <vector>
#include <string>
#include <iomanip>
#include "DokterSpesialis.cpp" // Mengimpor implementasi/definisi DokterSpesialis

using namespace std;

/**
 * @brief Memformat dan mencetak daftar dokter spesialis dalam bentuk tabel ke layar console.
 * 
 * @param daftarDokter Vector konstan berisi objek-objek DokterSpesialis yang akan ditampilkan.
 */
void cetakTabel(const vector<DokterSpesialis>& daftarDokter) {
    // String pembatas horizontal untuk pembentuk baris tabel
    string garis = "+------+---------------------+---------------+---------------+---------------+------------+-----------------------+-----------------+-----------------------+";
    
    // --- Header Tabel ---
    cout << garis << endl;
    cout << "| " << left << setw(4)  << "ID"
         << " | " << setw(19) << "Nama"
         << " | " << setw(13) << "JK"
         << " | " << setw(13) << "Spesialisasi"
         << " | " << setw(13) << "No STR"
         << " | " << setw(10) << "Pengalaman"
         << " | " << setw(21) << "Subspesialisasi"
         << " | " << setw(15) << "Biaya (Rp)"
         << " | " << setw(21) << "Rumah Sakit" << " |" << endl;
    cout << garis << endl;

    // --- Isi Tabel (Iterasi daftar dokter) ---
    for (const auto& d : daftarDokter) {
        cout << "| " << left << setw(4)  << d.getId()
             << " | " << setw(19) << d.getNama()
             << " | " << setw(13) << d.getJenisKelamin()
             << " | " << setw(13) << d.getSpesialisasi()
             << " | " << setw(13) << d.getNoSTR()
             << " | " << setw(7)  << d.getPengalamanTahun() << " thn"
             << " | " << setw(21) << d.getSubspesialisasi()
             // Format biaya tanpa desimal (fixed & setprecision 0)
             << " | " << setw(15) << fixed << setprecision(0) << d.getBiayaKonsultasi()
             << " | " << setw(21) << d.getRumahSakitUtama() << " |" << endl;
    }
    cout << garis << endl;
}

/**
 * @brief Fungsi utama program (Main Entry Point).
 */
int main() {
    // Inisialisasi vector dengan data awal dokter spesialis
    vector<DokterSpesialis> daftarDokter = {
        DokterSpesialis("D001", "Dr. Gunil shin", "Laki-Laki", "Bedah", "STR-101", 10, "Onkologi", 500000, "RS Harapan Kita"),
        DokterSpesialis("D002", "Dr. Jungsu kim", "Laki-Laki", "Anak", "STR-102", 8, "Pediatri Sosial", 400000, "RS Cipto Mangunkusumo"),
        DokterSpesialis("D003", "Dr. Gaon kwak", "Laki-Laki", "Jantung", "STR-103", 12, "Kardiologi", 750000, "RS Harapan Jantung"),
        DokterSpesialis("D004", "Dr. O.de Oh", "Laki-Laki", "Mata", "STR-104", 6, "Vitreoretina", 450000, "RS Mata Cicendo"),
        DokterSpesialis("D005", "Dr. Jun han.", "Laki-Laki", "Saraf", "STR-105", 15, "Neurointervensi", 600000, "RS Hasan Sadikin"),
        DokterSpesialis("D006", "Dr. Jooyeon Lee", "Laki-Laki", "Radiologi", "STR-106", 5, "Neuroradiologi", 550000, "RS Flat 20")
    };

    // Cetak data dokter awal
    cout << "=== DATA DOKTER SPESIALIS RUMAH SAKIT (AWAL) ===" << endl;
    cetakTabel(daftarDokter);

    // --- Fitur Penambahan Data Dokter Baru ---
    int jumlahTambah;
    cout << "\nMasukkan jumlah data dokter baru yang ingin ditambahkan: ";
    
    // Validasi input angka jumlah data
    if (cin >> jumlahTambah && jumlahTambah > 0) {
        for (int i = 0; i < jumlahTambah; ++i) {
            string id, nama, jk, sp, str, sub, rs;
            int exp;
            double biaya;

            cout << "\n--- Input Data Dokter Ke-" << (i + 1) << " ---" << endl;
            
            // Input data dengan penanganan buffer (cin.ignore) untuk kombinasi cin >> dan getline
            cout << "ID: "; cin >> id; cin.ignore();
            cout << "Nama: "; getline(cin, nama);
            cout << "Jenis Kelamin: "; getline(cin, jk);
            cout << "Spesialisasi: "; getline(cin, sp);
            cout << "No STR: "; cin >> str;
            cout << "Pengalaman (Tahun): "; cin >> exp; cin.ignore();
            cout << "Subspesialisasi: "; getline(cin, sub);
            cout << "Biaya Konsultasi: "; cin >> biaya; cin.ignore();
            cout << "Rumah Sakit Utama: "; getline(cin, rs);

            // Membuat objek baru dan mengaturnya ke dalam vector
            daftarDokter.push_back(DokterSpesialis(id, nama, jk, sp, str, exp, sub, biaya, rs));
        }

        // Cetak data dokter setelah penambahan
        cout << "\n=== DATA DOKTER SPESIALIS RUMAH SAKIT (SETELAH PENAMBAHAN) ===" << endl;
        cetakTabel(daftarDokter);
    }

    return 0;
}