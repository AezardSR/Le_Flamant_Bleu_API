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
## JWT token

```bash
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class"
```

```bash
    php artisan jwt:generate
```

## SWAGGER 

Commande pour generer le changement pour la doc swagger
```bash
    docker-compose run api php artisan l5-swagger:generate
```


