# Library-web-applicaton
web application for my school ENSA Agadir by using php native

before runnig please execute the query right below :

CREATE DATABASE library;

CREATE TABLE responsable(
cniR varchar(10) primary key not null,
nomR varchar(50) not null,
prenomR varchar(50) not null,
emailR varchar(50) not null,
phoneR varchar(255) not null,
phoneR int(10)not null,
photo varchar(255) not null,
adress text not null
);
CREATE TABLE etudiant (
cne varchar(10) not null primary key  ,
nomE varchar(50) not null,
prenomE varchar(50) not null,
email varchar(255) not null,
password varchar(100) not null,
phone int(10) not null,
adress text not null,
niveau varchar(50) not  null,
photo varchar(255) not null,
emprunter int(1) not null DEFAULT 0,
cniR varchar(10) not null DEFAULT 'GJ42116' references responsable(cniR)
);

CREATE TABLE livres (
code_livre int(11) not null primary key AUTO_INCREMENT,
libelle varchar(60) not null,
titre varchar(255) not null,
description text not null,
auteur varchar(255) not null,
photo varchar(255) not null,
annee_edition date ,
livre_emprunter int(1) not null DEFAULT 0,
cniR varchar(10) not null DEFAULT 'GJ42116' references responsable(cniR)
);
CREATE TABLE emprunter (
cne varchar(10) not null references etudiant(cne),
code_livre int(11) not null references livres(code_livre),
date_empruntation date,
date_retour date
);
CREATE TABLE commenter(
cne varchar(10) not null references etudiant(cne),
code_livre int(11) not null references livres(code_livre),
message text not null,
date_commentation datetime  
);

INSERT INTO livres(`genre`, `titre`, `description`, `auteur`, `image`, `livre_emprunter`, `annee_edition`) 
VALUES ('maths','analyse','ce livre est cool','jean marier monier','livre4.jpg',0,'2010-01-01');

INSERT INTO livres(`genre`, `titre`, `description`, `auteur`, `image`, `livre_emprunter`, `annee_edition`) 
VALUES ('physique','analyse','ce livre est cool','jean marier monier','livre3.jpg',0,'2010-01-01');

INSERT INTO livres(`genre`, `titre`, `description`, `auteur`, `image`, `livre_emprunter`, `annee_edition`) 
VALUES ('maths','analyse','ce livre est cool','jean marier monier','livre5.jpg',0,'2010-01-01');
 
