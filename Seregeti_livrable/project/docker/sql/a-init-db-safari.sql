CREATE TYPE "typesoin" AS ENUM (
  'Blessure_naturelle',
  'Blessure_braconier',
  'Soin_recurent'
);

CREATE TYPE "typec" AS ENUM (
  'CDI',
  'CDD',
  'Stage',
  'Alternance'
);

CREATE TYPE "_sexe" AS ENUM (
  'M',
  'F'
);

CREATE TABLE "animal" (
  "codeA" SERIAL PRIMARY KEY NOT NULL,
  "classeA" varchar(255),
  "familleA" varchar(255),
  "especeA" varchar(255),
  "sexeA" _sexe,
  "dateArrivee" date DEFAULT now(),
  "vaccin" int DEFAULT null
);

CREATE TABLE "vegetal" (
  "codeV" SERIAL PRIMARY KEY NOT NULL,
  "familleV" varchar(255),
  "especeV" varchar(255),
  "typeV" varchar(255)
);

CREATE TABLE "personnel" (
  "codeP" SERIAL PRIMARY KEY NOT NULL,
  "nom" varchar(255),
  "prenom" varchar(255),
  "age" int,
  "sexeP" _sexe,
  "dateArrivee" date DEFAULT now(),
  "typeContrat" typec,
  "salaire" int
);

CREATE TABLE "soin" (
  "dateS" timestamp NOT NULL DEFAULT now(),
  "refS" int NOT NULL,
  "codeA" int DEFAULT 1,
  "typeS" typesoin,
  "commentaireS" varchar(512),
  "nomZone" varchar(255),
  PRIMARY KEY ("dateS", "refS")
);

CREATE TABLE "zone" (
  "nomZone" varchar(255) PRIMARY KEY NOT NULL,
  "superficie" int,
  "responsable" int
);

CREATE TABLE "intervention" (
  "dateI" timestamp NOT NULL DEFAULT now(),
  "codeEquipe" int NOT NULL,
  "nomZone" varchar(255),
  "commentaireI" varchar(255),
  PRIMARY KEY ("dateI", "codeEquipe")
);
 
CREATE TABLE "soignant" (
  "refS" int PRIMARY KEY,
  "specialite" varchar(255)
);

CREATE TABLE "garde" (
  "codeP" int PRIMARY KEY,
  "codeE" int
);

CREATE TABLE "equipe" (
  "codeE" SERIAL PRIMARY KEY NOT NULL,
  "nomEquipe" varchar(255)
);

CREATE TABLE "ressencement_A" (
  "animal" int NOT NULL,
  "zone" varchar(255) NOT NULL,
  "nombre" int,
  "date" date NOT NULL DEFAULT now(),
  PRIMARY KEY ("animal", "zone", "date")
);

CREATE TABLE "ressencement_V" (
  "vegetal" int NOT NULL,
  "zone" varchar(255) NOT NULL,
  "nombre" int,
  "date" date NOT NULL DEFAULT now(),
  PRIMARY KEY ("vegetal", "zone", "date")
);

CREATE TABLE "utilisateur" (
  "identifiant" int  PRIMARY KEY NOT NULL,
  "mdp" varchar(130) NOT NULL
);

ALTER TABLE "soin" ADD FOREIGN KEY ("refS") REFERENCES "soignant" ("refS");

ALTER TABLE "soin" ADD FOREIGN KEY ("nomZone") REFERENCES "zone" ("nomZone");

ALTER TABLE "soin" ADD FOREIGN KEY ("nomZone") REFERENCES "zone" ("nomZone");

ALTER TABLE "soin" ADD FOREIGN KEY ("codeA") REFERENCES "animal" ("codeA");

ALTER TABLE "intervention" ADD FOREIGN KEY ("codeEquipe") REFERENCES "equipe" ("codeE");

ALTER TABLE "intervention" ADD FOREIGN KEY ("nomZone") REFERENCES "zone" ("nomZone");

ALTER TABLE "soignant" ADD FOREIGN KEY ("refS") REFERENCES "personnel" ("codeP");

ALTER TABLE "garde" ADD FOREIGN KEY ("codeP") REFERENCES "personnel" ("codeP");

ALTER TABLE "utilisateur" ADD FOREIGN KEY ("identifiant") REFERENCES "personnel" ("codeP");

ALTER TABLE "garde" ADD FOREIGN KEY ("codeE") REFERENCES "equipe" ("codeE");

ALTER TABLE "ressencement_A" ADD FOREIGN KEY ("animal") REFERENCES "animal" ("codeA");

ALTER TABLE "ressencement_A" ADD FOREIGN KEY ("zone") REFERENCES "zone" ("nomZone");

ALTER TABLE "ressencement_V" ADD FOREIGN KEY ("vegetal") REFERENCES "vegetal" ("codeV");

ALTER TABLE "ressencement_V" ADD FOREIGN KEY ("zone") REFERENCES "zone" ("nomZone");