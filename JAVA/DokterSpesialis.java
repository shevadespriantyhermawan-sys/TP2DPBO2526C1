/**
 * @class DokterSpesialis
 * Kelas DokterSpesialis merupakan turunan (derived class) dari kelas Dokter yang
 * merepresentasikan dokter spesialis dengan keahlian khusus yang lebih spesifik.
 * 
 * Memperluas kelas Dokter dengan menambahkan atribut khusus seperti subspesialisasi,
 * biaya konsultasi, dan lokasi rumah sakit utama tempat berpraktik.
 */
public class DokterSpesialis extends Dokter {
    // --- Atribut Spesifik Dokter Spesialis ---
    private String subspesialisasi;  // Bidang kekhususan/subspesialisasi (misal: "Kardiologi Intervensi")
    private double biayaKonsultasi;   // Tarif layanan konsultasi
    private String rumahSakitUtama;  // Nama rumah sakit/fasilitas kesehatan utama tempat praktik

    /**
     * Konstruktor berparameter untuk membuat dan menginisialisasi objek DokterSpesialis.
     * 
     * @param id Identitas unik dokter (diturunkan dari Orang)
     * @param nama Nama lengkap dokter (diturunkan dari Orang)
     * @param jenisKelamin Jenis kelamin dokter (diturunkan dari Orang)
     * @param spesialisasi Bidang spesialisasi medis (diturunkan dari Dokter)
     * @param noSTR Nomor Surat Tanda Registrasi (diturunkan dari Dokter)
     * @param pengalamanTahun Lama pengalaman kerja dalam tahun (diturunkan dari Dokter)
     * @param subspesialisasi Bidang kekhususan medis
     * @param biayaKonsultasi Biaya/tarif konsultasi
     * @param rumahSakitUtama Lokasi rumah sakit utama tempat berpraktik
     */
    public DokterSpesialis(String id, String nama, String jenisKelamin, String spesialisasi, String noSTR,
                           int pengalamanTahun, String subspesialisasi, double biayaKonsultasi, String rumahSakitUtama) {
        super(id, nama, jenisKelamin, spesialisasi, noSTR, pengalamanTahun); // Memanggil konstruktor dari kelas Dokter
        this.subspesialisasi = subspesialisasi;
        this.biayaKonsultasi = biayaKonsultasi;
        this.rumahSakitUtama = rumahSakitUtama;
    }

    // --- Getter (Method Akses Data) ---

    /**
     * Mengambil informasi subspesialisasi dokter.
     * @return String Nama subspesialisasi.
     */
    public String getSubspesialisasi() { return subspesialisasi; }

    /**
     * Mengambil informasi biaya konsultasi dokter.
     * @return double Biaya konsultasi.
     */
    public double getBiayaKonsultasi() { return biayaKonsultasi; }

    /**
     * Mengambil nama rumah sakit utama tempat dokter berpraktik.
     * @return String Nama rumah sakit utama.
     */
    public String getRumahSakitUtama() { return rumahSakitUtama; }
}