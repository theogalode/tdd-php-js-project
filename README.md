# Approche TDD

## Setup

1. Installer wamp ou xamp. (Mettre php 8.2)

2. Cloner le projet dans le dossier www + créer un virtualhost qui pointe vers ce dossier.

3. Avoir une bdd qui se nomme tddproject. (Utiliser phpmyadmin).

4. Initialiser les tables suivantes:
  - user: <br>
    -> **id** <br>
    -> **username** <br>
    
  - message: <br>
    -> **id** int primary key <br>
    -> **subject** string <br>
    -> **content** string <br>
    -> **userId** int foreignKey(user.id) <br>
    -> **createdAt** DATETIME <br>
    -> **updatedAt** DATETIME <br>
    
5. Aller à la racine du projet avec un terminal puis exécuter les commandes suivantes: 
  - ```composer install``` <br>
  - ```npm install``` <br>

6. Pour lancer les tests éxecuter les commandes suivantes :
  - Pour le code php avec PhpUnit ```./vendor/bin/phpunit``` <br>
  - Pour le code js avec Jest ```npm jest```
