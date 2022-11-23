#Banco de dados - TCC - Grupo D
create database Radix;
use Radix;

#Tabela Clientes
create table tblCliente(
idCliente int auto_increment primary key,
nome varchar(50),
cpf varchar(14),
email varchar(50),
senha varchar(15),
statusConta bit
);

#Tabela Vendedor
create table tblVendedor(
idVendedor int auto_increment primary key,
nomeVend varchar(50),
cpfCnpj varchar(20),
emailVend varchar(50),
senhaVend varchar(15),
imagemVend varchar(500),
enderecoVend varchar(100),
statusConta bit
);


#Tabela Endereco
create table tblEndereco(
idEndereco int auto_increment primary key,
endereco varchar(100),
apelidoEndereco varchar(100),
complemento varchar(50),
numero varchar(5),
enderecoPrincipal bit,
statusEndereco bit,
idCliente int,
foreign key (idCliente) references tblCliente(idCliente)
);

#Tabela Produto
create table tblProduto(
idProduto int auto_increment primary key,
nomeProd varchar(50),
preco double,
foto varchar(500),
detalhe varchar(250),
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor),
statusProduto bit
);

#Tabela Item
create table tblItem(
idItem int auto_increment primary key,
qtde int,
idProduto int,
foreign key (idProduto) references tblProduto(idProduto),
idCliente int,
foreign key (idCliente) references tblCliente(idCliente),
statusItem bit
);


#Tabela Pedido
create table tblPedido(
idPedido int auto_increment primary key,
horario datetime,
cupom bit,
frete decimal,
idCliente int,
foreign key (idCliente) references tblCliente(idCliente),
idItem int,
foreign key (idItem) references tblItem(idItem),
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor)
);

#Tabela Entrega
create table tblEntrega(
idEntrega int auto_increment primary key,
horario datetime,
cupom bit,
frete decimal,
statusEntrega int,
idCliente int,
foreign key (idCliente) references tblCliente(idCliente),
idItem int,
foreign key (idItem) references tblItem(idItem),
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor)
);

#Tabela Punicao
create table tblPunicao(
idPunicoes int auto_increment primary key,
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor),
tipo varchar(20),
motivo varchar(300),
assunto varchar(25)
);

#Tabela Cupom
create table tblCupom(
idCupom int auto_increment primary key,
nomeCupom varchar (20),
detalhe varchar(100),
num double,
idCliente int,
foreign key (idCliente) references tblCliente(idCliente)
);

#Tabela Reclamacao
create table tblReclamacao(
idReclamacao int auto_increment primary key,
motivo varchar(300),
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor),
idCliente int,
foreign key (idCliente) references tblCliente(idCliente)
);

#Tabela Feedback
create table tblFeedback(
idFeedback int auto_increment primary key,
feedback varchar(300),
idCliente int,
foreign key(idCliente) references tblCliente(idCliente)
);


#Tabela ADM
create table tblADM(
idADM int auto_increment primary key,
userAdm varchar(10),
senhaAdm varchar(10)
);

#Tabela Despesas
create table tblDespesas(
idDespesas int auto_increment primary key,
dia date,
descricao varchar(100),
valor decimal,
conta varchar(20),
situacao varchar(30),
idADM int,
foreign key(idADM) references tblADM(idADM)
);

#Tabela Lembrete
create table tblLembrete(
idLembrete int auto_increment primary key,
titulo varchar(50),
criador varchar(50),
data date,
requisitados varchar(50),
statusLembrete varchar(25)
);

create table tblConta(
idConta int auto_increment primary key,
valorConta double,
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor)
);

-- Tabela Conversa
create table tblConversa (
idConversa int auto_increment primary key,
idCliente int,
foreign key (idCliente) references tblCliente(idCliente),
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor)
);

-- Tabela Mensagem Cliente
create table tblMsgCliente(
idMsgCliente int auto_increment primary key,
msg varchar(150),
msgData datetime,
idConversa int,
foreign key (idConversa) references tblConversa(idConversa)
);

-- Tabela Mensagem Vendedor
create table tblMsgVendedor(
idMsgVendedor int auto_increment primary key,
msg varchar(150),
msgData datetime,
idConversa int,
foreign key (idConversa) references tblConversa(idConversa)
);

insert into tblConversa (idVendedor,idCliente) values (1,1);
insert into tblConversa (idVendedor,idCliente) values (3,1);

insert into tblConversa (idVendedor,idCliente) values (1,4);


insert into tblmsgvendedor (msg,msgData,idConversa) values ('Opa eu sou vendedor', NOW(),1);
insert into tblmsgCliente (msg,msgData,idConversa) values ('mt foda', NOW(),2);

select * from tblmsgcliente group by msgData DESC limit 1;

SELECT * from tblMsgVendedor where msg = 'Opa eu sou Cliente';

SELECT * FROM tblCliente as cli inner join tblConversa as c on cli.idCliente = c.idCliente where c.idVendedor = 1 order by c.idCliente DESC;

select c.idConversa,idCliente,msgData,msg as msgC from tblConversa as c inner join tblmsgcliente as mc where c.idConversa = 1 UNION
select c.idConversa,idVendedor,msgData,msg as msgV from tblConversa as c inner join tblmsgVendedor as mc where c.idConversa = 1 order by msgData DESC ;

INSERT INTO tblPunicao(idVendedor, tipo, motivo, assunto) 
                VALUES (1,'a','a','a');
                
select * from tblCliente;
select * from tblVendedor;
select * from tblLembrete;
select * from tblADM;
select * from tblProduto;
select * from tblDespesas;
select * from tblCupom;
select * from tblPedido;
select * from tblItem;
select * from tblEntrega;
select * from tblFeedback;
select * from tblConta;
select * from tblEndereco;
select * from tblConversa;
select * from tblMsgcliente;
select * from tblMsgVendedor;
select * from tblPunicao;

UPDATE tblVendedor
            SET statusConta = 1
            WHERE idVendedor = 5;

INSERT INTO tblMsgVendedor (msg,msgData,idConversa)
                                        VALUES ('a', NOW(), 1);

use radix;

insert into tblADM (userAdm,senhaAdm) values ('root', '123');

insert into tblCupom (nome,detalhe,num) values ('BEMVINDO10','Cupom de R$ 10,00 para todos os novos usuários de nosso aplicativo, aproveite!','10');

insert into tblProduto value (1,'Pimentão',15.99,'4bda7af87610498bdece3b41fbc6612d.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (2,'Pepino',9,'20285168ce125cf9d86c5d86eaafd181.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (3,'Tomate',5,'5946899e32dd2003aacb7db220fd8139.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (4,'Gengibre',3.99,'5804ecc2fa85f418071bd1a5edbdc43f.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (5,'Repolho',8,'d881fc561116697b682fc00c051e105a.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (6,'Couve-Flor',3.9,'d1aa69398810b2a463fd0ecb9ea71365.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (7,'Cenoura',12,'dabd7de234ae65a44208ecff2a5defb7.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (8,'Rúcula',5.99,'7e5300afda3059fb11be565c343aae33.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (9,'Invis',100,'d7c58f766bb0bcfeb9882126fc2d6472.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);
insert into tblProduto value (10,'Invis',100,'d7c58f766bb0bcfeb9882126fc2d6472.png',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ",1,1);

/* Inserts de vendedor e cliente*/
insert into tblVendedor (nomeVend , cpfCnpj , emailVend, senhaVend , imagemVend , statusConta)
values 
 ('Vitor da Mata','96.235.591/0001-55','vitor71@hotmail.com','VUFcfCL','', 1),
 ('Ana Clara Cardoso','47.558.723/0001-74','ana44@gmail.com','Plpc9Lg','', 1),
 ('Brenda Vieira','55.563.888/0001-62','brendavieira17@yahoo.com','VkcfaaT','', 1),
 ('Kaique Moreira','41.630.822/0001-33','ka.jerde@gmail.com','sluq1m0','', 0),
 ('Pedro Miguel da Silva','87.723.907/0001-67','pe_miguel@gmail.com','pe9dzmO','', 1);
 
insert into tblCliente (nome , cpf , email , senha , statusConta)
values 
 ('Antônio Souza','297.460.304-18','antonio_dare@yahoo.com','jOC7EC3', 0),
 ('Davi Luiz Amorim','774.489.347-67','davi_32@hotmail.com','emh91hA', 1),
 ('Vitor Almeida','365.232.770-54','vitor_moore16@hotmail.com','eB0Fgcv', 1),
 ('Diogo da Conceição','756.703.499-97','celine5@gmail.com','9B2EtjA', 1),
 ('Pietra Rocha','856.885.686-15','ro_pietra@gmail.com','QtagEEa', 1);

/*Drops
TABELAS
use Radix
go
drop table tblEndereco
drop table tblPedido
drop table tblItem
drop table tblProduto
drop table tblVendedor
drop table tblCliente
drop table tblADM


BANCO
use master
go
drop database Radix
*/

-- despesas lembrete gastos/vendas cupons feedback 
