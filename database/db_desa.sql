CREATE TABLE wilayah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_wilayah VARCHAR(255) NOT NULL,
    jumlah_penduduk INT NOT NULL
);

CREATE TABLE kependudukan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NIK VARCHAR(16) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    tanggal_lahir DATE NOT NULL,
    umur INT NOT NULL,
    wilayah_id INT,
    agama ENUM('Islam', 'Kristen') NOT NULL,
    status_pendidikan ENUM('SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor') NOT NULL,
    status_ekonomi ENUM('Miskin', 'Rentan', 'Menengah Bawah', 'Menengah', 'Atas') NOT NULL,
    pekerjaan VARCHAR(100) NOT NULL,
    FOREIGN KEY (wilayah_id) REFERENCES wilayah(id)
);

CREATE TABLE pengguna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100),
    NIK VARCHAR(16) UNIQUE NULL,
    role ENUM('user', 'admin', 'super_admin') NOT NULL,
    status VARCHAR(50) DEFAULT 'aktif',
    FOREIGN KEY (NIK) REFERENCES kependudukan(NIK)
);

CREATE TABLE surat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_surat ENUM(
        'Surat Keterangan Domisili', 
        'Surat Keterangan Kelahiran', 
        'Surat Keterangan Tidak Mampu', 
        'Surat Keterangan Usaha', 
        'Surat Keterangan Kematian', 
        'Surat Keterangan Jual Beli Tanah', 
        'Surat Keterangan Jalan', 
        'Surat Keterangan Cerai Hidup/Cerai Mati', 
        'Surat Keterangan WNI', 
        'Surat Keterangan Disabilitas', 
        'Surat Keterangan Ahli Waris'
    ) NOT NULL,
    tanggal_masuk DATE NOT NULL,
    keterangan TEXT
);

CREATE TABLE keuangan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tahun YEAR NOT NULL,
    anggaran_desa DECIMAL(15, 2) NOT NULL,
    anggaran_terpakai DECIMAL(15, 2) NOT NULL,
    sisa_anggaran DECIMAL(15, 2) NOT NULL,
    persentase_pemanfaatan DECIMAL(5, 2) GENERATED ALWAYS AS (anggaran_terpakai / anggaran_desa * 100) STORED
);

CREATE TABLE proyek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_proyek VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    status ENUM('Dalam Proses', 'Selesai', 'Tertunda') NOT NULL,
    persentase_penyelesaian DECIMAL(5, 2) NOT NULL,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE
);

CREATE TABLE kesehatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_penyakit VARCHAR(255) NOT NULL,
    jumlah_kasus INT NOT NULL
);

CREATE TABLE komentar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    komentar TEXT NOT NULL,
    tanggal_post DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES pengguna(id)
);
