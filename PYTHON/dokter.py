from orang import Orang

class Dokter(Orang):
    """
    Kelas Dokter merupakan turunan (child class) dari kelas Orang yang 
    merepresentasikan entitas seorang dokter beserta data keprofesian dasarnya.
    """

    def __init__(self, id_orang="", nama="", jenis_kelamin="", spesialisasi="", no_str="", pengalaman_tahun=0):
        """
        Konstruktor berparameter dengan nilai default untuk menginisialisasi objek Dokter.

        :param id_orang: ID unik individu (diturunkan dari Orang)
        :param nama: Nama lengkap dokter (diturunkan dari Orang)
        :param jenis_kelamin: Jenis kelamin dokter (diturunkan dari Orang)
        :param spesialisasi: Bidang spesialisasi medis (misal: "Bedah", "Anak")
        :param no_str: Nomor Surat Tanda Registrasi (STR)
        :param pengalaman_tahun: Lama pengalaman kerja dokter dalam hitungan tahun
        """
        # Memanggil konstruktor dari kelas induk (Orang)
        super().__init__(id_orang, nama, jenis_kelamin)
        
        # --- Atribut Protected (Menggunakan konvensi _ awalan satu garis bawah) ---
        self._spesialisasi = spesialisasi
        self._no_str = no_str
        self._pengalaman_tahun = pengalaman_tahun

    # --- Getter (Method Akses Data) ---

    def get_spesialisasi(self):
        """Mengambil informasi spesialisasi medis dokter."""
        return self._spesialisasi

    def get_no_str(self):
        """Mengambil nomor Surat Tanda Registrasi (STR) dokter."""
        return self._no_str

    def get_pengalaman_tahun(self):
        """Mengambil total pengalaman kerja dokter dalam hitungan tahun."""
        return self._pengalaman_tahun