<?php 
    
    $firstnameErr = $lastnameErr = $genderErr  = $mailErr = $countryErr = $subjectErr = $textfieldErr= '';
    $firstname = $lastname = $gender  = $mail = $country = $subject = $textfield = "";
    
    function Securisation($donnees){ // CHECK LES DATAS !!!
        $donnees = htmlspecialchars($donnees);
        $donnees = trim($donnees);
        $donnees = stripcslashes($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }


    @$valider = Securisation($_POST['valider']);
    @$firstname = Securisation($_POST['firstname']);
    @$lastname = Securisation($_POST['lastname']);
    @$gender = Securisation($_POST['gender']);
    @$mail = Securisation($_POST['mail']);
    @$country = Securisation($_POST['country']);
    @$subject = Securisation($_POST['subject']);
    @$textfield = Securisation($_POST['textfield']);

   
        if(isset($_POST['valider'])){
            if($firstname === ''){
                $firstnameErr = '<span class="error"> Vous n avez pas mis de prénom </span><br>';
            }if($lastname === ''){
                $lastnameErr = '<span class="error"> Vous n avez pas mis de nom </span><br>';
            }if(!$gender === 'Mr' ||  !$gender === 'Mme'){
                $genderErr = '<span class="error"> Vous n avez pas mis de genre </span><br>';
            }if($mail === ''){
                $mailErr = '<span class="error"> Vous n avez pas mis d\'E-mail </span><br>';
            }if($country === ''){
                $countryErr = '<span class="error"> Vous n avez pas mis de Pays </span><br>';
            }if($subject === 'empty'){
                $subjectErr = '<span class="error"> Vous n avez pas mis de Sujet </span><br>';
            }if($textfield === ''){
                $textfieldErr = '<span class="error"> Vous n avez pas mis de message </span><br>';
            }else{
                $for = $subject.' From ' .$lastname.' ' .$firstname;
                $headers = 'From: hackers-poulette@delvauxrobby.yj.fr' . "\r\n" ;
                echo '<p class="text-center" >Votre mail a bien été envoyer .</p>';
                $msgUser = "Bonjour ".$gender. ",\nNous avons bien reçu votre formulaire de contact .\nAu sujet de  " .$subject. " avec le message suivant " .$textfield;
                mail($mail,$for,$msgUser,$headers);
                $firstname = ' ';
                $lastname = ' ' ;
                $gender = ' ' ;
                $mail = ' ';
                $country = ' ';
                $subject = ' ';
                $textfield = ' ';
                echo "<meta http-equiv='refresh' content='1'>";
            }
        }
    
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
           <link rel="stylesheet" href="./assets/css/formstyle.css"> 
           <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300;400;700&display=swap" rel="stylesheet">
           <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <title>Contact</title>
</head>
<body>
    <header>
        <h2 class="text-center mb-4 formulaire" alt="title contact us">Contact Us</h2>
    </header>
    <p class="text-center mb-5 formulaire">Vous avez des questions ? Des avis? N'hésitez pas à nous contacter via ce formulaire, nos équipes prendront le soin d'y répondre aussi vite que possible.</p>
    <form method="POST" action="" class="text-center m-t-5 formulaire">
    <section class="text-center">
        <input type="text" name="firstname" alt="firstname" placeholder="Firstname" alt="first name" class="rounded col-md-2 offset-md-5 col-sm-8 offset-sm-2 form-control formulaire"><?php echo '<br>'.$firstnameErr ;?><br>
        <input type="text" name="lastname" alt="lastname" placeholder="Lastname" alt="last name" class="rounded col-md-2 offset-md-5 col-sm-8 offset-sm-2 form-control formulaire"><span class="error"><?php echo '<br>'.$lastnameErr;?></span><br>
        </section>
    <section>
        <label for="Mr">Mr<input type="radio" value="gender" name="Mr" alt="checkbox man" class="formulaire"></label>
        <label for="Mme">Mme<input type="radio" value="gender" name="Mme" alt="checkBox girl" class="formulaire"></label></section><span class="error" ><?php echo '<br>' .$genderErr ;?></span><br>
   
        <input type="email" name="mail" placeholder="E-mail" alt="E-mail" class="rounded col-md-2 offset-md-5 col-sm-8 offset-sm-2 form-control formulaire"><span class="error"><?php echo '<br>'.$mailErr;?></span><br>
        <input type="text" name="country" placeholder="Country" alt="Country" class="rounded col-md-2 offset-md-5 col-sm-8 offset-sm-2 form-control formulaire"><span class="error"><?php echo '<br>'.$countryErr;?></span><br>
            <select name="subject"  required alt="Subject from contact" class="rounded form-control col-md-2 offset-md-5 col-sm-8 offset-sm-2 formulaire"><br><span class="error"><?php echo '<br>'.$subjectErr;?></span>
                <option value="empty">none</option>
                <option value="Return product" value="return" alt="return product">Return the product</option>
                <option value="Help desk" value="Help Desk" alt="Help desk">Talk with Help-Desk</option>
                <option value="Contact us" value="Contact us" alt="just for contact us">Contact us</option>
            </select><br>
        <section class="col-md-6 offset-md-3 rounded">
            <textarea name="textfield" id="textfield" cols="23" rows="9" placeholder="Your message here" alt="text aréa" class="form-control md-textarea rounded formulaire"></textarea><span class="error"><?php echo '<br>'.$textfieldErr;?></span><br>
            </section>
        <input type="submit" value="valider" name="valider" class="btn btn-success validate formulaire" alt="boutton envoyer">
    </form>
    <img src="./assets/img/becodetransp.png" width="256px" height="256px" alt="Logo Becode" class="logo col-md-2 offset-md-5 mt-5 col-sm-4 offset-sm-4 formulaire">
    <script src="./assets/js/scroll.js"></script>
</body>
</html>