/*Obtenir tous les id des films*/

select code_film from films;

/*Obtenir tous les id des films*/
select code_indiv from individus;


/*Obtenir le nombre de films */
select count(code_film) from films;

/*Obtenir le nombre d'acteurs */
select count(code_indiv) from individus;


/* Affiche tous les films de la base ainsi que toutes leurs infos sauf l'ID*/
select titre_film,date,duree,image from films;