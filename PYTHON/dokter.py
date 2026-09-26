from orang import Orang

class Dokter(Orang):
    def __init__(self, id_orang="", nama="", jenis_kelamin="", spesialisasi="", no_str="", pengalaman_tahun=0):
        super().__init__(id_orang, nama, jenis_kelamin)
        self._spesialisasi = spesialisasi
        self._no_str = no_str
        self._pengalaman_tahun = pengalaman_tahun

    def get_spesialisasi(self):
        return self._spesialisasi

    def get_no_str(self):
        return self._no_str

    def get_pengalaman_tahun(self):
        return self._pengalaman_tahun