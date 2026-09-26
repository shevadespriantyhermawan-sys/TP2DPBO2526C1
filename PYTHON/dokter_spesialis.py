from dokter import Dokter

class DokterSpesialis(Dokter):
    def __init__(self, id_orang="", nama="", jenis_kelamin="", spesialisasi="", no_str="", pengalaman_tahun=0,
                 subspesialisasi="", biaya_konsultasi=0.0, rumah_sakit_utama=""):
        super().__init__(id_orang, nama, jenis_kelamin, spesialisasi, no_str, pengalaman_tahun)
        self.__subspesialisasi = subspesialisasi
        self.__biaya_konsultasi = biaya_konsultasi
        self.__rumah_sakit_utama = rumah_sakit_utama

    def get_subspesialisasi(self):
        return self.__subspesialisasi

    def get_biaya_konsultasi(self):
        return self.__biaya_konsultasi

    def get_rumah_sakit_utama(self):
        return self.__rumah_sakit_utama