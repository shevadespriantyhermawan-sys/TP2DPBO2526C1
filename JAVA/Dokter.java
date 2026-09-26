/**
 * @class Dokter
 * Kelas Dokter merupakan turunan (derived class) dari kelas Orang yang 
 * merepresentasikan entitas seorang dokter beserta informasi keprofesiannya.
 */
public class Dokter extends Orang {
    // --- Atribut Spesifik Dokter ---
    protected String spesialisasi;    // Bidang spesialisasi medis (misal: "Bedah", "Anak")
    protected String noSTR;           // Nomor Surat Tanda Registrasi (STR)
    protected int pengalamanTahun;    // Lama pengalaman kerja dokter dalam hitungan tahun

    /**
     * Konstruktor berparameter untuk membuat dan menginisialisasi objek Dokter.
     * 
     * @param id Identitas unik dokter (diturunkan dari Orang)
     * @param nama Nama lengkap dokter (diturunkan dari Orang)
     * @param jenisKelamin Jenis kelamin dokter (diturunkan dari Orang)
     * @param spesialisasi Bidang spesialisasi medis
     * @param noSTR Nomor Surat Tanda Registrasi dokter
     * @param pengalamanTahun Lama pengalaman kerja (dalam tahun)
     */
    public Dokter(String id, String nama, String jenisKelamin, String spesialisasi, String noSTR, int pengalamanTahun) {
        super(id, nama, jenisKelamin); // Memanggil konstruktor dari kelas induk (Orang)
        this.spesialisasi = spesialisasi;
        this.noSTR = noSTR;
        this.pengalamanTahun = pengalamanTahun;
    }

    // --- Getter (Method Akses Data) ---

    /**
     * Mengambil informasi spesialisasi medis dokter.
     * @return String Bidang spesialisasi.
     */
    public String getSpesialisasi() { return spesialisasi; }

    /**
     * Mengambil nomor Surat Tanda Registrasi (STR) dokter.
     * @return String Nomor STR.
     */
    public String getNoSTR() { return noSTR; }

    /**
     * Mengambil total pengalaman kerja dokter dalam hitungan tahun.
     * @return int Jumlah tahun pengalaman kerja.
     */
    public int getPengalamanTahun() { return pengalamanTahun; }
}