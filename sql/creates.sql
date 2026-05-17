CREATE TABLE veiculos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    modelo VARCHAR(100),
    cor VARCHAR(50),
    placa VARCHAR(10),
    ano INTEGER
);

CREATE TABLE clientes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(30)
);