# Addons wecrea

Addons est un projet interne wecrea permettant de télécharger des modules pour Prestashop et Wordpress / woocommerce.

## Installation en local

Créez le fichier .env en vous basant sur le .env.example

Lancez la commande `php composer install` pour installer les dépendances PHP

Assurez vous d'avoir créé un alias pour utiliser Sail de Laravel. Pour cela, lancer la commande `sail` et voyez si l'aide de Sail apparait ou si c'est un message "sail: command not found". Dans le second cas, installez l'alias dans votre zshrc ou utilisez `./vendor/bin/sail` pour la suite.

Lancez maintenant la commande `npm install` pour installer les dépendances liées à VueJS.

Vous pouvez désormais lancer le projet en local via la commande `sail up -d && npm run dev`
