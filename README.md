# Le Flamant Bleu

Projet étudiant de groupe dans le cadre du diplôme Concepteur développeur d'application, les diffétents repo sont : 

[Le_Flamant_Bleu_Desktop](https://github.com/AezardSR/Le_Flamant_Bleu_Desktop)

[Le_Flamant_Bleu_API](https://github.com/AezardSR/Le_Flamant_Bleu_API)

[Le_Flamant_Bleu](https://github.com/AezardSR/Le_Flamant_Bleu)

[Le_flamant_bleu_mobile](https://github.com/AezardSR/Le_flamant_bleu_mobile)

[Maquette Figma](https://www.figma.com/file/kva3zi6Y3C5MYt3lMt98pi/Maquette-graphique)

[Drive du projet](https://drive.google.com/drive/folders/1hYF2iZViqM8UmmsodYR9z_5P_a-iQIlf)

# Le Flamant Bleu API
## Installation en local
Les étapes pour une installation en local.Si vous disposez de Docker, vous pouvez passer directement à la section suivante 

```bash
composer install 
```
```bash
php artisan migrate:fresh --seed  
```
```bash
php artisan jwt:generate
```
```bash
php artisan key:generate 
```

## Installation et configuration avec Docker

```bash
./fresh.sh
```
en cas de dysfonctionnement, réalisé les commande suivante dans l'ordre :

```bash
# Stop and delete all containers
# FR: Arrete et supprime tous les containers
sudo docker compose down 

# Install php dependencies
# FR: Installer les dépendances php
sudo docker compose run --rm laravel composer install 

# Launch containers
# FR: Lancer les containers
sudo docker compose up -d 

# Fresh migrate + seeding
# FR: Migrer et remplir la base de données
sudo docker compose run --rm laravel php artisan migrate:fresh --seed 

# Generate key
# FR: Generation de la clé
sudo docker compose run --rm laravel php artisan key:generate 

# Launch containers
# FR: Lancer les containers
sudo docker compose up -d 

```
## le fichier .env

Reprendre [.env.exemple](https://github.com/AezardSR/Le_Flamant_Bleu_API/blob/dev/.env.example)

```env
APP_NAME : le nom de votre application Laravel

APP_ENV : l'environnement de votre application, peut être "local", "testing" ou "production"

APP_KEY : une clé de chiffrement pour votre application, générée automatiquement lors de la création de votre application Laravel

APP_DEBUG : un booléen pour activer ou désactiver le mode de débogage

APP_URL : l'URL de votre application Laravel

DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD : les informations de connexion à votre base de données MySQL

MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION, MAIL_FROM_ADDRESS, MAIL_FROM_NAME : les informations de connexion à votre service de messagerie

JWT_SECRET : la clé secrète pour votre JWT

L5_SWAGGER_CONST_HOST : l'URL de base pour l'API de votre application Laravel pour la documentation Swagger
```
### APP_KEY

```bash
docker compose run laravel php artisan key:generate
```

### JWT token

```bash
docker compose run laravel php artisan jwt:generate
```

## SWAGGER 

Commande pour generer le changement pour la doc swagger

```bash
docker compose run laravel php artisan l5-swagger:generate
```
### Compte ADMIN par défaut :
```bash
admin@test.fr
FlamantBleu00!
```
