# Class Database et App 

Classe permettant la connexion à une base de données facilement.

### **1- Récuperer le dépot (bah ouais :D )**
### **2- Dans votre fichier index.php qui gérera votre architecture du site, ajouter :**

    use App\Autoloader;
    require 'class/Autoloader.php';
    Autoloader::register();

    Cela chargera l'autoloader qui par la suite gérera vos classe

### **3- Ensuite dans le fichier qui traitera vos données envoyé par le formulaire, ajouter en haut du fichier :**

    use App\App;
    use App\Database;

    Cela va specifier au fichier qu'on va utiliser les class App et Database (pour se connecté à la bdd et utiliser les fonctions pour effectuer nos requetes)

### **4- Modifiez les constante dans la class App.php pour y mettre vos informations de base de données exemple :**

    const DB_NAME = "nom de votre base de données";
    const DB_USER = "username de votre base de données";
    const DB_PASS = "mot de passe de la base de données";
    const DB_HOST = "port de la base de données";

    /!\ Ne mettez pas d'espaces dans vos chaines de caractères /!\

### **5- Pour initialiser la connexion à la base de données il suffit d'utiliser la fonction App::getDb() par exemple:**

    $db = App::getDb();

### **6- Pour effectuer une requete pour voir toutes les données dans votre table il suffit d'utiliser la fonction "query()" de la class Database et faire comme ceci :**

    $db = App::getDb(); //on initialise la connexion à la bdd
    $requete = "SELECT * FROM votre_table"; //on créer notre requete SQL
    $execution = $db->query($requete); // on execute notre requetes SQL

    cela vous retournera toutes les données pour votre table

### **7- Pour effectuer une requete pour insérer vos données il suffit d'utiliser la fonction "runQuery()" de la class Database et de faire comme ceci :**

    $db = App::getDb(); //on initialise la connexion à la bdd
    $requete = "INSERT INTO votre_table(colonne, colonne, colonne) VALUES (value, value, value)"; //on créer notre requete SQL
    $execution = $db->runQuery($requete); // on execute notre requetes SQL

    cela effectuera une insertion de vos données dans la Base de données

