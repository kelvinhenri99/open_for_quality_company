create database agro;

use agro;

create table propriedade_agricola (
    prop_codigo int(4) primary key auto_increment not null,
    prop_descricao varchar(30),
    prop_area decimal(6,2)
);

create table talhao (
    talh_safra int(4) unique,
    talh_codigo_prop int(4),
    constraint FK_prop_codigo_talh_codigo foreign key (talh_codigo_prop) references propriedade_agricola(prop_codigo),
    talh_codigo int(5) primary key auto_increment not null
);

/* Consulta a) */
select *
	from propriedade_agricola
		inner join talhao on propriedade_agricola.prop_codigo = talhao.talh_codigo_prop
			where propriedade_agricola.prop_codigo = "20"
				and talhao.talh_safra = "2021"
					order by talhao.talh_codigo;

/* Consulta b) */
select sum(prop_area) as "Soma das áreas de todas as propriedades"
	from propriedade_agricola;
    
/* Consulta c) */
select *
	from talhao
		inner join propriedade_agricola on propriedade_agricola.prop_codigo = talhao.talh_codigo_prop
			where talhao.talh_codigo > 15
				and talhao.talh_safra = 2022
					and propriedade_agricola.prop_codigo = 5
						order by talhao.talh_codigo;
                    
/* Consulta d) */
select count(*) as "Total talhões em 2020"
	from talhao
		where talh_safra = "2020";
    
/* Consulta e) */
select count(*) as "Total talhões da propriedade 10 na safra de 2021"
	from talhao
		where talh_codigo_prop = "10"
			and talh_safra = "2021";
/* OU */
select count(*) as "Total talhões da propriedade 10 na safra de 2021"
	from talhao
		inner join propriedade_agricola on propriedade_agricola.prop_codigo = talhao.talh_codigo_prop
			where propriedade_agricola.prop_codigo = "10"
				and talhao.talh_safra = "2021";