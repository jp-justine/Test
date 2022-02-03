<h1 style="text-transform: uppercase">Fonctionnement du projet de recrutement :</h1>

<div class="accordion" id="accordion">
<div class="card">
<div class="card-header" id="headingOne">
  <h2 class="mb-0">
      <button class="btn btn-link btn-block text-left"
              type="button"
              data-toggle="collapse"
              data-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
      >
          Consignes :
      </button>
  </h2>
</div>

<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
<div class="card-body">
    <ol class="text-justify">
        <li>
            L'utilisation de make est <span class="red">interdite !</span>
        </li>
        <li>
            Réaliser les exercices dans le sens que l'on veut mais, <span class="red">le projet doit pouvoir se lancer.</span>
        </li>
        <li>
            Temps pour la réalisation des exercices : <span class="red">1h!</span>
        </li>
        <li>
            Bien lire <span class="red">tout l'énoncé</span> d'un exercice <span class="red">avant de commencer</span> à coder.
        </li>
        <li>
            Toutes les consignes <span class="red">ne sont pas testées</span>, faites attention nous regarderons vos codes ensuite.
        </li>
        <li>
            L'objectif final est de posséder un site <span class="red">100% fonctionnel.</span>
        </li>
        <li>
            Un <span class="red">commit initial</span> est demandé puis, un <span class="red">commit à la fin de chaque exercice</span> et enfin, un <span class="red">commit final</span>.
        </li>
    </ol>
</div>
</div>

<div class="card">
<div class="card-header" id="headingTwo">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
        >
            Exercice 1 :
        </button>
    </h2>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
            <li>Faire un <span class="red">Fork</span> du projet</li>
            <li> Puis, un <span class="red">git clone</span></li>
            <li> Puis, <span class="red">changer le remote url</span> . Le push directement sur la branche distante peut être <span class="red">éliminatoire</span>. Car semblable à une mise en down d'un site.</li>
            <li> Lancer <span class="red">composer install</span>.</li>
            <li> Faire un <span class="red">yarn install</span></li>
            <li> Puis <span class="red">yarn encore dev</span></li>
            <li> Faire un <span class="red">symfony server:start</span> ou un <span class="red">php -S 127.0.0.1:8000 -t public</span></li>
            <li> Lancer <span class="red">/bin/phpunit tests/Exercice1</span> pour voir si l'exercice est réussi</li>
        </ol>
    </div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingThree">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
        >
            Exercice 2 :
        </button>
    </h2>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
      <li> Créer <span class="red">l'entité Product</span> (Commande make <span class="red">autorisée</span> pour cet exercice seulement)</li>
      <li> Ajouter les <span class="red">propriétés</span> suivantes :</li>
        <ol>
          <li><span class="red">"name"</span>, type : string, length : 255, non nullable</li>
          <li><span class="red">"priceHt"</span>, type : float, non nullable</li>
          <li><span class="red">"creationDate"</span>, type : datetime, non nullable</li>
          <li><span class="red">"dateUpdate"</span>, type : datetime, nullable</li>
        </ol>
      <li> Mettre a jour le <span class="red">.env</span> avec vos connections mysql sans en créer d'autre</li>
      <li> Lancer <span class="red">./bin/phpunit tests/Exercice2</span> pour voir si l'exercice est réussi</li>
      </ol>
    </div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingFour">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseFour"
                aria-expanded="false"
                aria-controls="collapseFour"
        >
            Exercice 3 :
        </button>
    </h2>
</div>
<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
          <li> Créer le <span class="red">ProductController</span> (Commande <span class="red">make interdite</span>)</li>
          <li> Créer la <span class="red">méthode index</span> avec l'url correspondante : <span class="red">/product</span></li>
          <li> Cette méthode doit comporter une<span class="red"> requête visant à récupérer tous les produits</span></li>
          <li> Faire en sorte que la méthode aille vers le template <span class="red">déjà créé dans <span class="red">templates/product/index.html.twig</span></li>
          <li> Envoyer dans le template le résultat de la requête en nommant votre <span class="red">variable envoyée vers le front</span> par : <span class="red">products</span></li>
          <li> <span class="red">Rajouter le lien</span> vers la page produit dans le <span class="red">header</span></li>
          <li> Lancer <span class="red">./bin/phpunit tests/Exercice3</span> pour voir si l'exercice est réussi</li>
        </ol>
    </div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingFive">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseFive"
                aria-expanded="false"
                aria-controls="collapseFive"
        >
            Exercice 4 :
        </button>
    </h2>
</div>

<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
    <div class="card-body">
    <ol class="text-justify">
      <li>Créer la <span class="red">méthode new</span> dans le ProductController</li>
      <li>L'url de cette méthode doit être <span class="red">/product/new</span></li>
      <li>Faire le rendu sur le template situé dans <span class="red">/templates/product/new.html.twig</span></li>
          <ol>
            <li>Créer le <span class="red">FormType ProductType</span> qui permettra d'ajouter un nouveau produit <span class="red">(sans le maker)</span></li>
            <li>Faire attention à bien <span class="red">prendre en compte les propriétés de l'entité Product</span> pour construire le formulaire</li>
            <li><span class="red">Ne pas</span> ajouter les champs <span class="red">dateCreation</span> et <span class="red">dateUpdate</span></li>
            <li>Les champs doivent avoir <span class="red">un label</span> et <span class="red">un placeholder obligatoirement</span></li>
            <li>Le champs <span class="red">creationDate doit être rempli par le serveur</span> lors de la soumission du formulaire et non par l'utilisateur</li>
            <li>Le champs <span class="red">dateUpdate ne doit pas</span> être rempli</li>
            <li>Le <span class="red">bouton de soumission</span> doit avoir inscrit comme <span class="red">label : "Ajouter"</span></li>
      </ol>
      <li>A la soumission du formulaire, il faut que <span class="red">l'entité soit bien enregistrée en base de donnée</span></li>
      <li>A la soumission du formulaire, il faut <span class="red">rediriger l'utilisateur</span> vers la route dont l'url est /product</li>
      <li>Le formulaire doit être construit dans le fichier existant : <span class="red">/templates/product/include/_form.html.twig</span></li>
      <li>Lancer <span class="red">./bin/phpunit tests/Exercice4</span> pour voir si l'exercice est réussi</li>
      </ol>
    </div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingSix">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseSix"
                aria-expanded="false"
                aria-controls="collapseSix"
        >
            Exercice 5 :
        </button>
    </h2>
</div>
<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
            <li>Créer la <span class="red">méthode edit</span> dans le ProductController</li>
            <li>L'url de cette méthode doit être <span class="red">/product/edit/{id}</span></li>
            <li>Faire le rendu sur le template <span class="red">/templates/product/edit.html.twig</span></li>
            <li>Utiliser le ProductType dans cette méthode</li>
            <li>Les <span class="red">informations du produit doivent bien être visible</span> dans les champs correspondants</li>
            <li>Le champs <span class="red">creationDate ne doit pas être modifié</span></li>
            <li>Le champs <span class="red">dateUpdate doit être rempli par le serveur</span> lors de la soumission du formulaire</li>
            <li>A la soumission du formulaire, il faut que <span class="red">l'entité soit bien modifiée</span></li>
            <li>A la soumission du formulaire, il faut <span class="red">rediriger l'utilisateur</span> vers la route dont l'url est /product</li>
            <li>Mettre à jour le template <span class="red">templates/product/index.html.twig</span> pour que le <span class="red">lien éditer fonctionne</span></li>
            <li>Lancer <span class="red">./bin/phpunit tests/Exercice5</span> pour voir si l'exercice est réussi. Moins de choses sont testées sur cette partie. Vous devez vous faire confiance</li>
        </ol>
    </div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingSeven">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseSeven"
                aria-expanded="false"
                aria-controls="collapseSeven"
        >
            Exercice 6 :
        </button>
    </h2>
</div>
<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
            <li>Créer la <span class="red">méthode delete</span> dans le ProductController</li>
            <li>L'url de cette méthode doit être <span class="red">/product/delete/{id}</span></li>
            <li>Il faut qu'en cliquant, <span class="red">l'entité soit supprimée</span> en base de donnée</li>
            <li>L'utilisateur <span class="red">doit revenir sur la page</span> /product et l'entrée en base de donnée doit être supprimée</li>
            <li>Mettre à jour le template <span class="red">templates/product/index.html.twig</span> pour que le lien supprimer fonctionne</li>
            <li><span class="red">Aucun test n'existe</span> pour cette partie, à vous de vous faire confiance</li>
        </ol>
    </div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingHeight">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseHeight"
                aria-expanded="false"
                aria-controls="collapseHeight"
        >
            Exercice 7 :
        </button>
    </h2>
</div>
<div id="collapseHeight" class="collapse" aria-labelledby="headingHeight" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
            <li><span class="red">Remplacer la requête</span> de récupération de tous les produits situés dans l'<span class="red">index</span> du ProductController par un <span class="red">queryBuilder</span> qui permet la récupération de <span class="red">tous les produits sans dateUpdate</span>.</li>
            <li>La requête doit etre placée <span class="red">au bon endroit</span> et <span class="red">remplacer</span> l'ancienne.</li>
            <li>Elle doit <span class="red">abolument</span> être faites en DQL <span class="red">(Query Builder)</span></li>
            <li><span class="red">Aucun test</span> ne permet de vérifier le résultat, faites vous confiance</li>
        </ol>
    </div>
</div>
</div>

<div class="card">
<div class="card-header" id="headingNine">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseNine"
                aria-expanded="false"
                aria-controls="collapseNine"
        >
            Algorithmes :
        </button>
    </h2>
</div>
<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
            <li>Aller dans le <span class="red">lien algorithme</span> et suivez les consignes</li>
            <li><span class="red">Résoudre</span> les algorithmes demandés</li>
        </ol>
    </div>
</div>
</div>
</div>
</div>