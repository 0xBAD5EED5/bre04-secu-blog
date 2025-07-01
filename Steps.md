# Projet : Blog sécurisé

**License :** CC BY-NC-SA 4.0

---

## Étape 0 : GitHub

- Créez un repository GitHub public avec un `README` et appelez-le `bre04-secu-blog`.
- Clonez-le dans le dossier `sites/php` de votre IDE.

---

## Étape 1 : Les fichiers

- Vous trouverez les fichiers du projet dans l'archive `secu-blog.zip`.
- Parcourez ces fichiers, vous verrez qu'une partie des contenus vous sont déjà fournis.  
  👉 À vous de compléter le reste.

---

## Étape 2 : Base de données

- Sur **PhpMyAdmin**, créez une base de données nommée :  
  `prenomnom_secu_blog` (en `utf8_general_ci`)
- Importez-y les fichiers SQL que vous trouverez **dans l'ordre suivant** :
  1. `categories.sql`
  2. `users.sql`
  3. `posts.sql`
  4. `posts_categories.sql`
  5. `comments.sql`

---

## Étape 3 : Les Models

- Faites en sorte que vos **modèles soient conformes** à ce qui est présent dans votre base de données.
- Vous devrez utiliser la **composition** pour représenter les jointures.  
  *Exemple : un `Post` a, entre autres, une `Category` et un `User` en attribut.*
- La table `posts_categories` est une **table de liaison**, elle **n’a pas de modèle**.

---

## Étape 4 : Les Managers

- Vous devez créer les **managers** vous permettant de manipuler votre base de données.
- **Important :** vous devez obligatoirement **hydrater des instances de classes**.

### Méthodes minimales attendues :

#### `CategoryManager`
- `findAll()` : retourne toutes les catégories
- `findOne(int $id)` : retourne la catégorie correspondant à l'ID ou `null` si elle n'existe pas
- `findByPost(int $postId)` : retourne un tableau associatif des catégories liées au post correspondant

#### `PostManager`
- `findLatest()` : retourne les **4 derniers posts**
- `findOne(int $id)` : retourne le post correspondant à l'ID ou `null` s'il n'existe pas
- `findByCategory(int $categoryId)` : retourne les posts ayant cette catégorie

#### `CommentManager`
- `findByPost(int $postId)` : retourne les commentaires du post
- `create(Comment $comment)` : insère un commentaire dans la base de données

#### `UserManager`
- `findByEmail(string $email)` : retourne l'utilisateur correspondant ou `null` s'il n'existe pas
- `findOne(int $id)` : retourne l'utilisateur correspondant ou `null`
- `create(User $user)` : insère l'utilisateur dans la base de données

---

## Étape 5 : Les Controllers

- Utilisez vos **controllers** pour afficher le contenu des pages et gérer les formulaires.
- Vous devez **gérer les failles de sécurité** :
  - **CSRF** (Cross-Site Request Forgery)
  - **XSS** (Cross-Site Scripting)

---

## Sécurité

- **Mot de passe requis :**
  - Au moins **8 caractères**
  - Contient **une majuscule**
  - Contient **une minuscule**
  - Contient **un chiffre**
  - Contient **un caractère spécial**

- Utilisez une **expression régulière** pour valider cela.  
  👉 Conseil : demandez à une IA de la générer et de vous l'expliquer.

- Les mots de passe doivent être **chiffrés avec l’algorithme BCRYPT**.

---

### Ressources utiles

- Petit cours sur les **expressions régulières** et leur usage en PHP :  
  [https://elearning.3wa.fr/mod/page/view.php?id=44348](https://elearning.3wa.fr/mod/page/view.php?id=44348)