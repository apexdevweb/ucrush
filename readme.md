###### ↓↓↓↓Architectural-Fortress↓↓↓↓ ######
_____________________________________________________________________________
_____________________________________________________________________________
### COMBO: MVC + PROCEDURE STOCKEE + VUES RELATIONELLES + BTF
↓↓                                                          ↓↓                                    
|
|------>Architecture extrêmement robuste, souvent utilisée dans les applications bancaires ou de haute sécurité.
|------>Sécurité renforcée (Défense en profondeur)

#### Architecture M.V.C(model view controller)
↓↓                                           ↓↓ 
|
|-->Le Modèle (M): C'est le seul qui parle à la base de données (SignupManager). Il ne sait pas à quoi ressemble votre site, il gère juste la donnée.
|-->La Vue (V): C'est votre HTML/CSS. Elle ne sait pas que la base de données existe, elle se contente d'afficher les variables qu'on lui donne.
|-->Le Contrôleur (C): C'est le chef d'orchestre. Il reçoit la requête, demande au Modèle de vérifier les infos, puis décide quelle Vue afficher.
|
|------>Séparation des responsabilités
|------>Facilité de maintenance et d'évolution


#### Procedures stockées
↓↓                     ↓↓ 
|
|------>Performance et Centralisation
|------>Pré-compilation
|------>Moins de trafic réseau
|------>Protection contre les injections SQL

#### Vues relationelles
↓↓                    ↓↓ 
|
|------>Sécurité et Masquage des Données
       |________________________________→ La vue permet de restreindre l'accès à certaines colonnes sensibles.
|------>Simplification des Requêtes Complexes
       |_____________________________________→ Au lieu de faire des JOIN complexes en PHP, vous appelez simplement la vue.
|------>Centralisation de la Logique Métier 
       |___________________________________→ Tous vos scripts PHP (Profil, Admin, Recherche) bénéficieront de la modification        automatiquement sans que vous ayez à retoucher à votre code source.
#### B.T.F(Backend To Frontend)
↓↓                           ↓↓ 
|
|------>Immunité aux modifications accidentelles
       |________________________________→ Une const (constante) ne peut pas être changée pendant l'exécution du script. Si tu essaies de la modifier, PHP génère une erreur.

|------>Sécurité Anti-Défaçage
       |_____________________________________→ Même si un attaquant trouve une faille pour modifier un petit morceau de HTML en cache, ton "vrai" texte reste protégé dans tes fichiers PHP côté serveur.

|------>Zéro "Hard-Coding" 
       |___________________________________→ Ton HTML devient une structure pure. C'est beaucoup plus facile pour un designer de travailler sur le CSS sans risquer d'effacer une phrase importante.

|------>Constantes avec la norme PSR-1