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
nome varchar(50),
cpfCnpj varchar(20),
email varchar(50),
senha varchar(15),
imagem long varbinary,
endereco varchar(100),
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
nome varchar(50),
foto long varbinary,
detalhe varchar(100),
idVendedor int,
foreign key (idVendedor) references tblVendedor(idVendedor),
statusProduto bit
);

#Tabela Item
create table tblItem(
idItem int auto_increment primary key,
qtde int,
idProduto int,
foreign key (idProduto) references tblProduto(idProduto)
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
foreign key (idItem) references tblItem(idItem)
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
nome varchar (20),
detalhe varchar(25),
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
nome varchar(20)
);

#Tabela ADM
create table tblADM(
idADM int auto_increment primary key,
userAdm varchar(10),
senha varchar(10)
);

#Tabela Despesas
create table tblDespesas(
idDespesas int auto_increment primary key,
dia datetime,
descricao varchar(100),
valor decimal,
conta varchar(20),
idADM int,
foreign key(idADM) references tblADM(idADM)
);

#Tabela Lembrete
create table tblLembrete(
idLembrete int auto_increment primary key,
titulo varchar(50),
requisitados int,
foreign key(requisitados) references tblADM(idADM),
statusLembrete varchar(15)
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