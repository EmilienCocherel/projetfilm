DROP TABLE IF EXISTS jouer;
DROP TABLE IF EXISTS films;
DROP TABLE IF EXISTS acteur;

CREATE TABLE IF NOT EXISTS films (
  titre_film varchar(50) primary key,
  date int(11) DEFAULT NULL,
  duree int(11) DEFAULT NULL,
  image varchar(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS acteur (
  code_indiv int(11) NOT NULL primary key,
  nom varchar(20) DEFAULT NULL,
  prenom varchar(20) DEFAULT NULL,
  nationalite varchar(20) DEFAULT NULL,
  date_naiss int(11) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS jouer (
  titre_film varchar(50),
  code_indiv int(11) DEFAULT NULL,
  constraint fk_film foreign key(titre_film) references films(titre_film),
  constraint fk_acteurs foreign key(code_indiv) references acteur(code_indiv)
);