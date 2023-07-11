<?php $this->session->userdata('idusers') ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/acceuil_ad.css") ; ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/sugg.css") ; ?>">
    <title>Document</title>
</head>
<body>
    <div class="boi">
        <div class="header">
            <header>
                <div class="company">
                    <span class="ka">Ka</span> <span class="mi">Mi</span> <span class="an">An</span> </span>
                </div>
                <div class="menu">
                    <span> <a href="<?php echo base_url("First/acceuil") ; ?>">Acceuil</a> </span>
                    <span> <a href="<?php echo base_url("First/regime_acceuil") ; ?>"> Regime </a></span>
                    <span> <a href="<?php echo base_url("First/toAjoutmoney") ; ?>"> Money</a></span>
                    <span class="users-no"><img src="<?php echo base_url("assets/image/user.png") ; ?>" alt="">Users</span>
                    <span> <a href="<?php echo base_url("First/log_user") ; ?>"> log-out</a></span>
                </div>
            </header>
        </div>
        <div class="back">
            <div class="details">
                <span class="bien">BIENVENU SUR KAMIAN</span>
                <span class="det">Site pour reussir votre regime alimentaire avec beaucoup de mode</span>
                <span class="start"> Get Started</span>
            </div>
            <div class="img">
                <img src="<?php echo base_url("assets/image/Picsart_23-07-11_08-25-57-845.png") ; ?>" alt="">
            </div>
        </div>
    </div>
    <div class="motivation">
        <span>
            <h3>Santé</h3>
            Adopter un régime alimentaire équilibré permet d'améliorer sa santé globale en fournissant les nutriments essentiels au bon fonctionnement de l'organisme et en réduisant les risques de maladies liées à une alimentation déséquilibrée.
        </span>
        <span>
            <h3>Bien-être physique</h3>
            Suivre un régime alimentaire approprié contribue à maintenir un poids santé, à augmenter l'énergie et à améliorer la condition physique. Cela peut se traduire par une meilleure qualité de vie, une plus grande mobilité et une sensation générale de bien-être physique
        </span>
        <span>
            <h3>Estime de soi</h3>
            Atteindre ses objectifs en matière de régime alimentaire peut renforcer la confiance en soi et l'estime de soi. Se sentir bien dans sa peau et avoir une image positive de soi peuvent avoir des répercussions positives sur d'autres aspects de la vie, tels que les relations personnelles et professionnelles.
        </span>
    </div>
    <div class="footer">
        <footer>
            ETU1829 - ETU1786 - ETU1756
        </footer>
    </div>
</body>
</html>