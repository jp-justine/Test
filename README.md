# FONCTIONNEMENT DU PROJET DE RECRUTEMENT :

### CONSIGNES :

- L'utilisation de make est interdite !!
- Réaliser les exercices dans le sens que l'on veut mais, le projet doit pouvoir se lancer.
- Temps pour la réalisation des exercices : 1h


## Exercice 1 :

- Faire fonctionner le projet :

    - Faire un Fork du projet
    - Puis, un git clone
    - Lancer composer install.
    - Faire un yarn install
    - Puis yarn encore dev
    - Faire un symfony server:start ou un php -S 127.0.0.1:8000 -t public  

- Lancer ./bin/phpunit tests/Exercice1 pour voir si l'exercice est réussi

## Exercice 2 :

- Créer l'entité Product (Commande make autorisé pour cet exercice seulement)
- Ajouter les propriétés suivantes :

     - "name", type : string, length : 255, non nullable
     - "priceHt", type : float, non nullable
     - "creationDate", type : datetime, non nullable
     - "dateUpdate", type : datetime, nullable

- Mettre a jour le .env avec vos connection mysql sans en créer d'autre

- Lancer ./bin/phpunit tests/Exercice2 pour voir si l'exercice est réussi

## Exercice 3 :

- Créer le ProductController (Commande make interdite)
- Créer la méthode index avec l'url correspondante : /product
- Cette méthode doit comporter une requête visant à récupérer tous les produits
- Faire en sorte que la méthode aille vers le template déjà créé dans templates/product/index.html.twig
- Envoyer dans le template le resultat de la requête en nommant votre variable envoyée dans le front par : products
- Rajouter le lien vers la page produit dans le header

- Lancer ./bin/phpunit tests/Exercice2 pour voir si l'exercice est réussi

