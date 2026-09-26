# TP2DPBO2526C1

Janji 

Saya Sheva Desprianty Hermawan dengan NIM 2511645 mengerjakan kuis 1 dalam mata kuliah desain pemrograman berorientasi objek untuk keberkahannya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Amin 

## Penjelasan Atribut dan Method
Rancangan kelas menerapkan konsep **Multilevel Inheritance 3 Tingkat**:

1. **Class `Orang` (Parent)**
   - **Atribut:**
     - `id`: Identitas unik objek.
     - `nama`: Nama lengkap.
     - `jenisKelamin`: Jenis kelamin.
   - **Method:** Getter untuk seluruh atribut.

2. **Class `Dokter` (Child - Inherits `Orang`)**
   - **Atribut Tambahan:**
     - `spesialisasi`: Bidang spesialisasi medis.
     - `noSTR`: Surat Tanda Registrasi dokter.
     - `pengalamanTahun`: Lama pengalaman praktik (tahun).
   - **Method:** Getter untuk atribut `Dokter`.

3. **Class `DokterSpesialis` (Grandchild - Inherits `Dokter`)**
   - **Atribut Tambahan:**
     - `subspesialisasi`: Keahlian bidang spesifik.
     - `biayaKonsultasi`: Tarif biaya konsultasi medis.
     - `rumahSakitUtama`: Lokasi rumah sakit tempat praktik utama.
     - `foto`: *(Khusus PHP)* Nama berkas foto profil dokter.
   - **Method:** Getter untuk seluruh atribut `DokterSpesialis`.

## Diagram Relasi Kelas
```mermaid
classDiagram
    Orang <|-- Dokter : Inherits
    Dokter <|-- DokterSpesialis : Inherits