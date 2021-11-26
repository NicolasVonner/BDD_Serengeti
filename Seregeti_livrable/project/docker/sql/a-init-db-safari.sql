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
  "nomZone" varchar(255) PRIMARY KEY  NOT NULL,
  "superficie" int,
  "responsable" int NOT NULL
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
  "date" date NOT NULL DEFAULT now(),
  PRIMARY KEY ("animal", "zone", "date")
);

CREATE TABLE "ressencement_V" (
  "vegetal" int NOT NULL,
  "zone" varchar(255) NOT NULL,
  "date" date NOT NULL DEFAULT now(),
  PRIMARY KEY ("vegetal", "zone", "date")
);

CREATE TABLE "utilisateur" (
  "identifiant" int  PRIMARY KEY NOT NULL,
  "mdp" varchar(255) 
);

ALTER TABLE "soin" ADD FOREIGN KEY ("refS") REFERENCES "soignant" ("refS") ON DELETE CASCADE;

ALTER TABLE "soin" ADD FOREIGN KEY ("nomZone") REFERENCES "zone" ("nomZone");


ALTER TABLE "soin" ADD FOREIGN KEY ("codeA") REFERENCES "animal" ("codeA") ON DELETE CASCADE;

ALTER TABLE "intervention" ADD FOREIGN KEY ("codeEquipe") REFERENCES "equipe" ("codeE");

ALTER TABLE "intervention" ADD FOREIGN KEY ("nomZone") REFERENCES "zone" ("nomZone");

ALTER TABLE "soignant" ADD FOREIGN KEY ("refS") REFERENCES "personnel" ("codeP") ON DELETE CASCADE;

ALTER TABLE "garde" ADD FOREIGN KEY ("codeP") REFERENCES "personnel" ("codeP") ON DELETE CASCADE;

ALTER TABLE "utilisateur" ADD FOREIGN KEY ("identifiant") REFERENCES "personnel" ("codeP") ON DELETE CASCADE;

ALTER TABLE "garde" ADD FOREIGN KEY ("codeE") REFERENCES "equipe" ("codeE");

ALTER TABLE "ressencement_A" ADD FOREIGN KEY ("animal") REFERENCES "animal" ("codeA") ON DELETE CASCADE;

ALTER TABLE "ressencement_A" ADD FOREIGN KEY ("zone") REFERENCES "zone" ("nomZone");

ALTER TABLE "ressencement_V" ADD FOREIGN KEY ("vegetal") REFERENCES "vegetal" ("codeV");

ALTER TABLE "ressencement_V" ADD FOREIGN KEY ("zone") REFERENCES "zone" ("nomZone");

ALTER TABLE "zone" ADD FOREIGN KEY ("responsable") REFERENCES "personnel" ("codeP") ON DELETE CASCADE;

CREATE OR REPLACE FUNCTION home_stats() RETURNS RECORD AS $$
DECLARE 
  count_a integer;
  count_p integer;
  count_s integer;
  count_v integer;
  ret RECORD;
BEGIN
  SELECT COUNT(*) FROM animal into count_a;
  SELECT COUNT(*) FROM personnel into count_p;
 SELECT COUNT(*) FROM soin WHERE "typeS"='Blessure_braconier' into count_s;
 SELECT COUNT(*) FROM vegetal into count_v;
 SELECT count_a, count_p, count_s, count_v into ret;
RETURN ret;
END;$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION afficher_soins(test boolean, codea int DEFAULT 0, refs int DEFAULT 0, nomzone Text DEFAULT '{}', types Text DEFAULT '{}' ) 
 RETURNS TABLE (
  "dateS" timestamp, 
  "codeA" int, 
  "typeS" typesoin, 
  "commentaireS" varchar, 
  "nomZone" varchar, 
  "especeA" varchar, 
  "specialite" varchar, 
  "nom" varchar 
  )
 AS $$
 DECLARE 
  req varchar;
BEGIN
    if (test) THEN 
    RETURN QUERY SELECT soin."dateS", soin."codeA", soin."typeS", soin."commentaireS", soin."nomZone", animal."especeA", soignant."specialite", personnel."nom" 
    FROM animal inner join soin on animal."codeA"=soin."codeA" inner join soignant on soin."refS"=soignant."refS", personnel 
    WHERE soignant."refS"=personnel."codeP";
    ELSE 
      req:='SELECT soin."dateS", soin."codeA", soin."typeS", soin."commentaireS", soin."nomZone", animal."especeA", soignant."specialite", personnel."nom" FROM animal inner join soin on animal."codeA"=soin."codeA" inner join soignant on soin."refS"=soignant."refS", personnel WHERE soin."codeA"='||codea||' AND soin."refS"='||refs|| ' AND soin."typeS"='||quote_literal(types)||'  AND soin."nomZone"='||quote_literal(nomzone)||' and soignant."refS"=personnel."codeP"';
    
     RETURN QUERY EXECUTE req;
     END IF;
END;$$ 
LANGUAGE plpgsql;





CREATE TABLE "associationA"(
 "classeA" varchar, 
 "familleA" varchar,
 "especeA" varchar PRIMARY KEY  NOT NULL
);



CREATE OR REPLACE FUNCTION verifyClasseA()
RETURNS trigger
As $$
DECLARE
classea varchar;
famillea varchar;
BEGIN
  SELECT "classeA" FROM "associationA" WHERE "associationA"."especeA" = new."especeA" into classea;
  SELECT "familleA" FROM "associationA" WHERE "associationA"."especeA" = new."especeA" into famillea;
  IF (new."classeA" = classea) AND (new."familleA" = famillea ) THEN
  ELSE 
    RAISE EXCEPTION 'Animal classe incohérente';
  END IF;
     RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER verifyClasseA
BEFORE INSERT OR UPDATE
ON animal
FOR EACH ROW
EXECUTE PROCEDURE verifyClasseA();

