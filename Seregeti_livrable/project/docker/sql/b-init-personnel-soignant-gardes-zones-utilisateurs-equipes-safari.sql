INSERT INTO PERSONNEL("nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values('Anderson', 'Jose', 21,  'M','CDD', 1100);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (1, 'félin');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(2, 'Nkunkun', 'Christopher', 23, 'M',  'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (2, 'Bovidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(3,  'Weaver', 'Sigourney', 23, 'F',  'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (3, 'Giraffidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(4,  'Anderson', 'Sony', 40, 'M', 'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (4, 'Rhinocerotoidea');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(5, 'Toko-Ekambi', 'Karl', 43, 'M', 'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (5, 'Éléphantidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(6, 'Bennacer', 'Chakib', 53, 'M', 'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (6, 'Hippopotamoïdes');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(7, 'Blade', 'Adrien', 28, 'M', 'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (7, 'Canidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(8, 'Mendy', 'Inaya', 35, 'F',  'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (8, 'Hyénidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(9, 'Ben-Kalifa', 'Ismaïl', 22, 'M', 'CDD', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (9,'Crocodilidés');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(10, 'Awakada', 'Asma', 36, 'F', 'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (10,'Primate');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(11, 'Traoré', 'Awa', 59, 'F',  'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (11,'Oiseaux');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(12, 'Aly Samatta', 'Mbwana', 20, 'M',  'Alternance', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (12,'Oiseaux');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire") values(13, 'Copley', 'Sharlto', 47, 'M',  'CDI', 1500);
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (13, 'félin');
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (14,'Lepettiswiss','Joseph',  '24','M','Alternance', 950); 
INSERT INTO SOIGNANT ("refS", "specialite") VALUES (14, 'félin');



INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (15,'Blomkamp','Neil',  42,'M','CDI', 2500); 
INSERT INTO "zone"("nomZone", "superficie", "responsable") VALUES('A', 2000, 15);
INSERT INTO "utilisateur"("identifiant","mdp") VALUES(15,'a4d4cf96ece5702ce12fdd6bea67e0b45b56e55d9ea0c74c7fb8a241491437f334af81be49453d6b13761886f656fc65cebdfd567fb5ae08ae41b16c2a2f2a2f');

INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (16,'Bolt','Nathali',  48,'F','CDI', 2500); 
INSERT INTO "zone"("nomZone", "superficie", "responsable") VALUES ('B', 2225, 16);
INSERT INTO "utilisateur"("identifiant","mdp") VALUES(16,'ce2c7ad294e5fe484c7778cef25a8fc651da58569e0b32c60c9203cbe2755eace3a3636cd255a03824f5274e5290ff6d6de72b16a7f5d19778024d5fff220b80');

INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (17,'Ojo','Juliana',  31,'F','CDI', 2500); 
INSERT INTO "zone"("nomZone", "superficie", "responsable") VALUES('C', 3000, 17);
INSERT INTO "utilisateur"("identifiant","mdp") VALUES(17,'08aa9e9b23db4b85de4e67376bd25453807d0a8c603aa48b69fb638e3064a1e6f117b2e7f5aebc552ab5db7552141d909d6efe96b4d6d6c2021e7f6d95e5e692');






INSERT INTO EQUIPE ("codeE", "nomEquipe" ) VALUES(1,'Kilimanjaro Stars');
INSERT INTO EQUIPE ("codeE", "nomEquipe" ) VALUES(2,'Lions Stars');

INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (18,'Mrisho','Ngasa',  42,'M','CDI', 1800); 
INSERT INTO GARDE ("codeP", "codeE") VALUES (15, 1);
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (19,'Waziri','Thuwei',  28,'M','CDI', 1500);
INSERT INTO GARDE ("codeP", "codeE") VALUES (16, 1); 
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (20,'Mkambi','Juma',  21,'M','CDI', 1300);
INSERT INTO GARDE ("codeP", "codeE") VALUES (17, 1);  
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (21,'Msomali','Mahammed',  21,'M','CDI', 1300);
INSERT INTO GARDE ("codeP", "codeE") VALUES (18, 2);   
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (22,'West','Paul',  41,'M','CDI', 1700);
INSERT INTO GARDE ("codeP", "codeE") VALUES (19, 2);   
INSERT INTO PERSONNEL("codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire")  values (23,'Madadi','Salum',  48,'M','CDI', 1900);
INSERT INTO GARDE ("codeP", "codeE") VALUES (20, 2); 

