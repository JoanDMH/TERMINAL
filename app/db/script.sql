CREATE TABLE ciudades (
    id_ciud SERIAL PRIMARY KEY,
    nomb_ciud CHARACTER(50)
);

CREATE TABLE conductores (
    id_cond CHARACTER(15) PRIMARY KEY,
    nomb_cond CHARACTER(50),
    apel_cond CHARACTER(50),
    cel BIGINT NOT NULL,
    correo CHARACTER(50) NOT NULL
);

CREATE TABLE transportadora (
    id_tran BIGSERIAL PRIMARY KEY,
    nomb_tran CHARACTER(50),
    dire_tran CHARACTER(50),
    cel BIGINT NOT NULL,
    correo CHARACTER(50) NOT NULL
);

CREATE TABLE clientes (
    id_cli SERIAL PRIMARY KEY,
    nomb_cli CHARACTER(50) NOT NULL,
    ape_cli CHARACTER(50) NOT NULL,
    edad INTEGER NOT NULL
);

CREATE TABLE buses (
    id_bus CHARACTER(10) PRIMARY KEY,
    modelo CHARACTER(20),
    capacidad INTEGER,
    id_tran BIGSERIAL REFERENCES transportadora(id_tran) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE ruta (
    id_ruta SERIAL PRIMARY KEY,
    fecha DATE CHECK (fecha > CURRENT_DATE),
    hora_sal TIME,
    precio INTEGER,
    
    id_ciud_destino SERIAL REFERENCES ciudades(id_ciud) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE contrato (
    id_bus CHARACTER(10) REFERENCES buses(id_bus),
    id_cond CHARACTER(15) REFERENCES conductores(id_cond),
    fecha_ini DATE NOT NULL,
    fecha_fin DATE,
    PRIMARY KEY (id_bus, id_cond)
);

CREATE TABLE ticket (
    id_ticket SERIAL PRIMARY KEY,
    fecha DATE NOT NULL CHECK (fecha >= CURRENT_DATE),
    id_cli INTEGER REFERENCES clientes(id_cli) ON DELETE NO ACTION ON UPDATE NO ACTION,
    id_ruta SERIAL REFERENCES ruta(id_ruta) ON DELETE NO ACTION ON UPDATE NO ACTION,
    asiento CHARACTER(10) REFERENCES buses(id_bus) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE VIEW detalles_contratos AS
SELECT
    c.id_bus,
    c.id_cond,
    c.fecha_ini,
    c.fecha_fin,
    b.modelo AS modelo_bus,
    b.capacidad AS capacidad_bus,
    t.nomb_tran AS nombre_transportadora,
    co.nomb_cond || ' ' || co.apel_cond AS nombre_conductor
FROM contrato c
JOIN buses b ON c.id_bus = b.id_bus
JOIN conductores co ON c.id_cond = co.id_cond
JOIN transportadora t ON b.id_tran = t.id_tran;













