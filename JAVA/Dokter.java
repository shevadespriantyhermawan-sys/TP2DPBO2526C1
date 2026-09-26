public class Dokter extends Orang {
    protected String spesialisasi;
    protected String noSTR;
    protected int pengalamanTahun;

    public Dokter(String id, String nama, String jenisKelamin, String spesialisasi, String noSTR, int pengalamanTahun) {
        super(id, nama, jenisKelamin);
        this.spesialisasi = spesialisasi;
        this.noSTR = noSTR;
        this.pengalamanTahun = pengalamanTahun;
    }

    public String getSpesialisasi() { return spesialisasi; }
    public String getNoSTR() { return noSTR; }
    public int getPengalamanTahun() { return pengalamanTahun; }
}