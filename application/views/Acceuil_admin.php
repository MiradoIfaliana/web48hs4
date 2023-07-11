<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/acceuil_ad.css") ; ?>">
    <script src="<?php echo base_url("assets/js/chart.js") ; ?>"></script>
    <!-- <script src="<?php echo base_url("assets/js/report.js") ; ?>" defer></script> -->
    <script src="<?php echo base_url("assets/js/graph.js") ; ?>" defer></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="header">
        <header>
            <div class="company">
                <span class="ka">Ka</span> <span class="mi">Mi</span> <span class="an">An</span> </span>
            </div>
            <div class="menu">
                <span> <a href="<?php echo base_url("First/acceuil_admin") ; ?>">Dashboard</a> </span>
                <span> <a href=""> Insertion </a></span>
                <span> <a href="<?php echo base_url("First/notif") ; ?>"> Notification </a></span>
                <span class="users"><img src="<?php echo base_url("assets/image/user.png") ; ?>" alt="">Admin</span>
                <span> <a href="<?php echo base_url("First/log_out_admin") ; ?>"> log-out</a></span>
            </div>
        </header>
    </div>
    <div class="statistique">
        <h6>Statistique</h6>
        <div>
            <span>Voir l'evolution prix de commande fait selon annee choisi</span>
        </div>
        <div class="contain">
            <div class="st">
                <form id="poster" method="post">
                    <input type="date" name="date">
                    <input type="submit" value="valider">
                </form>
            </div>
            <div class="canva">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</body>
</html>