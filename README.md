# Le Flamant Bleu API
## Installation en local
Les étapes pour une installation en local, si vous avez docker à disposition, passé directement à la section suivante.

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
sudo docker compose run --rm api composer install 

# Fresh migrate + seeding
# FR: Migrer et remplir la base de données
sudo docker compose run --rm api php artisan migrate:fresh --seed 

# Generate key
# FR: Generation de la clé
sudo docker compose run --rm api php artisan key:generate 

# Launch containers
# FR: Lancer les containers
sudo docker compose up -d 

```
## le fichier .env

Reprendre [.env.exemple](https://github.com/AezardSR/Le_Flamant_Bleu_API/blob/73b6f0feea8842396ed4571604e9284ae61e11d6/.env.example#L55)

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
php artisan key:generate
```

### JWT token

```bash
    php artisan jwt:generate
```

# SWAGGER 

Commande pour generer le changement pour la doc swagger

```bash
    docker-compose run api php artisan l5-swagger:generate
```

