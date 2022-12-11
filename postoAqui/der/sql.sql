CREATE DATABASE postos;
USE postos;



CREATE TABLE IF NOT EXISTS cidade (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(75) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS usuario (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  cidade INT NOT NULL,
  cep VARCHAR(45) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  senha VARCHAR(245) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_usuario_cidade1_idx (cidade ASC),
  CONSTRAINT fk_usuario_cidade1
    FOREIGN KEY (cidade)
    REFERENCES cidade (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- Inserts de cidade iniciais

INSERT INTO cidade (id, nome) VALUES ('1', 'Ceres');



-- Insert de usuário para testes

INSERT INTO usuario VALUES (NULL, 'nome', '1', '76300000', '298938383', 'usuario@email.email', md5('senha'));

CREATE TABLE IF NOT EXISTS admin (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  PRIMARY KEY (id));

INSERT INTO admin VALUES (NULL, 'Teste', 'admin@email.email', md5('senha'));

CREATE TABLE IF NOT EXISTS bandeira (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  PRIMARY KEY (id));
  
CREATE TABLE IF NOT EXISTS posto (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  cidade INT NOT NULL,
  cep VARCHAR(45) NOT NULL,
  endereco VARCHAR(45) NOT NULL,
  bandeira INT NOT NULL,
  etanol DECIMAL(8,2) NOT NULL,
  diesels500 DECIMAL(8,2) NOT NULL,
  diesels10 DECIMAL(8,2) NOT NULL,
  gasolina DECIMAL(8,2) NOT NULL,
  admin INT NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_posto_cidade1_idx (cidade ASC),
  INDEX fk_posto_bandeira1_idx (bandeira ASC),
  INDEX fk_posto_admin1_idx (admin ASC),
  CONSTRAINT fk_posto_cidade1 FOREIGN KEY (cidade) REFERENCES cidade (id) ON DELETE NO ACTION ON UPDATE NO ACTION, 
  CONSTRAINT fk_posto_bandeira1 FOREIGN KEY (bandeira) REFERENCES bandeira (id) ON DELETE NO ACTION ON UPDATE NO ACTION, 
  CONSTRAINT fk_posto_admin1 FOREIGN KEY (admin) REFERENCES admin (id) ON DELETE NO ACTION ON UPDATE NO ACTION);
    
    
CREATE TABLE IF NOT EXISTS pedido (
  id INT NOT NULL AUTO_INCREMENT,
  etanol DECIMAL(8,2) NOT NULL DEFAULT 0.0,
  gasolina DECIMAL(8,2) NOT NULL DEFAULT 0.0,
  diesels500 DECIMAL(8,2) NOT NULL DEFAULT 0.0,
  diesels10 DECIMAL(8,2) NOT NULL DEFAULT 0.0,
  posto INT NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_pedido_posto1_idx (posto ASC),
  CONSTRAINT fk_pedido_posto1 FOREIGN KEY (posto) REFERENCES posto (id) 
  ON DELETE NO ACTION ON UPDATE NO ACTION);
  
INSERT INTO `postos`.`bandeira` (`id`, `nome`) VALUES ('1', 'Petrobrás');
INSERT INTO `postos`.`bandeira` (`id`, `nome`) VALUES ('2', 'Shell');
INSERT INTO `postos`.`bandeira` (`id`, `nome`) VALUES ('3', 'Ipiranga');
INSERT INTO `postos`.`bandeira` (`id`, `nome`) VALUES ('4', 'Outros');

INSERT INTO posto VALUES ('1', 'Posto Beira rio', '1', '75404292', 'Av. Bernado Sayão', '1', '2.90', '2.90', '2.90', '5.40', '1');
INSERT INTO posto VALUES ('2', 'Posto Cadeirão', '1', '75404292', 'Av. Brasil, 1606', '2', '2.99', '3.60', '5.90', '5.40', '1');
INSERT INTO posto VALUES ('3', 'Posto WK', '1', '75404292', 'Av. Euclides Babugem, 606', '2', '3.99', '4.60', '5.85', '6.80', '1');
INSERT INTO posto VALUES ('4', 'Posto Brasil', '1', '75404292', 'Av. Brasil, 675', '4', '2.50', '3.10', '5.95', '6.30', '1');
INSERT INTO posto VALUES ('5', 'Posto Cruzeiro', '1', '75404292', 'Rua 24, 34', '3', '3.50', '4.10', '6.95', '6.38', '1');
INSERT INTO posto VALUES ('6', 'Posto Zema', '1', '75404292', 'Rua Jão R. da Silva', '1', '2.50', '3.39', '5.35', '5.38', '1');






