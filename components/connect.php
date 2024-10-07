<?php
$dsn = 'mysql:host=localhost;dbname=opeeci;charset=utf8';
$username = 'root';
$password = '';

try {
    // Établir la connexion à la base de données
    $conn = new PDO($dsn, $username, $password);
    // Définir le mode d'erreur PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}

// Récupérer les informations de la section "Quelques faits"
$select_faits = $conn->prepare("SELECT * FROM fait"); // Ajuste la requête en fonction de tes besoins
$select_faits->execute();
$faits = $select_faits->fetchAll(PDO::FETCH_ASSOC);

// Préparer et exécuter les requêtes pour récupérer les différentes sections
$select_activites = $conn->prepare("SELECT id, titre, description, image, lien FROM activite ORDER BY id");
$select_activites->execute();
$activites = $select_activites->fetchAll(PDO::FETCH_ASSOC);

$select_profile = $conn->prepare("SELECT texte, type FROM flash_info ORDER BY cree_le DESC");
$select_profile->execute();
$messages = $select_profile->fetchAll(PDO::FETCH_ASSOC); // Récupérer les messages

$select_temoin = $conn->prepare("SELECT * FROM temoignages");
$select_temoin->execute();
$temoignages = $select_temoin->fetchAll(PDO::FETCH_ASSOC);

$select_a_propos = $conn->prepare("SELECT * FROM a_propos LIMIT 1");
$select_a_propos->execute();
$a_propos = $select_a_propos->fetch(PDO::FETCH_ASSOC);

$select_equipe = $conn->prepare("SELECT * FROM equipe");
$select_equipe->execute();
$equipe = $select_equipe->fetchAll(PDO::FETCH_ASSOC);

$select_adhesions = $conn->prepare("SELECT * FROM adhesion");
$select_adhesions->execute();
$adhesions = $select_adhesions->fetchAll(PDO::FETCH_ASSOC);

$select_contact = $conn->prepare("SELECT * FROM contact WHERE id = 1"); // Assurez-vous que vous avez une entrée avec ID 1
$select_contact->execute();
$contact = $select_contact->fetch(PDO::FETCH_ASSOC);

$select_objectifs = $conn->prepare("SELECT * FROM objectifs ORDER BY ordre ASC");
$select_objectifs->execute();
$objectifs = $select_objectifs->fetchAll(PDO::FETCH_ASSOC);

$select_carrousel = $conn->prepare("SELECT * FROM carrousel ORDER BY ordre ASC");
$select_carrousel->execute();
$carrousels = $select_carrousel->fetchAll(PDO::FETCH_ASSOC);

$select_sections = $conn->prepare("SELECT * FROM sections");
$select_sections->execute();
$sections = $select_sections->fetchAll(PDO::FETCH_ASSOC); // Corrigé ici pour récupérer les sections

// Gestion de l'envoi de messages
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    // Préparer la requête d'insertion
    $insert_message = $conn->prepare("INSERT INTO messages (nom, email, telephone, sujet, message) VALUES (?, ?, ?, ?, ?)");
    $insert_message->execute([$nom, $email, $telephone, $sujet, $message]);

    // Redirection ou message de succès
    echo "<script>alert('Votre message a été envoyé avec succès !');</script>";
}

// Vérification si une requête de recherche a été soumise
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    
    // Préparer la requête SQL pour rechercher les sections
    $select_sections = $conn->prepare("SELECT * FROM sections WHERE nom LIKE ? OR responsable LIKE ?");
    $searchTerm = '%' . $query . '%'; // Utilisation des jokers pour une recherche partielle
    $select_sections->execute([$searchTerm, $searchTerm]);
    
    // Récupérer les résultats de la recherche
    $sections = $select_sections->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sections = []; // Si aucune requête n'est soumise, initialisez un tableau vide
}
?>
