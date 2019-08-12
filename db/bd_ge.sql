create database sig_barbearia;
use sig_barbearia;

create table usuario( 
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
	telefone text,
	foto text,
	tipo int,
	primary key(id)
);
/** 
	observação tabela usuario
	Tipo =1 - Dono de Estabelecimento
	Tipo 2= Cliente
	Tipo 0 = Administrador
	observacao tabela horario
	situacao =0 - Horario Livre
	situacao = 1 - Horario Reservado
	
**/

create table estabelecimento (
	id int auto_increment not null,
	id_usuario int not null,
	nome text not null,
	descricao text not null,
	endereco text not null,
	primary key(id),
	foreign key(id_usuario) references usuario(id)
);

create table horario(
	id int auto_increment not null,
	dia text ,
	horario text,
	situacao int,
	id_estabelecimento int not null,
	id_cliente int,
	primary key(id),
	foreign key(id_estabelecimento) references estabelecimento(id)
);

