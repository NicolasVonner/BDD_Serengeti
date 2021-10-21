docker network create -d bridge my-net ( création d'un sous réseau)
docker run -d --name p1 --network my-net -e POSTGRES_PASSWORD=password postgres
//docker run -d --name p2 --network my-net -e POSTGRES_PASSWORD=password postgres
docker run -d --name p3 --network my-net -p 8080:80 -e POSTGRES_PASSWORD=password2 postgres
docker exec -it postgres-0 bash

------outils reseau-------------------
apt-get update
apt-get install iputils-ping (pinger les autres conteneurs)
apt-get install net-tools
---------------------------------------
root@a7e26d68ea8c:/# psql
[psql: error: connection to server on socket "/var/run/postgresql/.s.PGSQL.5432" failed: FATAL:
role "root" does not exist]
root@a7e26d68ea8c:/# psql --help
root@a7e26d68ea8c:/#psql -U postgres (rentrer dans postgres)
postgres=# \du (list of roles attributes)
postgres=# create database test;
postgres=# \l (List of databases)
postgres=# \c test( connect to database "test" as user "postgres")
postgres=# \d ???

#####################################################################################################################################
//---------------------Connection via un client psql-----------------------------------

[Installer  psql sur le client et s'arrurer que psql est diponible en console -> variables d'environnement]
psql -h localhost -p 5432 -U postgres( meme que la config serveur)
psql -h (@ip du serveur/ nome de la machine) -p 5432 -U postgres( meme que la config serveur)

//------------------------------------------------------------------------------------

####################################################################################################################################
Serveur web :

docker run --network my-net -d -p 8080:80 nginx
------outils reseau-------------------
apt-get update
apt-get install iputils-ping (pinger les autres conteneurs)
apt-get install net-tools
----------outils edition---------------
apt install gedit
apt-get install vim
apt-get install vim-full
---------------------------------------
apt-get install php
(regarder le fichier php.init pour voir si ;extension=php_pdo_pgsql.dll +> enlever le ; pour activer l'extention postgre)
php --version
/etc/php/7.3/apache2/php.ini
###Copier un fichier de l'hote vers le container ( se placer dans le docssier en question ou non, pas comme le point de montage)
docker cp .\index.php c18c9043e0e9:/var/www/html
### invers => container vers hote
docker cp container_id:/foo.txt foo.txt