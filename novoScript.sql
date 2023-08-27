DROP DATABASE IF EXISTS PIZZA;

CREATE DATABASE IF NOT EXISTS PIZZA;

use pizza;

-- Tabela: empresa
CREATE TABLE IF NOT EXISTS Empresa (
        Id_Empresa        INTEGER           PRIMARY KEY AUTO_INCREMENT, 
        Nome_Empresa      VARCHAR(60),
        Fantasia          VARCHAR(20),
        Cnpj              VARCHAR(14),
        Ie                VARCHAR(14),
        Cep               VARCHAR(08),
        Endereco          VARCHAR(50),
        Numero            VARCHAR(10),
        Bairro            VARCHAR(40),
        Cidade            VARCHAR(40),
        Uf                VARCHAR(02),
        Telefone          VARCHAR(11),
        Site              VARCHAR(50),
        Data              date,
        Logo              VARCHAR(30)
);

-- Tabela: Configuração
CREATE TABLE IF NOT EXISTS Configuracao(
       Id_Config           INTEGER          PRIMARY KEY AUTO_INCREMENT,
       Data                Date,
       Abre                TIME,
       Fecha               TIME,
       NrPedido            INTEGER,
       Mensagem            VARCHAR(250)
);

-- Tabela: Cargo
CREATE TABLE IF NOT EXISTS Cargo(
       Id_Cargo            INTEGER          PRIMARY KEY AUTO_INCREMENT,
       Nome_Cargo          VARCHAR(20)      UNIQUE
);

-- Tabela: Categoria
CREATE TABLE IF NOT EXISTS Categoria(
        Id_Categoria       INTEGER          PRIMARY KEY AUTO_INCREMENT, 
        Nome_Categoria     VARCHAR(020),
        Comentario         VARCHAR(100),
        Imagem             VARCHAR(050)
);

-- Tabela: Cep
CREATE TABLE IF NOT EXISTS Cep(
        Id_Cep             INTEGER          PRIMARY KEY AUTO_INCREMENT,
       	Cep                VARCHAR(09),
        Cidade             VARCHAR(30),
        Logradouro         VARCHAR(30),
        Bairro             VARCHAR(30),
        Tipo               VARCHAR(30)
);

-- Tabela: Pagamento
CREATE TABLE IF NOT EXISTS Pagamento(
        Id_Pagamento       INTEGER               PRIMARY KEY AUTO_INCREMENT, 
        Nome_Pagamento     VARCHAR(20),
        Troco              BOOLEAN,
        Foto               VARCHAR(30)

);

-- Tabela: Perfil
CREATE TABLE IF NOT EXISTS Perfil(
        Id_Perfil          INTEGER          PRIMARY KEY AUTO_INCREMENT,
        Acessa_Cliente     BOOLEAN,
        Acessa_Funcionario BOOLEAN,
        Acessa_Produto     BOOLEAN,
        Acessa_Entregador  BOOLEAN,
        Acessa_Status      BOOLEAN,
        Acessa_Venda       BOOLEAN,
        Acessa_Carrinho    BOOLEAN
);

-- Tabela: Status
CREATE TABLE IF NOT EXISTS Status(
        Id_Status          INTEGER          PRIMARY KEY AUTO_INCREMENT, 
        Nome_Status        VARCHAR(30) 
);

-- Tabela: Produto
CREATE TABLE IF NOT EXISTS Produto(
        Id_Produto         INTEGER          PRIMARY KEY AUTO_INCREMENT,
        Cod_Produto        VARCHAR(13)      UNIQUE, 
        Nome_Produto       VARCHAR(20), 
        Desc_Produto       VARCHAR(80), 
        Estoque            INTEGER,
        Estoque_Min        INTEGER,
        Estoque_Max        INTEGER,
        Valor              FLOAT,
        Status_Produto     VARCHAR(01),
        Imagem             VARCHAR(50),
        Categoria          INTEGER,
        FOREIGN KEY (Categoria)             REFERENCES Categoria (Id_Categoria)
);

-- Tabela: Usuario
CREATE TABLE IF NOT EXISTS Usuario (
        Id_Usuario         INTEGER          Primary Key AUTO_INCREMENT,
        Nome_Usuario       VARCHAR(45)      UNIQUE,
        Senha              VARCHAR(100),
        Sexo               VARCHAR(01),
        Cep                INTEGER,
        Numero             VARCHAR(10),
        Complemento        VARCHAR(45),
        Telefone           VARCHAR(11),
        Email              VARCHAR(60),
        Nascimento         DATE,
        Foto               VARCHAR(30),
        FOREIGN KEY (Cep)                    REFERENCES Cep (Id_Cep) 	   
 );

 -- Tabela: Cliente
CREATE TABLE IF NOT EXISTS Cliente(
        Id_Cliente         INTEGER          PRIMARY KEY AUTO_INCREMENT,
        Referencia         VARCHAR(40),
        Usuario            INTEGER,
        FOREIGN KEY (Usuario)                REFERENCES Usuario (Id_Usuario)
);

-- Tabela: Funcionario
CREATE TABLE IF NOT EXISTS Funcionario(
        Id_Funcionario     INTEGER          PRIMARY KEY AUTO_INCREMENT,
        Cargo              INTEGER,
        Perfil             INTEGER,
        Usuario            INTEGER,
        Salario            FLOAT,
        FOREIGN KEY (Cargo)                 REFERENCES Cargo (Id_Cargo),
        FOREIGN KEY (Perfil)                REFERENCES Perfil (Id_Perfil),
        FOREIGN KEY (Usuario)               REFERENCES Usuario (Id_Usuario)
);

-- Tabela: Entregador - Vi que o Felipe removeu essa tabela
CREATE TABLE IF NOT EXISTS Entregador(
        Id_Entregador      INTEGER          PRIMARY KEY AUTO_INCREMENT,
        Veiculo            VARCHAR(10),
        Identificacao      VARCHAR(45),
        Usuario            INTEGER,
        foreign KEY(Id_Entregador)          references Usuario(Id_Usuario)
);

-- Tabela: Venda
CREATE TABLE IF NOT EXISTS Venda(
        Id_Venda           INTEGER          PRIMARY KEY AUTO_INCREMENT, 
        Nro_Venda          INTEGER,
        Cliente            INTEGER,
        Data_Venda         DATE,
        Entregador         INTEGER,
        Status             INTEGER,
        Valor_Venda        FLOAT,
        Desconto_Venda     FLOAT,
        Adicional_Venda    FLOAT,
        Pagamento          INTEGER,
        FOREIGN KEY (Cliente)               REFERENCES Cliente (Id_Cliente),
        FOREIGN KEY (Entregador)            REFERENCES Entregador (Id_Entregador),
        FOREIGN KEY (Pagamento)             REFERENCES Pagamento (Id_Pagamento)
);

-- Tabela: Detalhe_Venda
CREATE TABLE IF NOT EXISTS Detalhe_Venda(
        Id_Venda           INTEGER,
        Nro_Venda          INTEGER,
        Cod_Produto        INTEGER,
        Quantidade         INTEGER,
        Val_Unitario       FLOAT,
        Val_Total          FLOAT,
        FOREIGN KEY (Id_Venda)              REFERENCES Venda(Id_Venda)
);

-- Tabela: Carrinho
CREATE TABLE IF NOT EXISTS Carrinho(
        Id_Carrinho        INTEGER          PRIMARY KEY AUTO_INCREMENT, 
        Cliente            INTEGER,
        Cod_Produto        INTEGER,
        Quantidade         INTEGER,
        Valor_Unitario     FLOAT,
        SubTotal           FLOAT,
        Total              FLOAT,
        Desconto           FLOAT, 
        Adicional          FLOAT,
        Pagamento          INTEGER,
        FOREIGN KEY (Cliente)               REFERENCES Cliente (Id_Cliente),
        FOREIGN KEY (Pagamento)             REFERENCES Pagamento (Id_Pagamento),
        FOREIGN KEY (Cod_Produto)           REFERENCES Produto (Id_Produto)
);


-- ****************************************************************
-- Aqui comeca a popularizacao das tabela
--
-- ****************************************************************
--
--
-- Insere dados na tabela de empresa
INSERT INTO empresa (Id_Empresa, Nome_Empresa, Fantasia, cnpj, ie, cep, endereco, numero, bairro, cidade, uf, telefone, site, data, logo) VALUES (null, 'Nome da Empresa', 'Pizzaria', '12345678000199', '1234567890', '08250001', 'Rua Virginia Ferni', '555', 'José Bonifacio', 'São Paulo', 'SP', '11987654321', 'seusite.com.br', now(), 'logo.jpeg');
-- Insere dados na tabela de Configuracao
INSERT INTO Configuracao VALUES (Null, now(), '18:00', '24:00', 1, 'Trabalhamos com produtos de primeira qualidade');

-- Insere dados na tabela de cargo
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Gerente');
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Caixa');
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Balconista');
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Pizzaiolo');
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Ajudante Geral');
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Garçom');
INSERT INTO Cargo (Id_Cargo, Nome_Cargo) VALUES (Null, 'Preguiçoso');

-- Insere dados na tabela de categoria
INSERT INTO Categoria (Id_Categoria, Nome_Categoria, Comentario, Imagem) VALUES (Null, 'Pizza       ', 'Nossa finalidade e levar para nossos cliente uma boa experiência com nossas pizzas', 'pizza.jpg       ' );
INSERT INTO Categoria (Id_Categoria, Nome_Categoria, Comentario, Imagem) VALUES (Null, 'Pizza Doce  ', 'O fim de semana não é o mesmo sem saborear um dos nossos Lanches                  ', 'pizza.jpg       ' );
INSERT INTO Categoria (Id_Categoria, Nome_Categoria, Comentario, Imagem) VALUES (Null, 'Esfiha      ', 'Temos uma variedade de refrigerantes                                              ', 'Esfiha.jpg      ' );
INSERT INTO Categoria (Id_Categoria, Nome_Categoria, Comentario, Imagem) VALUES (Null, 'Esfiha Doce ', 'A primeira mordida no lanche é sempre a mais gostosa. Aprecie-a!                  ', 'Esfiha.jpg      ' );
INSERT INTO Categoria (Id_Categoria, Nome_Categoria, Comentario, Imagem) VALUES (Null, 'Bebidas     ', 'Nada mais que refrescante que um refrigerante bem gelado                          ', 'Refrigerante.jpg' );

-- Insere dados na tabela de cep
INSERT INTO Cep (Id_Cep, Cep, Cidade, Logradouro, Bairro, Tipo) VALUES (Null, '08250-001', 'São Paulo', 'Virginia Ferni', 'José Bonifacio', 'Rua');

-- Insere dados na tabela de forma de pagamento
INSERT INTO Pagamento (Id_Pagamento, Nome_Pagamento, Troco, Foto) VALUES (Null, 'Sem pagamento',  '0', 'bandeira.jpg' );
INSERT INTO Pagamento (Id_Pagamento, Nome_Pagamento, Troco, Foto) VALUES (Null, 'Dinheiro',       '1', 'bandeira.jpg' );
INSERT INTO Pagamento (Id_Pagamento, Nome_Pagamento, Troco, Foto) VALUES (Null, 'Cartão Debito',  '0', 'bandeira.jpg' );
INSERT INTO Pagamento (Id_Pagamento, Nome_Pagamento, Troco, Foto) VALUES (Null, 'Cartão Credido', '0', 'bandeira.jpg' );
INSERT INTO Pagamento (Id_Pagamento, Nome_Pagamento, Troco, Foto) VALUES (Null, 'Pix Celular',    '0', 'bandeira.jpg' );
INSERT INTO Pagamento (Id_Pagamento, Nome_Pagamento, Troco, Foto) VALUES (Null, 'Pix QRCode',     '0', 'bandeira.jpg' );

-- Insere dados na tabela de perfil
INSERT INTO Perfil (Id_Perfil, Acessa_Cliente, Acessa_Funcionario, Acessa_Produto, Acessa_Entregador, Acessa_Status, Acessa_Venda, Acessa_Carrinho) VALUES (Null, '1', '1', '1', '1', '1', '1', '1');
INSERT INTO Perfil (Id_Perfil, Acessa_Cliente, Acessa_Funcionario, Acessa_Produto, Acessa_Entregador, Acessa_Status, Acessa_Venda, Acessa_Carrinho) VALUES (Null, '0', '0', '1', '1', '1', '1', '1');
INSERT INTO Perfil (Id_Perfil, Acessa_Cliente, Acessa_Funcionario, Acessa_Produto, Acessa_Entregador, Acessa_Status, Acessa_Venda, Acessa_Carrinho) VALUES (Null, '0', '0', '0', '1', '1', '1', '1');
INSERT INTO Perfil (Id_Perfil, Acessa_Cliente, Acessa_Funcionario, Acessa_Produto, Acessa_Entregador, Acessa_Status, Acessa_Venda, Acessa_Carrinho) VALUES (Null, '0', '0', '0', '0', '1', '1', '1');
INSERT INTO Perfil (Id_Perfil, Acessa_Cliente, Acessa_Funcionario, Acessa_Produto, Acessa_Entregador, Acessa_Status, Acessa_Venda, Acessa_Carrinho) VALUES (Null, '0', '0', '0', '0', '0', '0', '1');

-- Insere dados na tabela de Status
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Aceito');
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Sendo Produzido');
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Produzido');
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Sendo Entregue');
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Entregue');
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Cancelado Pelo Cliente');
INSERT INTO Status (Id_Status, Nome_Status) VALUES (Null, 'Pedido Cancelado - Sem igred.');

-- Insere dados na tabela de Produto
INSERT INTO Produto ( Id_Produto, Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES (NULL, '1001', 'Pizza Alho                    ', 'Alho, Molho de tomate e mussarela                                   ', 0, 0, 0, 50.99, '1', 'pizzaAtum.jpg                ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1002', 'Pizza Atum                    ', 'Atum e cebola                                                       ', 0, 0, 0, 31.99, '1', 'pizzaAtum.jpg                ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1003', 'Pizza Bacon                   ', 'Bacon e mussarela                                                   ', 0, 0, 0, 39.99, '1', 'pizzaBacon.jpg               ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1004', 'Pizza Baiana                  ', 'Calabresa moída, ovo, cebola e pimenta                              ', 0, 0, 0, 31.99, '1', 'pizzaBaiana.jpg              ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1005', 'Pizza Bauru                   ', 'Presunto, mussarela e rodelas de tomate                             ', 0, 0, 0, 29.99, '1', 'pizzaBauru.png               ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1006', 'Pizza Brasileira              ', 'Atum, ovo, palmito, mussarela, bacon e camarão                      ', 0, 0, 0, 41.00, '1', 'pizzaBrasileira.png          ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1007', 'Pizza Brócolis                ', 'Brócolis, ovo, cebola, bacon e mussarela                            ', 0, 0, 0, 41.99, '1', 'pizzaBrocolis.jpeg           ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1008', 'Pizza Caipira                 ', 'Frango desfiado,milho verde com cobertura de catupiry               ', 0, 0, 0, 39.99, '1', 'pizzaCaipira.png             ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1009', 'Pizza Calabacon               ', 'Calabresa fatiada, catupiry e bacon                                 ', 0, 0, 0, 39.99, '1', 'pizzaCalabacon.jpg           ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1010', 'Pizza Calabresa               ', 'Calabresa e cebola                                                  ', 0, 0, 0, 29.99, '1', 'pizzaCalabresa.png           ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1011', 'Pizza Calamussa               ', 'Calabresa e mussarela                                               ', 0, 0, 0, 41.99, '1', 'pizzaCalabresaMussarela.png  ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1012', 'Pizza Camarão                 ', 'Camarão temperado, com mussarela ou catupiry                        ', 0, 0, 0, 64.99, '1', 'pizzaCamarao.png             ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1013', 'Pizza Carne Seca              ', 'Carne seca,catupiry e mussarela                                     ', 0, 0, 0, 57.99, '1', 'pizzaCarneSeca.png           ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1014', 'Pizza Champignom              ', 'Champignom coberto com mussarela                                    ', 0, 0, 0, 39.99, '1', 'pizzaChampignon.png          ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1015', 'Pizza Dois Queijos            ', 'Mussarela e catupiry                                                ', 0, 0, 0, 37.99, '1', 'pizzaDoisQueijos.jpg         ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1016', 'Pizza Escarola                ', 'Escarola, mussarela e bacon                                         ', 0, 0, 0, 29.99, '1', 'pizzaEscarola.png            ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1017', 'Pizza Frango                  ', 'Frango desfiado temperado e cheddar                                 ', 0, 0, 0, 35.00, '1', 'pizzaFrango.png              ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1018', 'Pizza Frango com Catupiry     ', 'Frango desfiado temperado com catupiry                              ', 0, 0, 0, 41.99, '1', 'pizzaFrangoCatupiry.png      ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1019', 'Pizza Italiana                ', 'Calabresa, Salame, Pimentão Verde e Azeitonas Pretas Fatiadas       ', 0, 0, 0, 35.99, '1', 'pizzaItaliana.png            ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1020', 'Pizza Lombo                   ', 'Lombo fatiado, mussarela e bacon                                    ', 0, 0, 0, 41.99, '1', 'pizzaLombo.png               ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1021', 'Pizza Marguerita              ', 'Mussarela, parmesão e manjericão                                    ', 0, 0, 0, 41.99, '1', 'pizzaMarguerita.png          ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1022', 'Pizza Mexicana                ', 'Milho verde, bacon e azeitona                                       ', 0, 0, 0, 36.99, '1', 'pizzaMexicana.png            ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1023', 'Pizza Milho                   ', 'Milho verde e catupiry                                              ', 0, 0, 0, 29.99, '1', 'pizzaMilho.png               ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1024', 'Pizza Modinha                 ', 'Presunto, mussarela e ovo                                           ', 0, 0, 0, 41.99, '1', 'pizzaModinha.png             ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1025', 'Pizza Mussarela               ', 'Mussarela e azeitonas                                               ', 0, 0, 0, 34.99, '1', 'pizzaMussarela.jpg           ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1026', 'Pizza Napolitana              ', 'Mussarela, rodelas de tomate e parmesão ralada                      ', 0, 0, 0, 31.99, '1', 'pizzaNapolitana.png          ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1027', 'Pizza Pepperone               ', 'Queijo Pepperone                                                    ', 0, 0, 0, 41.99, '1', 'pizzaPeperrone.png           ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1028', 'Pizza Portuguesa              ', 'Mussarela, presunto, ovo cozido e cebola                            ', 0, 0, 0, 39.99, '1', 'pizzaPortuguesa.png          ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1029', 'Pizza Toscana                 ', 'Calabresa moída e mussarela                                         ', 0, 0, 0, 29.99, '1', 'pizzaToscana.jpeg            ', 1);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1030', 'Pizza Vegetariana             ', 'Mussarela, tomates, champignon, pimentão, cebola e azeitonas verdes ', 0, 0, 0, 54.99, '1', 'pizzaVegetariana.jpg         ', 1);
-- PIZZAS DOCES
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1031', 'Pizza Banana                  ', 'Banana, leite condesado e canela em pó                              ', 0, 0, 0, 42.99, '1', 'pizzaBanana.png              ', 2);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1032', 'Pizza Brigadeiro              ', 'Chocolate ao leite e chocolate granulado                            ', 0, 0, 0, 44.99, '1', 'pizzaBrigadeiro.png          ', 2);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1033', 'Pizza Romeu e Julieta         ', 'Goiabada e mussarela                                                ', 0, 0, 0, 44.99, '1', 'pizzaRomeuJulieta.png        ', 2);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1034', 'Pizza Sensação                ', 'Morango, chocolate e leite condesado                                ', 0, 0, 0, 35.00, '1', 'pizzaSensacao.png            ', 2);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1035', 'Pizza Prestígio               ', 'Chocolate, coco ralado e leite condesado                            ', 0, 0, 0, 35.00, '1', 'pizzaPrestigio.png           ', 2);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1036', 'Pizza BIS                     ', 'Chocolate e Bis                                                     ', 0, 0, 0, 35.00, '1', 'pizzaBIS.jpg                 ', 2);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1037', 'Pizza M&M´s                   ', 'Chocolate M&M´s                                                     ', 0, 0, 0, 35.00, '1', 'pizzaMM.png                  ', 2);
-- ESPIHA SALGADA
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1038', 'Esfiha Atum                   ', 'Atum                                                                ', 0, 0, 0,  4.00, '1', 'esfihaAtum.png               ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1039', 'Esfiha Atum com Queijo        ', 'Atum com queijo                                                     ', 0, 0, 0,  4.00, '1', 'esfihaAtumQueijo.png         ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1040', 'Esfih Calabresa com Catupiry  ', 'Calabresa moída e catupity                                          ', 0, 0, 0,  4.00, '1', 'espihaCalabresaCatupiry.png  ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1041', 'Esfiha Calabresa com Queijo   ', 'Calabresa moída e queijo                                            ', 0, 0, 0,  4.00, '1', 'espihaCalabresaQueijo.png    ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1042', 'Esfiha Carne                  ', 'Carne moída                                                         ', 0, 0, 0,  4.00, '1', 'espihaCarne.jpg              ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1043', 'Esfiha Escarola e Queijo      ', 'Escarola e queijo mussarela                                         ', 0, 0, 0,  4.00, '1', 'espihaEscarolaQueijo.png     ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1044', 'Esfiha Frango                 ', 'Frango desfiado                                                     ', 0, 0, 0,  4.00, '1', 'esfihaFrango.png             ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1045', 'Esfiha Frango  com Catupiry   ', 'Frango desfiado e catupiry                                          ', 0, 0, 0,  4.00, '1', 'espihaFrangoCatupiry.png     ', 3);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ( '1046', 'Esfiha Queijo                 ', 'Queijo mussarela                                                    ', 0, 0, 0,  4.00, '1', 'espihaQueijo.jpg             ', 3);
-- ESPIHA DOCE
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1047', 'Esfiha Banana                 ', 'Banana, leite condesado e canela em pó                              ', 0, 0, 0,  5.00, '1', 'espihaBanana.png             ', 4);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1048', 'Esfiha Brigadeiro             ', 'Chocolate e granulado                                               ', 0, 0, 0,  5.00, '1', 'espihaBrigadeiro.jpg         ', 4);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1049', 'Esfiha Chocolate com M&M´s    ', 'Chocolate e m&m´s                                                   ', 0, 0, 0,  5.00, '1', 'espihaMM.png                 ', 4);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1050', 'Esfiha Prestígio              ', 'Calabresa moída e queijo                                            ', 0, 0, 0,  5.00, '1', 'espihaCalabresaQueijo.png    ', 4);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1051', 'Esfiha Carne                  ', 'Chocolate, coco ralado e leite condesado                            ', 0, 0, 0,  5.00, '1', 'espihaPrestigio.png          ', 4);
INSERT INTO Produto (Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1052', 'Esfiha Romeu e Julieta        ', 'Goiabada e mussarela                                                ', 0, 0, 0,  5.00, '1', 'espihaRomeuJulieta.jpg       ', 4);
-- Bebidas
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1053', 'Coca-Cola 350ml               ', 'Coca-Cola 350ml                                                     ', 0, 0, 0,  9.00, '1', 'Coca350ml.jpg                ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1054', 'Coca-Cola 2 litros            ', 'Coca-Cola 2 litros                                                  ', 0, 0, 0, 15.00, '1', 'Coca2litros.png              ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1055', 'Coca-Cola Zero 350ml          ', 'Coca-Cola Zero 350ml                                                ', 0, 0, 0,  9.00, '1', 'Cocazero350ml.png            ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1056', 'Coca-Cola  Zero 2 Litros      ', 'Coca-Cola  Zero 2 Litros                                            ', 0, 0, 0, 15.00, '1', 'Cocazero2litros.png          ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1057', 'Fanta Laranja 350 ml          ', 'Fanta Laranja 350 ml                                                ', 0, 0, 0,  9.00, '1', 'Fantalaranja350ml.jpg        ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1058', 'Fanta Laranja 2 litros        ', 'Fanta Laranja 2 litros                                              ', 0, 0, 0, 15.00, '1', 'Fanta2litros.png             ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1059', 'Fanta Uva 350ml               ', 'Fanta Uva 350 ml                                                    ', 0, 0, 0,  9.00, '1', 'FantaUva350ml.png            ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1060', 'Fanta Uva 2 litros            ', 'Fanta Uva 2 litros                                                  ', 0, 0, 0, 15.00, '1', 'FantaUva2litros.png          ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1061', 'Guaraná Antartica 350ml       ', 'Guaraná Antartica 350ml                                             ', 0, 0, 0,  9.00, '1', 'Guarana350ml.jpg             ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1062', 'Guaraná Antartica 2 litros    ', 'Guaraná Antartica 2 litros                                          ', 0, 0, 0, 15.00, '1', 'Guarana2litros.jpg           ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1063', 'Sprite 350ml                  ', 'Sprite 350ml                                                        ', 0, 0, 0,  9.00, '1', 'Sprite350ml.png              ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1064', 'Sprite 2 litros               ', 'Sprite 2 litros                                                     ', 0, 0, 0, 15.00, '1', 'sprite2litros.png            ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1065', 'Pepsi 350ml                   ', 'Pepsi 350ml                                                         ', 0, 0, 0,  9.00, '1', 'pepsi350ml.jpeg              ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1066', 'Pepsi 2 litros                ', 'Pepsi 2 litros                                                      ', 0, 0, 0, 15.00, '1', 'Pepsi2litros.jpg             ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1067', 'Pepsi Zero 350ml              ', 'Pepsi Zero 350ml                                                    ', 0, 0, 0,  9.00, '1', 'PepsiZero.png                ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1068', 'Água Mineral 350ml            ', 'Água Mineral 350ml                                                  ', 0, 0, 0,  5.00, '1', 'aguaMineral.jpg              ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1069', 'Água com Gás 350ml            ', 'Água com Gás 350ml                                                  ', 0, 0, 0,  6.00, '1', 'AguacomGas.png               ', 5);
INSERT INTO Produto ( Cod_Produto, Nome_Produto, Desc_Produto, Estoque, Estoque_Min, Estoque_Max, Valor, Status_Produto, Imagem, Categoria) VALUES ('1070', 'Água Tônica Schweppes 350ml   ', 'Água Tônica Schweppes 350ml                                         ', 0, 0, 0,  7.00, '1', 'AguaTonica.jpg               ', 5);

-- Insere dados na tabela de Usuario
INSERT INTO Usuario (Id_Usuario, Nome_Usuario, Senha, Sexo, Cep, Numero, Complemento, telefone, Email, Nascimento, Foto) VALUES (Null, 'admin'  , 'admin'  , 'M', 1, '111', 'Ap 12   ', '11-9876-4321', 'abcd@abcd.com.br', '2000-01-01', 'foto.jpg');
INSERT INTO Usuario (Id_Usuario, Nome_Usuario, Senha, Sexo, Cep, Numero, Complemento, telefone, Email, Nascimento, Foto) VALUES (Null, 'gerente', 'gerente', 'M', 1, '333', 'Ap 333  ', '11-9999-9999', 'abcd@abcd.com.br', '2000-01-01', 'foto.jpg');
INSERT INTO Usuario (Id_Usuario, Nome_Usuario, Senha, Sexo, Cep, Numero, Complemento, telefone, Email, Nascimento, Foto) VALUES (Null, 'caixa'  , 'caixa'  , 'F', 1, '444', 'Ap 321  ', '11-9999-9999', 'abcd@abcd.com.br', '2000-01-01', 'foto.jpg');

-- Insere dados na tabela de funcionario
INSERT INTO Funcionario (Id_Funcionario, Usuario, Cargo, Perfil, Salario) VALUES (Null, 1, 1, 1, 1000);




-- Insere dados na taabela de cliente
INSERT INTO Usuario VALUES (Null, 'Joaquin               ', 'senha          ', 'M', 1, '1234 ', 'Apto 123 ', '11-9123-4567', 'joaquin@gmailo.com      ', now(), 'joaquin.jpg    ');
--SELECT LAST_INSERT_ROWID();
SELECT LAST_INSERT_ID();
INSERT INTO Cliente VALUES (last_insert_rowid(), 'Proximo a escola Joaquin   ', last_insert_rowid());




START TRANSACTION;
-- Insere dados na taabela de cliente
INSERT INTO Usuario VALUES (Null, 'Joaquin               ', 'senha          ', 'M', 1, '1234 ', 'Apto 123 ', '11-9123-4567', 'joaquin@gmailo.com      ', SYSDATETIME, 'joaquin.jpg    ');
SELECT LAST_INSERT_ID();
INSERT INTO Cliente VALUES (last_insert_rowid(), 'Proximo a escola Joaquin   ', last_insert_rowid());
COMMIT; # confirma a transação

INSERT INTO Usuario VALUES (Null, 'Manoel da Silva       ', '1234           ', 'M', 1, '333  ', '12A     ' , '11-976543210', 'manoeldasilva@gmail.com ', NOW(), 'namoel.jpg     ');
SELECT LAST_INSERT_ID();
INSERT INTO Cliente VALUES (last_insert_rowid(), 'Proximo a Igreja           ', last_insert_rowid());

INSERT INTO Usuario VALUES (Null, 'Maria da Silva        ', 'abcd           ', 'F', 1, '12   ', 'Apto 111b', '11-976543210', 'mariasilva@gmail.com    ', NOW(), 'maria1.jpg     ');
SELECT LAST_INSERT_ID();
INSERT INTO Cliente VALUES (last_insert_rowid(), 'Proximo ao Supermercado    ', last_insert_rowid());

-- Insere dados na taabela de entregador
INSERT INTO Usuario VALUES (Null, 'Zezinho               ', '1234           ', 'M', 1, '1580 ', 'Fundos   ', '11-999999999', 'zezinho@gmail.com       ', NOW(), 'zezinho.jpg    ');
SELECT LAST_INSERT_ID();
INSERT INTO Entregador VALUES (last_insert_rowid(), 'Moto Yamaha                ', 'Placa ABC-1234      ', last_insert_rowid());

INSERT INTO Usuario VALUES (Null, 'Pedrão                ', '4321           ', 'M', 1, '680  ', 'Apto 11  ', '11-998765432', 'pedrao@gmail.com        ', NOW(), 'pedrao.jpg     ');
SELECT LAST_INSERT_ID();
INSERT INTO Entregador VALUES (last_insert_rowid(), 'Bicicleta Caloi            ', 'Sem identificação   ', last_insert_rowid());

INSERT INTO Usuario VALUES (Null, 'Chiquinho             ', '987            ', 'M', 1, '456  ', '         ', '11-998866441', 'chiquinho@gmail.com      ', NOW(), 'chiquinho.jpg ');
SELECT LAST_INSERT_ID();
INSERT INTO Entregador VALUES (last_insert_rowid(), 'Moto                       ', 'Placa CDF-6666      ', last_insert_rowid());





















































-- *********************************************************************
-- Aqui começa os exemplos do comando Select
-- *********************************************************************

-- Mosra odos os cargos
SELECT Id_Cargo, Nome_Cargo FROM Cargo;

-- Mosra todos as Categorias
SELECT Id_Categoria, Nome_Categoria, Comentario, Imagem FROM Categoria;

-- Mosra os dados das Configurações
SELECT Id_Config, Data, Abre, Fecha, NrPedido FROM Configuracao;

-- Mosra os dados da Empresa
SELECT Id_Empresa, Nome_Empresa, Fantasia, Cnpj, Ie, Cep, Endereco, Numero, Bairro, Cidade, Uf, Telefone, Site, Data, Logo FROM Empresa;

-- Mosra os dados do Pagamento
SELECT Id_Pagamento, Nome_Pagamento, Troco, Foto FROM Pagamento;

-- Mosra os dados do Perfil
SELECT Id_Perfil, Acessa_Cliente, Acessa_Funcionario, Acessa_Produto, Acessa_Entregador, Acessa_Status, Acessa_Venda,  Acessa_Carrinho  FROM Perfil;

-- Mosta os dados do Status
SELECT Id_Status, Nome_Status FROM Status

-- Mosta os dados do Cliente com seu endereço
SELECT u.Id_Usuario,
       u.Nome_Usuario,
       u.Senha,
       u.Sexo,
       u.Telefone,
       u.Email,
       u.Nascimento,
       u.Foto,
       p.Cep,
       p.Cidade,    
       p.Tipo,      
       p.Logradouro,
       u.Numero,
       u.Complemento,
       p.Bairro,    
       c.Referencia
FROM   Usuario u
Join   Cliente as c on u.Id_Usuario = c.Usuario
Join   Cep as p     on u.Cep = p.Id_Cep; 

-- Mosta os dados do Entregador com seu endereço
SELECT u.Id_Usuario,
       u.Nome_Usuario,
       u.Senha,
       u.Sexo,
       u.Telefone,
       u.Email,
       u.Nascimento,
       u.Foto,
       p.Cep,
       p.Cidade,    
       p.Tipo,      
       p.Logradouro,
       u.Numero,
       u.Complemento,
       p.Bairro,    
       e.Veiculo,
       e.Identificacao
FROM   Usuario u
Join   Entregador as e on u.Id_Usuario = e.Usuario
Join   Cep as p        on u.Cep = p.Id_Cep; 

-- Mosra todos os produos e suas caegorias com saus igual a 1
Select p.Id_Produto,
       p.Cod_Produto,
       P.Nome_Produto,
       p.Categoria,
       p.Desc_Produto, 
       p.Estoque, 
       p.Estoque_Min, 
       p.Estoque_Max, 
       p.Valor, 
       p.Status_Produto, 
       p.Imagem,
       c.Nome_Categoria
from   Produto p
Join   Categoria c on p.Categoria = C.Id_Categoria
Where  p.Status_Produto = 1
limit  10;




