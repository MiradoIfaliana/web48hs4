<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/inscription.css") ; ?> ">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="div">
            <span class="title_project">  <span class="ka">Ka</span> <span class="mi">Mi</span> <span class="an">An</span> </span>
            <span class="sign">SIGN-Up</span>
            <form action="<?php echo base_url("First/addinscription") ; ?>" method="post">
                <div>
                    <input type="email" name="mail" placeholder="email">
                    <input type="name" name="nom" placeholder="nom">
                </div>
                <div class="nee">
                    <label for="">Nee : </label>
                    <input type="date" name="nee" placeholder="password">
                </div>
                <div class="genre">
                    <label for="">Genre :</label>
                    <select name="idgenre" id="">
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="taillecm" placeholder="taille en cm">
                    <input type="texx" name="poids" placeholder="poids">
                </div>
                <div class="pass">
                    <input type="password" name="password" placeholder="password">
                </div>
                <div class="boutton">
                    <input type="submit" value="Inscription" id="">
                </div>
            </form>
            <span class="url"> Already have an account <a href="<?php echo base_url("First/index") ; ?>" >Sign in ?</a></span>
            <?php if(isset($message)){ ?>
                <span><?php echo $message ;?></span>
            <?php } ?>
        </div>
        <div class="img">
            <img src="<?php echo base_url("assets/image/4968860.jpg") ; ?>" alt="" width=600px" height="590px">
        </div>
    </div>
</body>
</html>