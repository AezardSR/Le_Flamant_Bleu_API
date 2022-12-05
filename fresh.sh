#!/bin/sh

# Stop and delete all containers
# FR: Arrete et supprime tous les containers
sudo docker compose down 

# Install php dependencies
# FR: Installer les dépendances php
sudo docker compose run api composer install 

# Fresh migrate + seeding
# FR: Migrer et remplir la base de données
sudo docker compose run api php artisan migrate:fresh --seed 

# Generate key
# FR: Generation de la clé
sudo docker compose run api php artisan key:generate 

# Launch containers
# FR: Lancer les containers
sudo docker compose up -d 


