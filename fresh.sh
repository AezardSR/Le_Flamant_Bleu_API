#!/bin/sh

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
sudo docker compose run --rm laraval php artisan key:generate 

# Launch containers
# FR: Lancer les containers
sudo docker compose up -d 


