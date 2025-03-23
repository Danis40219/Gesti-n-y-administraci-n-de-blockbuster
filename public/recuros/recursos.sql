CREATE DATABASE bdci4;

-- Crear el usuario y asignar permisos
CREATE USER 'userci'@'localhost' IDENTIFIED BY 'passwordci4';
GRANT ALL PRIVILEGES ON bdci4.* TO 'userci'@'localhost';
FLUSH PRIVILEGES;

-- Usar la base de datos creada
USE bdci4;

-- Crear la tabla 'roles'
CREATE TABLE roles (
    id_rol INT(3) NOT NULL,
    nombre_rol VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_rol)
);

-- Insertar los roles obligatorios
INSERT INTO roles (id_rol, nombre_rol) VALUES
(745, 'Administrador'),
(125, 'Operador');

-- Crear la tabla 'usuarios'
CREATE TABLE usuarios (
    id_usuario INT(3) AUTO_INCREMENT,
    estatus_usuario TINYINT(1) NOT NULL,
    nombre_usuario VARCHAR(30) NOT NULL,
    ap_usuario VARCHAR(30) NOT NULL,
    am_usuario VARCHAR(30) NOT NULL,
    sexo_usuario TINYINT(1) NOT NULL,
    email_usuario VARCHAR(50) NOT NULL,
    password_usuario VARCHAR(64) NOT NULL,
    imagen_usuario VARCHAR(100) DEFAULT NULL,
    id_rol INT(3),
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
);

-- Ejemplo de inserción de un usuario
INSERT INTO usuarios (estatus_usuario, nombre_usuario, ap_usuario, am_usuario, sexo_usuario, email_usuario, password_usuario, imagen_usuario, id_rol)
VALUES (1, 'Juan', 'Perez', 'Lopez', 1, 'juan.perez@example.com', SHA2('pass', 256), NULL, 745);