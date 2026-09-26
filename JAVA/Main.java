import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void cetakTabel(ArrayList<DokterSpesialis> daftarDokter) {
        String garis = "+------+---------------------+---------------+---------------+---------------+------------+-----------------------+-----------------+-----------------------+";
        System.out.println(garis);
        System.out.printf("| %-4s | %-19s | %-13s | %-13s | %-13s | %-10s | %-21s | %-15s | %-21s |\n",
                "ID", "Nama", "JK", "Spesialisasi", "No STR", "Pengalaman", "Subspesialisasi", "Biaya (Rp)", "Rumah Sakit");
        System.out.println(garis);

        for (DokterSpesialis d : daftarDokter) {
            System.out.printf("| %-4s | %-19s | %-13s | %-13s | %-13s | %-7s thn | %-21s | %-15.0f | %-21s |\n",
                    d.getId(), d.getNama(), d.getJenisKelamin(), d.getSpesialisasi(), d.getNoSTR(),
                    d.getPengalamanTahun(), d.getSubspesialisasi(), d.getBiayaKonsultasi(), d.getRumahSakitUtama());
        }
        System.out.println(garis);
    }

    public static void main(String[] args) {
        ArrayList<DokterSpesialis> daftarDokter = new ArrayList<>();

        daftarDokter.add(new DokterSpesialis("D001", "Dr. Gunil shin", "Laki-Laki", "Bedah", "STR-101", 10, "Onkologi", 500000, "RS Harapan Kita"));
        daftarDokter.add(new DokterSpesialis("D002", "Dr. Jungsu kim", "Laki-Laki", "Anak", "STR-102", 8, "Pediatri Sosial", 400000, "RS Cipto Mangunkusumo"));
        daftarDokter.add(new DokterSpesialis("D003", "Dr. Gaon kwak", "Laki-Laki", "Jantung", "STR-103", 12, "Kardiologi", 750000, "RS Harapan Jantung"));
        daftarDokter.add(new DokterSpesialis("D004", "Dr. O.de Oh", "Laki-Laki", "Mata", "STR-104", 6, "Vitreoretina", 450000, "RS Mata Cicendo"));
        daftarDokter.add(new DokterSpesialis("D005", "Dr. Jun han.", "Laki-Laki", "Saraf", "STR-105", 15, "Neurointervensi", 600000, "RS Hasan Sadikin"));
        daftarDokter.add(new DokterSpesialis("D006", "Dr. Jooyeon Lee", "Laki-Laki", "Radiologi", "STR-106", 5, "Neuroradiologi", 550000, "RS Flat 20"));

        System.out.println("=== DATA DOKTER SPESIALIS RUMAH SAKIT (AWAL) ===");
        cetakTabel(daftarDokter);

        Scanner scanner = new Scanner(System.in);
        System.out.print("\nMasukkan jumlah data dokter baru yang ingin ditambahkan: ");
        if (scanner.hasNextInt()) {
            int n = scanner.nextInt();
            scanner.nextLine();

            for (int i = 0; i < n; i++) {
                System.out.println("\n--- Input Data Dokter Ke-" + (i + 1) + " ---");
                System.out.print("ID: "); String id = scanner.nextLine();
                System.out.print("Nama: "); String nama = scanner.nextLine();
                System.out.print("Jenis Kelamin: "); String jk = scanner.nextLine();
                System.out.print("Spesialisasi: "); String sp = scanner.nextLine();
                System.out.print("No STR: "); String str = scanner.nextLine();
                System.out.print("Pengalaman (Tahun): "); int exp = scanner.nextInt(); scanner.nextLine();
                System.out.print("Subspesialisasi: "); String sub = scanner.nextLine();
                System.out.print("Biaya Konsultasi: "); double biaya = scanner.nextDouble(); scanner.nextLine();
                System.out.print("Rumah Sakit Utama: "); String rs = scanner.nextLine();

                daftarDokter.add(new DokterSpesialis(id, nama, jk, sp, str, exp, sub, biaya, rs));
            }

            System.out.println("\n=== DATA DOKTER SPESIALIS RUMAH SAKIT (SETELAH PENAMBAHAN) ===");
            cetakTabel(daftarDokter);
        }
        scanner.close();
    }
}