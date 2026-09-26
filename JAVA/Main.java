import java.util.ArrayList;
import java.util.Scanner;

/**
 * @class Main
 * Kelas utama yang menjalankan program manajemen data Dokter Spesialis Rumah Sakit.
 * Program ini menangani inisialisasi data, penambahan data secara interaktif,
 * serta penampilannya dalam format tabel.
 */
public class Main {

    /**
     * Memformat dan mencetak daftar dokter spesialis ke layar konsol dalam bentuk tabel rapi.
     * 
     * @param daftarDokter ArrayList yang berisi objek-objek DokterSpesialis yang akan ditampilkan.
     */
    public static void cetakTabel(ArrayList<DokterSpesialis> daftarDokter) {
        // Pembatas horizontal garis tabel
        String garis = "+------+---------------------+---------------+---------------+---------------+------------+-----------------------+-----------------+-----------------------+";
        
        // --- Header Tabel ---
        System.out.println(garis);
        System.out.printf("| %-4s | %-19s | %-13s | %-13s | %-13s | %-10s | %-21s | %-15s | %-21s |\n",
                "ID", "Nama", "JK", "Spesialisasi", "No STR", "Pengalaman", "Subspesialisasi", "Biaya (Rp)", "Rumah Sakit");
        System.out.println(garis);

        // --- Isi Tabel (Iterasi seluruh data dokter) ---
        for (DokterSpesialis d : daftarDokter) {
            System.out.printf("| %-4s | %-19s | %-13s | %-13s | %-13s | %-7s thn | %-21s | %-15.0f | %-21s |\n",
                    d.getId(), d.getNama(), d.getJenisKelamin(), d.getSpesialisasi(), d.getNoSTR(),
                    d.getPengalamanTahun(), d.getSubspesialisasi(), d.getBiayaKonsultasi(), d.getRumahSakitUtama());
        }
        System.out.println(garis);
    }

    /**
     * Method utama (Main Entry Point) tempat alur eksekusi program dimulai.
     * 
     * @param args Argumen baris perintah (command line arguments)
     */
    public static void main(String[] args) {
        // Dynamic list untuk menyimpan kumpulan data dokter spesialis
        ArrayList<DokterSpesialis> daftarDokter = new ArrayList<>();

        // Inisialisasi data awal dokter spesialis
        daftarDokter.add(new DokterSpesialis("D001", "Dr. Gunil shin", "Laki-Laki", "Bedah", "STR-101", 10, "Onkologi", 500000, "RS Harapan Kita"));
        daftarDokter.add(new DokterSpesialis("D002", "Dr. Jungsu kim", "Laki-Laki", "Anak", "STR-102", 8, "Pediatri Sosial", 400000, "RS Cipto Mangunkusumo"));
        daftarDokter.add(new DokterSpesialis("D003", "Dr. Gaon kwak", "Laki-Laki", "Jantung", "STR-103", 12, "Kardiologi", 750000, "RS Harapan Jantung"));
        daftarDokter.add(new DokterSpesialis("D004", "Dr. O.de Oh", "Laki-Laki", "Mata", "STR-104", 6, "Vitreoretina", 450000, "RS Mata Cicendo"));
        daftarDokter.add(new DokterSpesialis("D005", "Dr. Jun han.", "Laki-Laki", "Saraf", "STR-105", 15, "Neurointervensi", 600000, "RS Hasan Sadikin"));
        daftarDokter.add(new DokterSpesialis("D006", "Dr. Jooyeon Lee", "Laki-Laki", "Radiologi", "STR-106", 5, "Neuroradiologi", 550000, "RS Flat 20"));

        // Menampilkan daftar dokter spesialis sebelum penambahan data
        System.out.println("=== DATA DOKTER SPESIALIS RUMAH SAKIT (AWAL) ===");
        cetakTabel(daftarDokter);

        // --- Fitur Penambahan Data Dokter Baru ---
        Scanner scanner = new Scanner(System.in);
        System.out.print("\nMasukkan jumlah data dokter baru yang ingin ditambahkan: ");
        
        // Validasi ketersediaan input angka
        if (scanner.hasNextInt()) {
            int n = scanner.nextInt();
            scanner.nextLine(); // Membersihkan buffer newline setelah membaca integer

            // Pengulangan sesuai jumlah data baru yang ingin dimasukkan
            for (int i = 0; i < n; i++) {
                System.out.println("\n--- Input Data Dokter Ke-" + (i + 1) + " ---");
                System.out.print("ID: "); String id = scanner.nextLine();
                System.out.print("Nama: "); String nama = scanner.nextLine();
                System.out.print("Jenis Kelamin: "); String jk = scanner.nextLine();
                System.out.print("Spesialisasi: "); String sp = scanner.nextLine();
                System.out.print("No STR: "); String str = scanner.nextLine();
                
                System.out.print("Pengalaman (Tahun): "); 
                int exp = scanner.nextInt(); 
                scanner.nextLine(); // Clear buffer setelah input integer
                
                System.out.print("Subspesialisasi: "); String sub = scanner.nextLine();
                
                System.out.print("Biaya Konsultasi: "); 
                double biaya = scanner.nextDouble(); 
                scanner.nextLine(); // Clear buffer setelah input double
                
                System.out.print("Rumah Sakit Utama: "); String rs = scanner.nextLine();

                // Memasukkan objek DokterSpesialis baru ke dalam daftar
                daftarDokter.add(new DokterSpesialis(id, nama, jk, sp, str, exp, sub, biaya, rs));
            }

            // Menampilkan daftar dokter setelah data berhasil ditambahkan
            System.out.println("\n=== DATA DOKTER SPESIALIS RUMAH SAKIT (SETELAH PENAMBAHAN) ===");
            cetakTabel(daftarDokter);
        }
        
        // Mempertahankan kebersihan memori dengan menutup Scanner
        scanner.close();
    }
}