from dokter_spesialis import DokterSpesialis

def cetak_tabel(daftar_dokter):
    """
    Memformat dan mencetak daftar dokter spesialis ke layar konsol dalam bentuk tabel rapi.

    :param daftar_dokter: List yang berisi objek-objek DokterSpesialis yang akan ditampilkan.
    """
    # Menentukan format teks header tabel dengan lebar kolom yang telah disesuaikan
    header = f"| {'ID':<5} | {'Nama':<20} | {'JK':<10} | {'Spesialisasi':<14} | {'No STR':<10} | {'Pengalaman':<10} | {'Subspesialisasi':<20} | {'Biaya (Rp)':<12} | {'Rumah Sakit':<22} |"
    
    # Membuat garis pembatas horizontal secara dinamis berdasarkan panjang header
    garis = "+" + "-" * (len(header) - 2) + "+"
    
    # --- Cetak Header Tabel ---
    print(garis)
    print(header)
    print(garis)
    
    # --- Cetak Isi Tabel (Iterasi seluruh data dokter) ---
    for d in daftar_dokter:
        exp_str = f"{d.get_pengalaman_tahun()} thn"
        biaya_str = f"{d.get_biaya_konsultasi():,.0f}"  # Format biaya dengan pemisah ribuan
        
        print(f"| {d.get_id():<5} | {d.get_nama():<20} | {d.get_jenis_kelamin():<10} | {d.get_spesialisasi():<14} | {d.get_no_str():<10} | {exp_str:<10} | {d.get_subspesialisasi():<20} | {biaya_str:<12} | {d.get_rumah_sakit_utama():<22} |")
    
    print(garis)

def main():
    """
    Fungsi utama yang mengelola alur jalannya program, meliputi inisialisasi data,
    penampilan tabel, dan penambahan data dokter baru dari input pengguna.
    """
    # Inisialisasi list data awal dokter spesialis
    daftar_dokter = [
        DokterSpesialis("D001", "Dr. Gunil Shin", "Laki-Laki", "Bedah", "STR-101", 10, "Onkologi", 500000, "RS Harapan Kita"),
        DokterSpesialis("D002", "Dr. Jungsu kim", "Perempuan", "Anak", "STR-102", 8, "Pediatri Sosial", 400000, "RS Cipto Mangunkusumo"),
        DokterSpesialis("D003", "Dr. Gaon kwak", "Laki-Laki", "Jantung", "STR-103", 12, "Kardiologi", 750000, "RS Harapan Jantung"),
        DokterSpesialis("D004", "Dr. O.de oh ", "Perempuan", "Mata", "STR-104", 6, "Vitreoretina", 450000, "RS Mata Cicendo"),
        DokterSpesialis("D005", "Dr. Jun han", "Laki-Laki", "Saraf", "STR-105", 15, "Neurointervensi", 600000, "RS Hasan Sadikin"),
        DokterSpesialis("D006", "Dr. Jooyeon Lee", "Laki-Laki", "Radiologi", "STR-106", 5, "Neuroradiologi", 550000, "RS Flat 20"),
    ]

    # Menampilkan data dokter awal
    print("=== DATA DOKTER SPESIALIS RUMAH SAKIT (AWAL) ===")
    cetak_tabel(daftar_dokter)

    # --- Fitur Penambahan Data Dokter Baru ---
    try:
        n = int(input("\nMasukkan jumlah data dokter baru yang ingin ditambahkan: "))
        
        for i in range(n):
            print(f"\n--- Input Data Dokter Ke-{i+1} ---")
            d_id = input("ID: ")
            nama = input("Nama: ")
            jk = input("Jenis Kelamin: ")
            sp = input("Spesialisasi: ")
            str_num = input("No STR: ")
            exp = int(input("Pengalaman (Tahun): "))
            sub = input("Subspesialisasi: ")
            biaya = float(input("Biaya Konsultasi: "))
            rs = input("Rumah Sakit Utama: ")

            # Menambahkan objek DokterSpesialis baru ke dalam list
            daftar_dokter.append(DokterSpesialis(d_id, nama, jk, sp, str_num, exp, sub, biaya, rs))

        # Menampilkan data dokter setelah dilakukan penambahan
        print("\n=== DATA DOKTER SPESIALIS RUMAH SAKIT (SETELAH PENAMBAHAN) ===")
        cetak_tabel(daftar_dokter)
        
    except ValueError:
        # Menangani kesalahan tipe data saat input angka (pengalaman/biaya/jumlah)
        print("Input tidak valid! Pastikan Anda memasukkan angka untuk jumlah, pengalaman, dan biaya.")

# Memastikan fungsi main() hanya dijalankan saat berkas ini dieksekusi secara langsung
if __name__ == "__main__":
    main()