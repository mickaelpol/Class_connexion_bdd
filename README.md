# Class Database et App 

Classe permettant la connexion à une base de données facilement.

1- Récuperer le dépot  
2- Pour utiliser la class il suffit de rajouter dans le fichier qui va traiter vos datas :

    require "class/App.php";
    require "class/Database.php";
    use App\App;
    use App\Database;

3- Modifiez les constante dans la class App.php pour y mettre vos informations de base de données exemple :

    const DB_NAME = "nom_de_votre_bdd";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_HOST = "localhost";

4- Pour finir il suffit d'utiliser la fonction App::getDb() pour se connecter à la bdd par exemple:

    $db = App::getDb(); (initialise la connexion a la bdd)

5- Pour effectuer une requete pour voir toutes les entrés dans votre table il suffit d'utiliser la fonction "query()" donc faire comme ceci :

    $db = App::getDb();
    $requete = "SELECT * FROM votre_table";
    $execution = $db->query($requete);

    cela vous retournera toutes les entrés pour votre table

-6 Pour effectuer une requete pour insérer vos données il suffit d'utiliser la fonction "runQuery()" et de faire comme ceci :

    $db = App::getDb(); 
    $requete = "INSERT INTO votre_table(colonne, colonne, colonne) VALUES (value, value, value)";
    $execution = $db->runQuery($requete);

    cela effectuera une insertion de vos données dans la Base de données

