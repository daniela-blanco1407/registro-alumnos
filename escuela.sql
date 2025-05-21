CREATE DATABASE IF NOT EXISTS escuela;
USE escuela;

CREATE TABLE alumnos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  numero_control VARCHAR(20),
  carrera VARCHAR(100)
); 
