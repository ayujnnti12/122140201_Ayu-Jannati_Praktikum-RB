CREATE DATABASE IF NOT EXISTS data_posyandu;

USE data_posyandu;

CREATE TABLE IF NOT EXISTS posyandu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_balita VARCHAR(100) NOT NULL,
    nama_ibu VARCHAR(100) NOT NULL,
    usia_balita INT NOT NULL,
    berat_badan DECIMAL(5, 2) NOT NULL
);

INSERT INTO posyandu (nama_balita, nama_ibu, usia_balita, berat_badan) VALUES
('Ardi', 'Siti', 12, 9.5),
('Rani', 'Dewi', 24, 12.0),
('Budi', 'Ani', 36, 13.2),
('Putri', 'Wati', 18, 10.4),
('Agus', 'Tini', 6, 7.8),
('Nina', 'Lina', 30, 12.5),
('Didi', 'Fina', 15, 9.0),
('Wawan', 'Mila', 42, 14.0),
('Siska', 'Rina', 20, 10.8),
('Bagus', 'Sari', 10, 8.4),
('Zara', 'Ika', 22, 11.7);