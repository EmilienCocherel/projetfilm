DROP TABLE IF EXISTS acteurs;
DROP TABLE IF EXISTS films;
DROP TABLE IF EXISTS individus;

/*creation de la table films*/
CREATE TABLE IF NOT EXISTS films (
  code_film int(11) NOT NULL primary key,
  titre_film varchar(50),
  date int(11) DEFAULT NULL,
  duree int(11) DEFAULT NULL,
  image varchar(20) DEFAULT NULL
);

/*creation de la table individus*/
CREATE TABLE IF NOT EXISTS individus (
  code_indiv int(11) NOT NULL primary key,
  nom varchar(20) DEFAULT NULL,
  prenom varchar(20) DEFAULT NULL,
  nationalite varchar(20) DEFAULT NULL,
  date_naiss int(11) DEFAULT NULL
);

/*creation de la table acteurs*/
CREATE TABLE IF NOT EXISTS acteurs (
  code_film int(11) DEFAULT NULL,
  code_indiv int(11) DEFAULT NULL,
  constraint fk_film foreign key(code_film) references films(code_film),
  constraint fk_acteurs foreign key(code_indiv) references individus(code_indiv)
);
