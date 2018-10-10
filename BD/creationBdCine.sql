drop table FILM cascade constraints;


create table if not exists FILM (
  Titre VarChar2(20),
  Réalisateur VarChar2(20),
  Genre VarChar2(20),
  DateSortie Date("AAAA-MM-JJ")
  Durée TIME("HH:MM"),
  Langue VarChar2(20)
)
