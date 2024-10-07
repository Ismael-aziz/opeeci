<?php

include '../components/connect.php';

 session_start(); // Ne pas démarrer la session ici

 $admin_id = $_SESSION['admin_id'];

 if (!isset($admin_id)) {
    header('location:admin_login');
};

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE name = ?");
   $select_employee->execute([$name]);

   if ($select_employee->rowCount() > 0) {
      $message[] = "Nom d'utilisateur indisponible!";
   } else {
      if ($pass != $cpass) {
         $message[] = 'Mot de passe différent!';
      } else {
         $insert_employee = $conn->prepare("INSERT INTO `employee`(name, password) VALUES(?,?)");
         $insert_employee->execute([$name, $cpass]);
         $message[] = 'Nouvel employé enregistré !!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inscription</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/employee_style.css">
   <link rel="icon" href="../images/poulet.png" type="image/png">


</head>

<body>

   <?php include '../components/admin_header.php' ?>

   <!-- register employee section starts  -->

   <section class="form-container">

      <form action="" method="POST">
         <h3>Inscription</h3>
         <input type="text" name="name" maxlength="20" required placeholder="pseudo*" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="pass" maxlength="20" required placeholder="Mot de passe*" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="cpass" maxlength="20" required placeholder="confirmer mot de passe*" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="S'inscrire" name="submit" class="btn">
      </form>

   </section>

   <!-- register employee section ends -->




   <!-- custom js file link  -->
   <script src="../js/employee_script.js"></script>

</body>

</html>
