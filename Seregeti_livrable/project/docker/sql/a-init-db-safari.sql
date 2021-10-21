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

CREATE TABLE "animaux" (
  "codeA" SERIAL PRIMARY KEY NOT NULL,
  "classea" varchar(255),
  "famillea" varchar(255),
  "especea" varchar(255),
  "sexe" _sexe,
  "dateArrivee" date DEFAULT now(),
  "vaccin" int DEFAULT null
);

CREATE TABLE "vegetaux" (
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
  "sexe" _sexe,
  "dateArrivee" date DEFAULT now(),
  "typeContrat" typec,
  "salaire" int
);

CREATE TABLE "soins" (
  "dateS" timestamp NOT NULL DEFAULT now(),
  "refS" int NOT NULL,
  "codeA" int DEFAULT 1,
  "typeS" typesoin,
  "commentaireS" varchar(255),
  "nomZone" varchar(255),
  PRIMARY KEY ("dateS", "refS")
);

CREATE TABLE "zones" (
  "nomZone" varchar(255) PRIMARY KEY NOT NULL,
  "superficie" int,
  "responsable" int
);

CREATE TABLE "interventions" (
  "dateI" timestamp NOT NULL DEFAULT now(),
  "codeEquipe" int NOT NULL,
  "nomZone" varchar(255),
  "commentaireI" varchar(255),
  PRIMARY KEY ("dateI", "codeEquipe")
);
 
CREATE TABLE "soignants" (
  "refS" int PRIMARY KEY,
  "specialite" varchar(255)
);

CREATE TABLE "gardes" (
  "codeP" int PRIMARY KEY,
  "codeE" int
);

CREATE TABLE "equipes" (
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

CREATE TABLE "utilisateurs" (
  "identifiant" int  PRIMARY KEY NOT NULL,
  "mdp" varchar(130) NOT NULL
);

ALTER TABLE "soins" ADD FOREIGN KEY ("refS") REFERENCES "personnel" ("codeP");

ALTER TABLE "soins" ADD FOREIGN KEY ("nomZone") REFERENCES "zones" ("nomZone");

ALTER TABLE "zones" ADD FOREIGN KEY ("responsable") REFERENCES "personnel" ("codeP");

ALTER TABLE "interventions" ADD FOREIGN KEY ("codeEquipe") REFERENCES "equipe" ("codeE");

ALTER TABLE "interventions" ADD FOREIGN KEY ("nomZone") REFERENCES "zones" ("nomZone");

ALTER TABLE "soignants" ADD FOREIGN KEY ("refS") REFERENCES "personnel" ("codeP");

ALTER TABLE "gardes" ADD FOREIGN KEY ("codeP") REFERENCES "personnel" ("codeP");

ALTER TABLE "utilisateurs" ADD FOREIGN KEY ("identifiant") REFERENCES "personnel" ("codeP");

ALTER TABLE "gardes" ADD FOREIGN KEY ("codeE") REFERENCES "equipe" ("codeE");

ALTER TABLE "ressencement_A" ADD FOREIGN KEY ("animal") REFERENCES "animaux" ("codeA");

ALTER TABLE "ressencement_A" ADD FOREIGN KEY ("zone") REFERENCES "zones" ("nomZone");

ALTER TABLE "ressencement_V" ADD FOREIGN KEY ("vegetal") REFERENCES "vegetaux" ("codeV");

ALTER TABLE "ressencement_V" ADD FOREIGN KEY ("zone") REFERENCES "zones" ("nomZone");

