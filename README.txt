Blog php en poo

un blog réalisé comme projet de fin d'année (Php/Poo) pendant mes études de développeur web. il n'est pas totalement fini, mais il dispose d'une base solid.
Autoloader
Formulaire (poo)
MVC (Router)
wysiwyg
Forum (topic, comment)
Gestion upload
Connexion

# Arboressence 

## app
Contient le "coeur" de notre application, càd toutes les classes nécessaire au bon fonctionnement de notre MVC

## public
Contient tous les fichiers "visibles" depuis le navigateur, accessible côté client

## src
Contient le code "source" de notre application càd toute la logique spécifique

## templates
Contient toutes les vues, càd tous le code HTML

# Process du MVC

1. Requête HTTP depuis le NAVIGATEUR
2. On interprête la requête pour appeller le bon CONTROLEUR
3. Le CONTROLEUR execute la bonne ACTION
4. L'ACTION interroge la BDD via le bon MANAGER
5. Le MANAGER renvoit les données dans l'ACTION
6. L'ACTION transmet les données à la VUE
7. La VUE affiche le rendu HTML depuis le NAVIGATEUR

# Règles à respecter

1. Une classe doit être définie dans un fichier du même nom : HomeController est définie dans le fichier HomeController.php

ATTENTION : un controleur doit toujours être nommé de cette façon : [Contexte]Controller ou Contexte représente le contexte de l'action que l'on souhaite exécuter.
Exemple : BlogController représente tout le contexte lié à un Blog (affichage des articles, affichage d'un article en particulier, post de commentaire, etc...)



Un grand MERCI à tous ceux qui m'ont permis d'apprendre les différentes méthodes utilisées pour ce projet :
Jonathan Boyer (Grafikart.fr)
nouvelle-Techno.fr
Openclassrooms.com
Gamory sensei (ifa)
Quirin sama (ifa)
