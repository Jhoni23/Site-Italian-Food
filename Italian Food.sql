create database bd_lojaphp;

use bd_lojaphp;

create table tb_produtos
(
tb_produtos_id integer not null primary key auto_increment,
tb_produtos_nome varchar(64) not null,
tb_produtos_preço double(10,2) not null,
tb_produtos_tipo varchar(32) not null
);

insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Kit de Queijos", 29.99, "Queijo");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Queijo Minas 1Kg", 35.00, "Queijo");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Queijo Brie 1 Kg", 47.90, "Queijo");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Queijo Gouda 1 Kg", 39.90, "Queijo");

insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Massa Italiana Tradizionale", 30.50, "Massa");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Massa Carbonara", 55.00, "Massa");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Nhoque ao Molho Sugo", 21.30, "Massa");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Lasanha a Bolonhesa", 27.40, "Massa");

insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Vinho Barista Pinotage 2020", 174.21, "Bebida");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Vinho Amaya Pinot Noir 2017", 376.22, "Bebida");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Espumante Marquês de Borba Brut", 177.60, "Bebida");
insert into tb_produtos (tb_produtos_nome, tb_produtos_preço, tb_produtos_tipo) values("Vinho The Wolftrap Red Blend 2019", 123.74, "Bebida");

create table tb_carrinho 
(
tb_carrinho_id integer not null primary key auto_increment,
tb_produtos_id integer not null,
tb_carrinho_qtd int(11) not null
);

alter table tb_carrinho
add constraint pk_tb_produtos_fk_tb_carrinho
foreign key(tb_produtos_id)
references tb_produtos(tb_produtos_id);

create table tb_cliente
(
cod_cliente int not null auto_increment primary key,
nome varchar(255),
telefone varchar(255),
endereco varchar(255),
email varchar(255),
senha varchar(32) not null
);