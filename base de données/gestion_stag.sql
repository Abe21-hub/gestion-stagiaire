
drop database if exists gestion_stag ;
create database if not exists gestion_stag ;
use gestion_stag ;

 create table stagiaire(
 idStagiaire int(4) auto_increment primary key,
 nom varchar(50),
 prenom varchar(50),
 civilite varchar(1),
 photo varchar(100),
 idFiliere int(4)
);

 create table filiere(
idFiliere int (4) auto_increment primary key,
nomFiliere varchar(50),
 niveau varchar (50)
 );
 
 create table utilisateur(
 idUser int(4) auto_increment primary key,
 login varchar(50),
 email varchar(255),
 role varchar(50),
 etat int(1), -- 1: activé 0: désactivé
 pwd varchar(255)
);

Alter table stagiaire
add constraint(idFiliere)
foreign key (idFiliere) 
references filiere;


INSERT INTO filiere(nomFiliere,niveau) VALUES
    ('TSDI','TS'),
    ('TSGE','TS'),
    ('TGI','T'),
    ('TSRI','TS'),
    ('TCE','T');

INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES
    ('admin','lahcenabousalih@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));
    
INSERT INTO stagiaire(nom,prenom,civilite,photo,idFiliere) VALUES
    ('SAADAOUI','MOHAMED','M','Chryssanthène.jpg',1),
    ('CHAFIK','OMAR','M','charles-atangana.jpg',2),
    ('SALIM','RACHIDA','F','Hortensias.jpg',3),
    ('FAOUZI','NABILA','F','Méduses.jpg',1),
    ('ETTAOUSSI','KAMAL','M','Manchots.jpg',2),
    ('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3),
    
    ('SAADAOUI','MOHAMED','M','Chryssanthène.jpg',1),
    ('CHAFIK','OMAR','M','charles-atangana.jpg',2),
    ('SALIM','RACHIDA','F','Hortensias.jpg',3),
    ('FAOUZI','NABILA','F','Méduses.jpg',1),
    ('ETTAOUSSI','KAMAL','M','Manchots.jpg',2),
    ('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3),
    
     ('SAADAOUI','MOHAMED','M','Chryssanthène.jpg',1),
    ('CHAFIK','OMAR','M','charles-atangana.jpg',2),
    ('SALIM','RACHIDA','F','Hortensias.jpg',3),
    ('FAOUZI','NABILA','F','Méduses.jpg',1),
    ('ETTAOUSSI','KAMAL','M','Manchots.jpg',2),
    ('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3);
    
    
select * from filiere;
select * from stagiaire;
select * from utilisateur;
