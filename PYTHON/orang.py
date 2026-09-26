class Orang:
    def __init__(self, id_orang="", nama="", jenis_kelamin=""):
        self._id = id_orang
        self._nama = nama
        self._jenis_kelamin = jenis_kelamin

    def get_id(self):
        return self._id

    def get_nama(self):
        return self._nama

    def get_jenis_kelamin(self):
        return self._jenis_kelamin