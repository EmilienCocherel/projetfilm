DROP TABLE IF EXISTS films;
DROP TABLE IF EXISTS individus;
DROP TABLE IF EXISTS acteurs;
DROP TABLE IF EXISTS genres;
DROP TABLE IF EXISTS classification;


CREATE TABLE IF NOT EXISTS films (
  code_film int(11) NOT NULL,
  titre_film varchar(50),
  date int(11) DEFAULT NULL,
  duree int(11) DEFAULT NULL,
  image varchar(20) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS individus (
  code_indiv int(11) NOT NULL,
  nom varchar(20) DEFAULT NULL,
  prenom varchar(20) DEFAULT NULL,
  nationalite varchar(20) DEFAULT NULL,
  date_naiss int(11) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS acteurs (
  ref_code_film int(11) DEFAULT NULL,
  ref_code_acteur int(11) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS genres (
  code_genre int(11) NOT NULL,
  nom_genre varchar(50) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS classification (
  ref_code_film int(11) DEFAULT NULL,
  ref_code_genre int(11) DEFAULT NULL
);
