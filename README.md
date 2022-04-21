# Hypnos
Entreprise d'hôtellerie

Comment faire fonctionner le site en local:

Premièrement téléchargé et installer wamp https://www.wampserver.com/.
Une fois fait l'ajouter au path du système.

Ensuite:
Générer la base de données contenant déjà: des réservations, des users, un admin, deux gérants et des hotels.
Pour la génération de la base de données:
J'ai personnelement utilisé les commandes disponibles dans la fichier "commandes_sql.txt" disponible à la racine du dossier du site documentation sur le site officiel sql.sh .
Cependant, j'ai également génerer un fichier sql permettant d'importer cette base de données, pour le confort du prochain utilisateur.

Pour la connexion du site vers le serveur local, elle est déjà prévu, comme peut le démontrer le fichier "connect.php".
Si une connexion est voulu lors de la publication du site, cette dernière est possible en changeant simplement les données de connexion dans le fichier "connect.php";

Autres précision: le dossier racine du site est à placé dans le dossier "wamp64/www" qui s'est créer lors de l'installation de wamp.

Infos de connexion:

Administrateur:
- login: admin@hypnos.com
- mdp: motdepasse

Gérant:
- login: gerant1@hypnos.com
- mdp: motdepasse

Utilisateur existant:
- login: mail@test.com
- mdp: aze