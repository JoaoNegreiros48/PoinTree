

create database pointree;

use pointree;

create table usuario(	
nome varchar(60) not null,
cpf numeric(11) not null primary key,
email varchar(40) not null,
senha varchar(16) not null,
cep numeric(9) not null,
rua_logradouro varchar(60),
bairro varchar(60),
cidade_localidade varchar(20),
UF varchar(2),
horario_de_registro datetime
);

create table relatorio_Plantio(
flora varchar(20),
cpf numeric(11),
num_arvores_plantadas numeric(5),
data_plantio datetime,
primary key(cpf,data_plantio)
);


insert into usuario values('Marquins', 11122233345, 'mecha123@gmail.com', 'marquins123',18117300, 'São Pedro Nunes', 'Parque Jataí', 'Sorocaba',
 'SP', '2013-02-11 00:00:00');

insert into relatorio_Plantio values('Caatinga',11122233345,12,'2014-02-11 00:00:00');


insert into usuario values('Leonardo Felipe Camilo Delgado', 515222578, 'leonardo.delgadosp2014@gmail.com', 'leo123',18117250,
 'Luis Caetano Bernardiz', 'Parque Jataí', 'Votorantim', 'SP','2010-04-11 00:00:00');

insert into relatorio_Plantio values('Amazônia',515222578,11,'2013-03-22 00:00:00');
insert into relatorio_Plantio values('Mata Atlântica',515222578,31,'2018-03-22 00:00:00');
insert into relatorio_Plantio values('Caatinga',515222578,8,'2016-03-22 00:00:00');
insert into relatorio_Plantio values('Cerrado',515222578,5,'2020-02-11 00:00:00');
insert into relatorio_Plantio values('Cerrado',515222578,42,'2020-03-11 00:00:00');
insert into relatorio_Plantio values('Cerrado',515222578,1,'2020-04-11 00:00:00');
insert into relatorio_Plantio values('Cerrado',515222578,22,'2020-05-11 00:00:00');

insert into usuario values('Administrador', 10000000000, 'pointreeAdm@gmail.org','admin', 12345678, '', '', '', '', '2010-01-01 00:00:00');


alter table relatorio_Plantio add foreign key cpf2(cpf) references usuario(cpf);







