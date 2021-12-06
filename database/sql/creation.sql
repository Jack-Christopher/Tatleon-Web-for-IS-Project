CREATE DATABASE Tatleon;
USE Tatleon;

CREATE TABLE IF NOT EXISTS Escuelas (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT nombre_unique UNIQUE (nombre)
);


CREATE TABLE IF NOT EXISTS temp_Usuarios (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    -- escuela_id INTEGER NOT NULL,
    codigo_verificacion VARCHAR(6) NOT NULL,
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username)
);

CREATE TABLE IF NOT EXISTS Usuarios (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    -- escuela_id INTEGER NOT NULL,
    permisos INTEGER NOT NULL, -- 0: usuario, 1: admin escuela, 2: admin global
    es_docente BOOLEAN NOT NULL,
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username)
);

CREATE TABLE IF NOT EXISTS Usuario_Escuela (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario_id INTEGER NOT NULL,
    escuela_id INTEGER NOT NULL,
    CONSTRAINT usuario_escuela_unique UNIQUE (usuario_id, escuela_id)
);

CREATE TABLE IF NOT EXISTS Enlaces (
    id INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(250) NOT NULL,
    descripcion VARCHAR(1500) NOT NULL,
    URL VARCHAR(1500) NOT NULL,
    escuela_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Comentarios (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comentario VARCHAR(1000) NOT NULL,
    docente_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Cursos (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL
);

CREATE TABLE IF NOT EXISTS  Curso_Escuela (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    curso_id INTEGER NOT NULL,
    escuela_id INTEGER NOT NULL,
    CONSTRAINT curso_escuela_unique UNIQUE (curso_id, escuela_id)
);

CREATE TABLE IF NOT EXISTS Recursos (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(1500) NOT NULL,
    URL VARCHAR(1500) NOT NULL,
    curso_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS  Auditorias (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario_id INTEGER NOT NULL,
    tabla VARCHAR(30) NOT NULL,
    item_id INTEGER NOT NULL,
    fecha_hora DATETIME NOT NULL
);
