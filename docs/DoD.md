# Definition of Done

Une tâche (issue) est *vraiment* terminée lorsqu’elle respecte **tous** les points ci-dessous :

## 1. Qualité du code
- Tests unitaires et d’intégration passent en CI (couverture ≥ 80 %).  
- PHPStan / Psalm au niveau maximal sans erreurs.  
- Style conforme à ECS ou PHP-CS-Fixer (`make lint` vert).  

## 2. Fonctionnelle
- Les critères d’acceptation décrits dans l’issue sont satisfaits.  
- Aucune régression détectée sur les parcours existants (tests ou review manuelle).  

## 3. Documentation
- README, guides d’usage ou ADR mis à jour si nécessaire.  
- Toute nouvelle variable d’environnement ajoutée à `.env.dist` avec commentaire.  

## 4. Déploiement & exécution
- L’application démarre en local via `make up` sans erreur.  
- Le pipeline CI GitHub Actions est au vert sur la branche de la PR.  

## 5. Gestion de dépôt
- La branche de travail est fusionnée via Pull Request portant le préfixe
  `feat:` / `fix:` / `chore:` selon la convention de commits.  
- La PR référence l’issue correspondante et la ferme automatiquement (`Closes #123`).  
- Les labels appropriés sont appliqués (ex. `feature`, `p0`).  
- Aucun secret, clé API ou fichier généré ne figure dans le commit.  

## 6. Validation finale
- La carte passe automatiquement au statut **Done** dans le Project.  

> Relis cette liste avant de passer une issue en revue : si un seul point manque, elle n’est pas *Done*.
