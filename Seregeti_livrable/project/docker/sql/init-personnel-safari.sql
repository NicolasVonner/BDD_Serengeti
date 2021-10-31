/*soigniant : */
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(1, 'Anderson', 'Jose', 21,  'CDD', 1100);
INSERT INTO "soignant" ("refS", "specialite") VALUES (1, 'félin');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(2, 'Nkunkun', 'Christopher', 23,  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (2, 'Bovidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(3,  'Weaver', 'Sigourney', 23, "f",  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (3, 'Giraffidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(4,  'Anderson', 'Sony', 40,  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (4, 'Rhinocerotoidea');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(5, 'Toko-Ekambi', 'Karl', 43,  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (5, 'Éléphantidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(6, 'Bennacer', 'Chakib', 53,  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (6, 'Hippopotamoïdes');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(7, 'Blade', 'Adrien', 28,  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (7, 'Canidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(8, 'Mendy', 'Inaya', 35, "f",  'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (8, 'Hyénidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(9, 'Ben-Kalifa', 'Ismaïl', 22,  'CDD', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (9,'Crocodilidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(10, 'Chaïb', 'Asma', 36, "f", 'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (10,'Primate');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(11, 'traoré', 'Awa', 59, "f", 'CDI', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (11,'Oiseaux');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(12, 'Aly Samatta', 'Mbwana', 20,  'alternance', 1500);
INSERT INTO "soignant" ("refS", "specialite") VALUES (12,'Oiseaux');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(13, 'Copley', 'Sharlto', 47,  'CDI', 1500);
INSERT INTO `soignant` (`refS`, `specialite`) VALUES (13, 'félin');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (14,'Lepettiswiss','Joseph',  '24','M','Alternance', 950); 
INSERT INTO `soignant` (`refS`, `specialite`) VALUES (14, 'félin');


/*responsable : */
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (15,'Blomkamp','Neil',  42,'M','CDI', 2500); 
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (16,'Bolt','Nathali',  48,'F','CDI', 2500); 
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (17,'Ojo','Juliana',  31,'F','CDI', 2500); 


INSERT INTO `zone` (`nomZone`, `superficie`, `responsable`) VALUES
('A', 2000, 15);
INSERT INTO `zone` (`nomZone`, `superficie`, `responsable`) VALUES
('B', 2225, 16);
INSERT INTO `zone` (`nomZone`, `superficie`, `responsable`) VALUES
('C', 3000, 17);


/*garde : */
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (15,'Mrisho','Ngasa',  42,'M','CDI', 1800); 
INSERT INTO "garde" ("codeP", "numEquipe") VALUES (15, 1);
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (16,'Waziri','Thuwei',  28,'M','CDI', 1500);
INSERT INTO "garde" ("codeP", "numEquipe") VALUES (16, 1); 
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (17,'Mkambi','Juma',  21,'M','CDI', 1300);
INSERT INTO "garde" ("codeP", "numEquipe") VALUES (17, 1);  
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (18,'Msomali','Mahammed',  21,'M','CDI', 1300);
INSERT INTO "garde" ("codeP", "numEquipe") VALUES (18, 2);   
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (19,'West','Paul',  41,'M','CDI', 1700);
INSERT INTO "garde" ("codeP", "numEquipe") VALUES (19, 2);   
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (20,'Madadi','Salum',  48,'M','CDI', 1900);
INSERT INTO "garde" ("codeP", "numEquipe") VALUES (20, 2); 
