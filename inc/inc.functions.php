<?php
    // On initialise la session avec "session_start" afin de pouvoir récupérer les informations présentes
    // à l'intérieur
    session_start();

    // On définit les différentes constantes et on leur donne une valeur par défaut.
    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json');

    // Cette fonction a pour objectif de connecter l'utilisateur si il rentre les identifiants attendus
    function connectUser($login = null, $password = null){
        // La première boucle if va vérifier que les informations mises par l'utilisateur ne sont pas nuls
        if(!is_null($login) && !is_null($password)){
            // Dans le cadre ou les informations mises par l'utilisateurs correspondent à les informations attendus
            // alors, on return
            if($login === LOGIN && $password === PASSWORD){
                return array(
                    'login'    => LOGIN,
                    'password' => PASSWORD
                );
            }
        }
        return null;
    }

    // On déconnecte l'utilisateur en détruisant la variable de session user, puis en détruisant la session avec session_destroy
    function setDisconnectUser(){
         unset($_SESSION['User']);
         session_destroy();
    }

    // On vérifie que l'utilisateur est connecté avec le mot clé array_key_exist. La fonction vérifie que la valeur de session
    // User existe, qu'elle n'est pas = null et qu'elle n'est pas vide. Si c'est le cas, return true, sinon, return false.
    function isConnected(){
        if(array_key_exists('User', $_SESSION) 
                && !is_null($_SESSION['User'])
                    && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    // Cette fonction sert à charger la bonne page du dossier "pages", et si la page demandée n'existe pas, il met l'accueil à la place
    function getPageTemplate($page = null){
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            include TL_ROOT.'/pages/index.php';
        }else{
            include $fichier;
        }
    }

    // Cette fonction va vérifier que l'article existe et si c'est le cas, il va aller chercher le contenu de celui-ci, le décoder et le retourner
    // Dans le cas ou l'article n'existe pas, il renvoie "null".
    function getArticlesFromJson(){
        if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            return json_decode($contenu_json, true);
        }

        return null;
    }

    // Cette fonction va dans un premier temps vérifier que le fichier de stockage des articles existe avec "file_exists",
    // puis va récupérer son contenu, le décoder, et parcourir chaque article pour retourner celui dont l'identifiant correspond exactement
    // à l'$id_article fourni en argument.
    // Si aucun article ne correspond, la fonction ne retourne rien (null).
    function getArticleById($id_article = null){
       if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            $_articles    = json_decode($contenu_json, true);

            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
