DROP DATABASE IF EXISTS mozi;
CREATE DATABASE mozi
	DEFAULT CHARACTER SET 'utf8'
    DEFAULT COLLATE 'utf8_general_ci'
;

USE mozi;

CREATE TABLE film(
	id int PRIMARY KEY AUTO_INCREMENT,
	cim nvarchar(200) NOT NULL
);

CREATE TABLE termek(
	id int PRIMARY KEY AUTO_INCREMENT,
    nev nvarchar(100) NOT NULL,
	darabszam int NOT NULL,
    ar nvarchar(40) NOT NULL,
    filmID int,
    CONSTRAINT FK_termek_film FOREIGN KEY (filmID) REFERENCES film(id)
);

CREATE TABLE kombinaltMusor(
	elsoFilmID int,
    masodikFilmID int,
    PRIMARY KEY(elsoFilmID,masodikFilmID),
    CONSTRAINT FK_elsoFilm_film FOREIGN KEY (elsoFilmID) REFERENCES film(id),
    CONSTRAINT FK_masodikFilm_film FOREIGN KEY (masodikFilmID) REFERENCES film(id)
);

CREATE TABLE felhasznalo(
	nev varchar(200) PRIMARY KEY,
    pwd nvarchar(200) NOT NULL
);

INSERT INTO felhasznalo VALUES('mozifuggo','nemmondommeg');
