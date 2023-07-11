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
                <span class="users-no"><img src="<?php echo base_url("assets/image/user.png") ; ?>" alt="">Users</span>
                <span> <a href="<?php echo base_url("First/toAjoutmoney") ; ?>"> Money</a></span>
                <span> <a href="<?php echo base_url("First/log_user") ; ?>"> log-out</a></span>
            </div>
        </header>
    </div>
    <div class="etoile">
        <div class="tab">
                <table width="400">
                    <tr>
                        <th>Code</th>
                        <th>Argent</th>
                    </tr><?php
                    if(isset($codemoney)){
                        for($i=0;$i<count($codemoney);$i++){ ?>
                        <tr>
                            <td><?php echo $codemoney[$i]['code']; ?></td>
                            <td><?php echo $codemoney[$i]['valeur']; ?></td>
                        </tr>
                        <?php
                        }
                    }?>
                <table>
        </div>
        <div class="choix_objectif">
            <div class="details-choix">
                <form action="<?php echo base_url("First/insertmoney") ; ?>" method="post">
                    <h2>Ajouter money</h2>
                    <?php if(isset($message)){ ?>
                        <p style="color:red;"><?php echo $message; ?></p> 
                    <?php } ?>
                        <input type="text" name="code" placeholder="code de recharge" required>
                    <input type="submit" value="valider">
                </form>
            </div>
        </div>
    </div>

</body>
</html>