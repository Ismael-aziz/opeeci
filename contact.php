<?php
// Inclure le fichier de connexion à la base de données
include('components/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OPEECI - Association des Parents d'Élèves et Étudiants de Côte d'Ivoire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<!-- Favicon -->
<link href="img/opeeci.jpg" rel="icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
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
<!-- Page Header Start -->
<div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Contactez-Nous</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">Accueil</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container contact-page py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase"><?php echo htmlspecialchars($contact['titre_section']); ?></h6>
                <h1 class="mb-5"><?php echo htmlspecialchars($contact['description_section']); ?></h1>
                <div class="bg-light text-center p-5">
                    <form action="index.php" method="post">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="nom" class="form-control border-0" placeholder="Votre Nom" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control border-0" placeholder="Votre Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="number" name="telephone" class="form-control border-0" placeholder="Votre Téléphone" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select name="sujet" class="form-select border-0" style="height: 55px;" required>
                                    <option value="" selected disabled>Choisissez un sujet</option>
                                    <option value="Adhésion">Adhésion</option>
                                    <option value="Activités">Activités</option>
                                    <option value="Partenariat">Partenariat</option>
                                    <option value="Autres">Autres</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control border-0" placeholder="Votre Message" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                    <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.4834100299285!2d-4.021971325007201!3d5.304830694513215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eb7ed769b233%3A0x3b56e5b9c9886ed7!2sTreichville%2C%20Abidjan%2C%20C%C3%B4te%20d'Ivoire!5e0!3m2!1sen!2sci!4v1693474297263!5m2!1sen!2sci"
                    frameborder="0" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
                </div>
            </div>                
        </div>
    </div>
</div>
<!-- Contact End -->



<!-- footer -->
<?php include('components/footer.php'); ?>
    <!-- footer -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>