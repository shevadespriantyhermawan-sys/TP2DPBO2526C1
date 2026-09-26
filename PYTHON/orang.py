class Orang:
    """
    Kelas Orang merupakan kelas dasar (base class) yang merepresentasikan
    entitas manusia secara umum beserta atribut identitas dasarnya.
    """

    def __init__(self, id_orang="", nama="", jenis_kelamin=""):
        """
        Konstruktor berparameter dengan nilai default untuk menginisialisasi objek Orang.

        :param id_orang: ID unik individu
        :param nama: Nama lengkap individu
        :param jenis_kelamin: Jenis kelamin individu
        """
        # --- Atribut Protected (Menggunakan konvensi _ awalan satu garis bawah) ---
        self._id = id_orang
        self._nama = nama
        self._jenis_kelamin = jenis_kelamin

    # --- Getter (Method Akses Data) ---

    def get_id(self):
        """Mengambil informasi ID individu."""
        return self._id

    def get_nama(self):
        """Mengambil informasi nama lengkap individu."""
        return self._nama

    def get_jenis_kelamin(self):
        """Mengambil informasi jenis kelamin individu."""
        return self._jenis_kelamin