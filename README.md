Voici un contenu prêt à copier‐coller dans ton `README.md` :

# Recherche d’emploi – Suivi, relances et rapports en un seul outil

**Recherche d’emploi** est une application tout-en-un pour :

- centraliser le suivi de toutes tes candidatures ;
- envoyer automatiquement des relances aux recruteurs ;
- agréger chaque jour les offres pertinentes depuis APEC, Indeed, LinkedIn, etc. ;
- générer en un clic un PDF de justificatif conforme aux exigences France Travail.

Consulte la vision produit complète pour comprendre le « pourquoi » et les objectifs : [VISION.md](./VISION.md).

---

## Démarrage rapide (stack Docker Compose)

> Prérequis : Docker 24 + GNU Make installés sur votre machine (Docker Desktop + WSL 2 sous Windows 11).

Copiez-collez **l’intégralité** du bloc ci-dessous dans votre terminal – tout sera prêt en une seule exécution :

# 1· Cloner le dépôt et entrer dans le dossier
```bash
git clone https://github.com/<organisation>/recherche-emploi.git
cd recherche-emploi
```
# 2· Copier les variables d'environnement par défaut (à faire une seule fois)
```bash
cp .env.dist .env
```
# 3· Démarrer la stack conteneurisée (PHP-FPM 8.3, Nginx 1.27, MySQL 8.4)
```bash
make up
```

# 4· Ouvrir l'application dans le navigateur
#    (la page d’accueil Symfony affichera HTTP 200 dès que le code sera installé)
xdg-open http://localhost:8000 2>/dev/null || open http://localhost:8000 || start http://localhost:8000


## Exécution des tests

Le projet utilise **PHPUnit** via le bridge Symfony.  
La base de tests est une **SQLite en mémoire** : aucune dépendance
supplémentaire n’est nécessaire.

```bash
# Lancer l’ensemble de la suite
make test      # alias de : APP_ENV=test docker compose exec -w /var/www/app php vendor/bin/simple-phpunit -v
```

## Statut

Projet en développement : dépôts, CI et fondations sont en place : [Definition of Done](./docs/DoD.md). Les premières fonctionnalités arrivent bientôt.

## Licence

Code sous licence MIT – voir `LICENSE` pour les détails.

