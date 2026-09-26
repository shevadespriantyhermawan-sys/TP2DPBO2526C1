from dokter import Dokter

class DokterSpesialis(Dokter):
    """
    Kelas DokterSpesialis merupakan turunan (child class) dari kelas Dokter yang 
    merepresentasikan dokter spesialis dengan keahlian khusus, tarif konsultasi, 
    dan fasilitas kesehatan utama tempat berpraktik.
    """

    def __init__(self, id_orang="", nama="", jenis_kelamin="", spesialisasi="", no_str="", pengalaman_tahun=0,
                 subspesialisasi="", biaya_konsultasi=0.0, rumah_sakit_utama=""):
        """
        Konstruktor berparameter dengan nilai default untuk menginisialisasi objek DokterSpesialis.

        :param id_orang: ID unik individu (diturunkan dari Orang)
        :param nama: Nama lengkap dokter (diturunkan dari Orang)
        :param jenis_kelamin: Jenis kelamin dokter (diturunkan dari Orang)
        :param spesialisasi: Bidang spesialisasi medis (diturunkan dari Dokter)
        :param no_str: Nomor Surat Tanda Registrasi (diturunkan dari Dokter)
        :param pengalaman_tahun: Lama pengalaman kerja dalam tahun (diturunkan dari Dokter)
        :param subspesialisasi: Bidang keahlian khusus/subspesialisasi
        :param biaya_konsultasi: Tarif/biaya layanan konsultasi
        :param rumah_sakit_utama: Nama rumah sakit utama tempat berpraktik
        """
        # Memanggil konstruktor dari kelas induk (Dokter)
        super().__init__(id_orang, nama, jenis_kelamin, spesialisasi, no_str, pengalaman_tahun)
        
        # --- Atribut Private (Encapsulation dengan Name Mangling) ---
        self.__subspesialisasi = subspesialisasi
        self.__biaya_konsultasi = biaya_konsultasi
        self.__rumah_sakit_utama = rumah_sakit_utama

    # --- Getter (Method Akses Data) ---

    def get_subspesialisasi(self):
        """Mengambil informasi subspesialisasi dokter."""
        return self.__subspesialisasi

    def get_biaya_konsultasi(self):
        """Mengambil informasi biaya konsultasi dokter."""
        return self.__biaya_konsultasi

    def get_rumah_sakit_utama(self):
        """Mengambil nama rumah sakit utama tempat dokter berpraktik."""
        return self.__rumah_sakit_utama