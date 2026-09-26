public class DokterSpesialis extends Dokter {
    private String subspesialisasi;
    private double biayaKonsultasi;
    private String rumahSakitUtama;

    public DokterSpesialis(String id, String nama, String jenisKelamin, String spesialisasi, String noSTR,
                           int pengalamanTahun, String subspesialisasi, double biayaKonsultasi, String rumahSakitUtama) {
        super(id, nama, jenisKelamin, spesialisasi, noSTR, pengalamanTahun);
        this.subspesialisasi = subspesialisasi;
        this.biayaKonsultasi = biayaKonsultasi;
        this.rumahSakitUtama = rumahSakitUtama;
    }

    public String getSubspesialisasi() { return subspesialisasi; }
    public double getBiayaKonsultasi() { return biayaKonsultasi; }
    public String getRumahSakitUtama() { return rumahSakitUtama; }
}