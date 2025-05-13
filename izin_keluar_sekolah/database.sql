
CREATE DATABASE izin_sekolah;
USE izin_sekolah;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role ENUM('siswa', 'guru') DEFAULT 'siswa'
);

CREATE TABLE izin_keluar (
    id_izin INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    nama VARCHAR(100),
    kelas VARCHAR(20),
    tanggal DATE,
    jam TIME,
    alasan TEXT,
    foto VARCHAR(255),
    status ENUM('menunggu','disetujui','ditolak') DEFAULT 'menunggu',
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

INSERT INTO users (username, password, role) VALUES
('siswa1', 'siswa123', 'siswa'),
('guru1', 'guru123', 'guru');
