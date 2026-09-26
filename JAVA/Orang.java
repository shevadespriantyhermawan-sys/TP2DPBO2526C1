/**
 * @class Orang
 * Kelas Orang merupakan kelas dasar (base class) yang merepresentasikan
 * entitas manusia secara umum beserta atribut identitas dasarnya.
 */
public class Orang {
    // --- Atribut Dasar (Dapat diakses oleh kelas turunan) ---
    protected String id;            // Identitas unik individu
    protected String nama;          // Nama lengkap individu
    protected String jenisKelamin;   // Jenis kelamin individu

    /**
     * Konstruktor berparameter untuk membuat dan menginisialisasi objek Orang.
     * 
     * @param id Identitas unik individu
     * @param nama Nama lengkap individu
     * @param jenisKelamin Jenis kelamin individu
     */
    public Orang(String id, String nama, String jenisKelamin) {
        this.id = id;
        this.nama = nama;
        this.jenisKelamin = jenisKelamin;
    }

    // --- Getter (Method Akses Data) ---

    /**
     * Mengambil informasi ID individu.
     * @return String ID unik.
     */
    public String getId() { return id; }

    /**
     * Mengambil informasi nama lengkap individu.
     * @return String Nama lengkap.
     */
    public String getNama() { return nama; }

    /**
     * Mengambil informasi jenis kelamin individu.
     * @return String Jenis kelamin.
     */
    public String getJenisKelamin() { return jenisKelamin; }
}