<?php
// Inclure le fichier de connexion à la base de données
include('components/connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Résultats de Recherche - OPEECI</title>
    <meta content="association, parents d'élèves, étudiants, Côte d'Ivoire" name="keywords">
    <meta content="Site officiel de l'OPEECI, l'Association des Parents d'Élèves et Étudiants de Côte d'Ivoire" name="description">
    <!-- Favicon -->
    <link href="img/opeeci.jpg" rel="icon" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Start -->
    <!-- ... Votre code pour la barre de navigation ... -->

     <!-- Spinner Start -->
     <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
    <!-- Spinner End -->
<!-- Navbar Start -->
<?php include('components/navbar.php'); ?>
    <!-- Navbar End -->
<!-- Début du Flash Info -->
<div class="news-ticker bg-light py-2">
        <div class="container d-flex align-items-center">
            <div class="ticker-title text-white bg-success px-3 py-1 me-3">FLASH INFO</div>
            <marquee class="ticker-content d-flex align-items-center" behanor="scroll" direction="left" scrollamount="6">
                <?php foreach ($messages as $message): ?>
                    <span class="text-<?php echo htmlspecialchars($message['type']);?> mx-3">
                       <?php echo htmlspecialchars($message['texte']); ?>
                    </span>
                <?php endforeach; ?>
            </marquee>
        </div>
    </div>
    <!-- Fin du Flash Info -->
<!-- Fin du Flash Info -->

<div class="container mt-5">
    <h2>Résultats de la recherche pour : "<?php echo htmlspecialchars($query); ?>"</h2>
    
    <?php if (!empty($sections)): ?>
        <div class="row g-5">
            <?php foreach ($sections as $section): ?>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card mb-5">
                        <img src="<?php echo htmlspecialchars($section['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($section['nom']); ?>">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($section['nom']); ?></h3>
                            <?php echo htmlspecialchars($section['observation']); ?></p>
                            <p class="card-text"><strong>Responsable :</strong> <?php echo htmlspecialchars($section['responsable']); ?></p>
                            <p class="card-text"><strong>Contact :</strong> <?php echo htmlspecialchars($section['contact_info']); ?></p>
                            <p class="card-text"><strong>Date d'événement :</strong> <?php echo htmlspecialchars($section['date_evenement']); ?></p>
                            <p class="card-text"><strong>Observation :</strong> <?php echo htmlspecialchars($section['observation']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Aucun résultat trouvé pour votre recherche.</p>
    <?php endif; ?>
</div>

    
    <a href="index.php" class="btn btn-secondary mt-3">Retour à l'accueil</a>
</div>

   <!-- footer -->
<?php include('components/footer.php'); ?>
    <!-- footer -->
    
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>
    
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
