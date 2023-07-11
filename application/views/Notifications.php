<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/acceuil_ad.css") ; ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/notif.css") ; ?>">
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
    <div class="contain-notif">
        <?php $ajout_money = $this->Regime_model->get_ajout_money();
            for ($i=0; $i <count($ajout_money) ; $i++) {  ?>
            <?php 
                $tan = $this->Regime_model->get_about_code_money($ajout_money[$i]['idcodemoney']) ;
                $about_users = $this->Regime_model->getabout_users($ajout_money[$i]['idusers']) ; 
            ?>
            <div class="notif">
                <div class="aa">
                    <span><img src="<?php echo base_url("assets/image/user.png") ; ?>" alt=""></span>
                </div>
                <div>
                    <span><?php echo $about_users['nom'] ; ?>  souhaite d'avoir une credit d'une valeur de <?php echo $tan[0]['valeur'] ; ?> du code <?php echo $tan[0]['code'] ; ?></span>
                </div>
                <div class="mig">
                    <a class="check" href="<?php echo base_url("First/validate_money/".$ajout_money[$i]['idajoutmoney']) ; ?>"><img src="<?php echo base_url("assets/image/check.png") ; ?>" alt=""></a>
                    <a class="non-validate" href="<?php echo base_url("First/delete_money/".$ajout_money[$i]['idajoutmoney']) ; ?>"><img src="<?php echo base_url("assets/image/cross.png") ; ?>" alt=""></a>
                </div>
            </div>
            <?php }
        ?>
    </div>
</body>
</html>