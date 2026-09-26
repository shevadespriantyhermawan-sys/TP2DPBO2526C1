<?php
class Orang {
    protected $id;
    protected $nama;
    protected $jenisKelamin;

    public function __construct($id = "", $nama = "", $jenisKelamin = "") {
        $this->id = $id;
        $this->nama = $nama;
        $this->jenisKelamin = $jenisKelamin;
    }

    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getJenisKelamin() { return $this->jenisKelamin; }
}
?>