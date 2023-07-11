<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login_admin.css") ; ?> ">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="div">
            <span class="title_project"><span class="ka">Ka</span> <span class="mi">Mi</span> <span class="an">An</span></span>
            <span class="sign">SIGN-IN</span>
            <form action="<?php echo base_url("First/verify_admin") ; ?>" method="post">
                <input type="email" name="mail" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <?php if(isset($message)){ ?>
                    <span class="error"><?php echo $message ; ?></span>
                <?php }?>
                <input type="submit" value="valider">
            </form>
        </div>
        <div>
            <img src="<?php echo base_url("assets/image/Wavy_Bus-39_Single-10.jpg") ; ?>" alt="" width="600px" height="600px">       
        </div>
    </div>
</body>
</html>