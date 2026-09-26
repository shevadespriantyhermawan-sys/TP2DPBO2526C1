public class Orang {
    protected String id;
    protected String nama;
    protected String jenisKelamin;

    public Orang(String id, String nama, String jenisKelamin) {
        this.id = id;
        this.nama = nama;
        this.jenisKelamin = jenisKelamin;
    }

    public String getId() { return id; }
    public String getNama() { return nama; }
    public String getJenisKelamin() { return jenisKelamin; }
}