<?php session_start() ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>

<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="../Style/signin.css">
</head>

    <body style="background-color:<?php echo strtoupper($color); ?>;">  
  <div class="container">
    <section class="register">
      <h1>Knowledge !</h1>
      <form method="post" action="../Controllers/signController.php" enctype="multipart/form-data">
                <div class="reg_section personal_info">
                <h3>Informations Personelles</h3>
                <input type="text" name="firstname" value="" placeholder="Nom" required >
                <input type="text" name="lastname" value="" placeholder="Prenom" required>
                <input type="text" name="travail" value="" placeholder="Travail" required>
                <input type="text" name="field" value="jhgjhgjhgjhgg" placeholder="Domaine" required>
                <h3>Date de naissance</h3>

                <input type="date" name="birth" value="" placeholder="date naissance" required>

                
                <h3>Grade</h3>
                <select name="grade">
                    <option value="Professeur" selected>Professeur</option>
                    <option value="Doctorant">Doctorant</option>
                    <option value="Maitre-conference">Maitre-conference</option>
                    <option value="Autre">Autre</option>
                </select>

                <h3>structure d’affiliation</h3>
                <select name="affiliation">
                        <option value="laboratoire" selected>laboratoire</option>
                        <option value="université">université</option>
                        <option value="entreprise">entreprise</option>
                        <option value="Autre">Autre</option>
                </select>


                <input type="text" name="email" value="" placeholder="Your E-mail Address" required>
                </div>
                        <div class="reg_section password">
                        <h3>Mot de passe</h3>
                        <input type="password" name="password" value="" placeholder="Mot de passe" required>
                        <input type="password" name="confirm" value="" placeholder="Confirmation mot de passe" required>
                </div>
                <div class="reg_section password">
                        <h3>Adresse</h3>
                        <select name="location">
                            <option value="Egypt" selected>Egypt</option>
                            <option value="Palestine">Palastine</option>
                            <option value="Syria">Syria</option>
                            <option value="Syria">Algerie</option>
                        </select>
                        <h3>Information Profesionnelles</h3>            
                        <textarea name="biblio" id="">Votre biographie</textarea required>
                        <textarea name="publications" id="">Vos Publications</textarea required>
                        <h3>Choisir votre CV:</h3>
                        <input type="file" name="fichier" size="30">               
 </div>

                <p class="submit"><input type="submit" name="submit" value="Sign Up"></p>
      </form>
    </section>
  </div>



</body>
</html>