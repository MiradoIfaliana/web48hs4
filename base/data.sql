--genre
insert into genre values (null , 'homme' , 1) , (null , 'femme' , 0);
--admins
insert into admins values(null , 'ains' ,'ITU@gmail.com' , 'qwert');
--users
insert into users values (null , 'mirado','mirado@gmail.com' , '2002-04-17' , 1 , 170 , '54.5' ,'mirado' );
--objectif
insert into objectif (objectif) values('Augmenter poids'),('Diminuer poids');
--categorierepas
insert into categorierepas(categorie) values('Petit-dejeuner'),('Dejeuner'),('Diner');
--1:matin 2:midi 3:soir


insert into repas(nomrepas,descriptions,unit,prixunit,photos,idcategorierepas) values
    ('mais au lait','60% de cereal mais et 40% de lait de',100,3000,'maislait.jpg',1),
    ('steak et legume','steak grille avec du legume saute',100,5000,'steaklegume.jpg',2),
    ('Humburger','pain Humburger avec steak et salade et concombre',100,3500,'amburger.jpg',3),
    ('crepe','crepe au lait sucré ',100,3000,'crepe.jpg',1),
    ('salade de patte','salade de patte au tomate avec salade vert',100,3000,'saladepatte.jpg',2),
    ('pizza','pizza 4 fromage bien garnie',100,7000,'pizza.jpg',3),
    ('Gauffre et lait','gauffre sucre et lait de vache',100,3000,'gauffre.jpg',1),
    ('steak au teint','steak grille parfume teint',100,5000,'steakteint.jpg',2),
    ('sandwich','pain sandwich avec steak hachee et salade et concombre',100,3500,'sandwich.jpg',3),
    ('Cake et cafe au lait','cake vanille et cafe noir au lait',100,3500,'cakecafe.jpeg',1),
    ('spagetti au crevette','spaghetti au crevette',100,2900,'spagetti.jpg',2),
    ('soupe viande legume','20% carotte 20% pomme de terre 20% viande 20% citrouille 20% celerie',100,2500,'soupeviande.jpg',3),
    ('pain aux oeufs','pain complet aux oeufs de poule',100,2000,'painoeufs.jpg',1),
    ('Poisson au pomme de terre','poisson frite melanger avec du pomme de terre frite',100,5000,'poissonpommedeterre.jpg',2),
    ('gratin choux-fleure au fromage','70% choux-fleure 10% lait 10% fromage 10% farine',100,4500,'gratinchoux.jpg',3),
    
    ('biscotte au miel et the vert','biscotte eu miel accompagne de the vert',100,2000,'biscottemiel.jpg',1),
    ('brocolis au poisson','80% salade de brocolis vegetarien 20% poisson',100,3400,'brocolispoisson.jpg',2),
    ('salade haricot vert','salade haricot vert compose oignon tomate olive',100,2500,'saladeharicotvert.jpg',3),
    ('pain et fruit decouper','6 fruit different decouper accompagne de pain',100,3300,'painfruit.jpg',1),
    ('salade de chou-fleur au poulet','salade de chou-fleur 70% vegetarien et 20% de poulet',100,3200,'saladechou.jpg',2),
    ('salade composee','salade vert au tomate concombre oignon radi',100,3000,'saladecomposee.jpg',3),
    ('oeuf dur au salade composee','ouef dur melanger avec la salade vert compose au tomate et oignon',100,2500,'oeufsalade.jpg',1),
    ('legumes sautes','legumes sautes compose de 5 legumes differents',100,2200,'legumessautes.jpg',2),
    ('Salade de fruit','salade au 6 fruit different',100,3500,'saladefruit.jpg',3),
    ('salade avocat','salade avocat au roquette et tomate',100,2100,'saladeavocat.jpg',1),
    ('oeuf au fleurettes de choux','oeuf au plat et fleurettes de choux fleurs',100,2900,'oeufchoux.jpg',2),
    ('soupe legume','20% carotte 20% pomme de terre 20% poireaux 20% citrouille 20% celerie',100,2500,'soupelegume.jpg',3),
    ('sandwich vegetarien','pain au legume 100% vegetarien',100,2000,'sandwichvegetarien.jpg',1),
    ('salade de germes de soja','soja frais au carotte concombre champignons',100,3100,'salagesoja.jpg',2),
    ('salade grecque traditionnelle','comcombres ,Feta ,huille olive ,oignons et olives noires',100,3500,'saladegrecque.jpg',3);
--sport
insert into sport(nomsport,descriptions,photos,agemin,agemax) values
    ('squat','executer des flexions des jambes, en portant une barre lestee sur les epaules','squat.jpg',10,70),
    ('pompe','abaissements et remontees repetitives reposant uniquement sur les deux pieds et deux mais','pompe.jpg',10,70),
    ('tirage horizontal','Ramenez les mains vers le poitrine tout e maintenant les coudes pres du corps,contractez les muscles du dos, puis revenez a la position de depart de maniere controlee','tiragehorizontal.jpg',10,70),
    ('fentes','grand pas en avant avec une jambe, flechissez les genoux en position de fente, puis poussez avec la jambe avant pour revenir a la position debout','fente.png',10,70),
    ('jogging','cours a pieds','jogging.jpg',10,70),
    ('velo','faire du velo','velo.jpg',10,70),
    ('corde a sauter','sautez en faisont passer la corde sous vos pieds et maintenir un rythme regulier','cordesauter.jpg',10,70),
    ('zumba','danse zumba ,suivez les mouvements choregraphies sur des rythmes entrainements','zumba.jpg',10,70);

--regimeparam
----objectif augmanter 1 
insert into regimeparam(idobjectif, idrepasmatin, idrepasmidi ,idrepassoir ,quantiteparjour, idsport, dureeparjour, objectifobtenu) values
    ( 1, 1,2,3,100,1,5,70),
    ( 1, 4,5,6,100,2,5,60),
    ( 1, 7,8,9,100,3,10,75),
    ( 1, 10,11,12,100,4,10,70),
    ( 1, 13,14,15,100,1,5,65),
    ( 2, 16,17,18,100,5,20,65),
    ( 2, 19,20,21,100,6,25,50),
    ( 2, 22,23,24,100,7,5,55),
    ( 2, 25,26,27,100,8,30,60),
    ( 2, 28,29,30,100,5,20,60);
    

insert into regime values (null , 1 , 1 , 5 , '2023-07-11' , 50000) ,
     (null , 1 , 1 , 5 , '2023-01-11' , 50000),
     (null , 1 , 2 , 5 , '2023-02-11' , 150000),
     (null , 1 , 2 , 5 , '2023-03-11' , 60000),
     (null , 1 , 2 , 5 , '2023-04-11' , 2000),
     (null , 1 , 1 , 5 , '2023-05-11' , 80000),
     (null , 1 , 1 , 5 , '2023-06-11' , 50000),
     (null , 1 , 2 , 5 , '2023-08-11' , 140000),
     (null , 1 , 1 , 5 , '2023-09-11' , 80000),
     (null , 1 , 1 , 5 , '2023-10-11' , 50000),
     (null , 1 , 1 , 5 , '2023-11-12' , 50000),
     (null , 1 , 1 , 5 , '2023-12-11' , 10000);

     insert into regime values (null , 1 , 1 , 5 , '2023-07-11' , 50000) ,
     (null , 1 , 1 , 5 , '2023-01-11' , 50000),
     (null , 1 , 2 , 5 , '2023-02-11' , 150000),
     (null , 1 , 2 , 5 , '2023-03-11' , 60000),
     (null , 1 , 2 , 5 , '2023-04-11' , 2000),
     (null , 1 , 1 , 5 , '2023-05-11' , 80000),
     (null , 1 , 1 , 5 , '2023-06-11' , 50000),
     (null , 1 , 2 , 5 , '2023-08-11' , 140000),
     (null , 1 , 1 , 5 , '2023-09-11' , 80000),
     (null , 1 , 1 , 5 , '2023-10-11' , 50000),
     (null , 1 , 1 , 5 , '2023-11-12' , 50000),
     (null , 1 , 1 , 5 , '2023-12-11' , 10000);

     insert into regime values (null , 2 , 1 , 5 , '2023-07-11' , 50000) ,
     (null , 2 , 1 , 5 , '2023-01-11' , 50000),
     (null , 2 , 2 , 5 , '2023-02-11' , 150000),
     (null , 2 , 2 , 5 , '2023-03-11' , 60000),
     (null , 2 , 2 , 5 , '2023-04-11' , 2000),
     (null , 2 , 1 , 5 , '2023-05-11' , 80000),
     (null , 2 , 1 , 5 , '2023-06-11' , 50000),
     (null , 2 , 2 , 5 , '2023-08-11' , 140000),
     (null , 2 , 1 , 5 , '2023-09-11' , 80000),
     (null , 2 , 1 , 5 , '2023-10-11' , 50000),
     (null , 2 , 1 , 5 , '2023-11-12' , 50000),
     (null , 2 , 1 , 5 , '2023-12-11' , 10000);