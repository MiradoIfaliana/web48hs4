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
    <div class="choix_objectif">
        <div class="mig">
            <img src="<?php echo base_url("assets/image/5912.jpg") ; ?>" alt="">
        </div>
        <div class="details-choix">
            <form action="<?php echo base_url("First/regime_acceuil") ; ?>" method="post">
                <?php if(isset($message)){ ?>
                    <p><?php echo $message; ?></p> 
                <?php } ?>
                <h2>Votre Objectifs</h2>
                <select name="idobjectif" id=""><?php 
                if(isset($objectifs)){ 
                for($i=0;$i<count($objectifs);$i++){ ?>
                        <option value="<?php echo $objectifs[$i]['idobjectif'];?>"><?php echo $objectifs[$i]['objectif'];?></option><?php
                    }
                }?>
                </select>
                <input type="text" name="kg" placeholder="votre demande en kg" required>
                <input type="submit" value="valider">
            </form>
        </div>
    </div>
    <div class="suggestion"><?php 
        if(isset($regimealimentsport)){
            ?><h1>Duree du regime : <?php echo count($regimealimentsport); ?> jours</h1><?php
            for($i=0;$i<count($regimealimentsport);$i++){
        ?>
                <div class="contains">
                    <div class="jj">
                        <h5>Jours-<?php echo $regimealimentsport[$i]['jours']; ?></h5>
                    </div>
                    <div class="vision"> 
                        <div>
                            <img src="<?php echo base_url("assets/image/repas/".$regimealimentsport[$i]['imgrepasmatin']) ; ?>" alt="" srcset="">
                        </div>
                        <div class="description">
                            <h4>PETIT-DEJEUNER</h4>
                            <span><strong><?php echo $regimealimentsport[$i]['repasmatin']; ?></strong></span>
                            <span class="descri"><?php echo $regimealimentsport[$i]['descriptionsmatin']; ?></span>
                            <span class="qt">quantite : <?php echo $regimealimentsport[$i]['quantitematin']; ?>g</span>
                        </div>
                    </div>
                    <div class="vision"> 
                        <div class="description">
                            <h4>DEJEUNER</h4>
                            <span><strong><?php echo $regimealimentsport[$i]['repasmidi']; ?></strong></span>
                            <span class="descri"><?php echo $regimealimentsport[$i]['descriptionsmidi']; ?></span>
                            <span class="qt">quantite : <?php echo $regimealimentsport[$i]['quantitemidi']; ?>g</span>
                        </div>
                        <div>
                            <img src="<?php echo base_url("assets/image/repas/".$regimealimentsport[$i]['imgrepasmidi']); ?>" alt="" srcset="">
                        </div>
                    </div>
                    <div class="vision"> 
                        <div>
                            <img src="<?php echo base_url("assets/image/repas/".$regimealimentsport[$i]['imgrepassoir']); ?>" alt="" srcset="">
                        </div>
                        <div class="description">
                            <h4>DINER</h4>
                            <span><strong><?php echo $regimealimentsport[$i]['repassoir']; ?></strong></span>
                            <span class="descri"><?php echo $regimealimentsport[$i]['descriptionssoir']; ?></span>
                            <span class="qt">quantite : <?php echo $regimealimentsport[$i]['quantitesoir']; ?>g</span>
                        </div>
                    </div>
                    <div class="vision"> 
                        <div class="description">
                            <h4>SPORT</h4>
                            <span><strong><?php echo $regimealimentsport[$i]['sport']; ?></strong></span>
                            <span class="descri"><?php echo $regimealimentsport[$i]['descriptionssport']; ?></span>
                            <span class="qt">Duree : <?php echo $regimealimentsport[$i]['dureeminut']; ?> min</span>
                        </div>
                        <div>
                            <img src="<?php echo base_url("assets/image/repas/".$regimealimentsport[$i]['imgsport']) ; ?>" alt="" srcset="">
                        </div>
                    </div>
                </div><?php
            } ?>
        </div>
            <div class="prix-total">
                <span><?php echo $regimealimentsport[0]['prixtotal']; ?></span>
                <form action="<?php echo base_url("First/insertCommande") ; ?>">
                    <input type="submit" value = "commander">
                </form>
            </div><?php
        }?>

</body>