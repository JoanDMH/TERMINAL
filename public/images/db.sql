CREATE TABLE transportadora (
    id_tran BIGSERIAL PRIMARY KEY,
    nomb_tran CHARACTER(50),
    dire_tran CHARACTER(50),
    cel BIGINT NOT NULL,
    correo CHARACTER(50) NOT NULL
);

CREATE TABLE conductores (
    id_cond CHARACTER(15) PRIMARY KEY,
    nomb_cond CHARACTER(50),
    apel_cond CHARACTER(50),
    cel BIGINT NOT NULL,
    correo CHARACTER(50) NOT NULL
);

CREATE TABLE clientes (
    id_cli SERIAL PRIMARY KEY,
    nomb_cli CHARACTER(50) NOT NULL,
    ape_cli CHARACTER(50) NOT NULL,
    edad INTEGER NOT NULL
);

CREATE TABLE ciudades (
    id_ciud SERIAL PRIMARY KEY,
    nomb_ciud CHARACTER(50)
);

CREATE TABLE buses (
    id_bus CHARACTER(10) PRIMARY KEY,
    modelo CHARACTER(20),
    capacidad INTEGER,
    id_tran BIGSERIAL REFERENCES transportadora(id_tran) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE asiento (
    asiento CHARACTER(10) PRIMARY KEY,
    id_bus CHARACTER(10),
    UNIQUE (asiento),
    FOREIGN KEY (id_bus) REFERENCES buses(id_bus) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE ruta (
    id_ruta SERIAL PRIMARY KEY,
    fecha DATE CHECK (fecha > CURRENT_DATE),
    hora_sal TIME,
    precio INTEGER,
    id_ciud_origen SERIAL REFERENCES ciudades(id_ciud) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
    id_tick CHARACTER(50) PRIMARY KEY,
    fecha DATE NOT NULL CHECK (fecha >= CURRENT_DATE),
    id_cli INTEGER REFERENCES clientes(id_cli) ON DELETE NO ACTION ON UPDATE NO ACTION,
    id_ruta SERIAL REFERENCES ruta(id_ruta) ON DELETE NO ACTION ON UPDATE NO ACTION,
    id_asiento CHARACTER(10) REFERENCES asiento(asiento) ON DELETE NO ACTION ON UPDATE NO ACTION
);
