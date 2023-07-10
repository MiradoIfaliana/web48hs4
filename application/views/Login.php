<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ; ?> ">
    <title>Document</title>
</head>
<body>
    <form action="NewTest_admin/Transform" method="get">
        <input type="test" name="nom" placeholder="enter...">
        <input type="password" name="mdp" placeholder="enter...">
        <input type="submit" value="ok">
    </form>
    <?php
        $list =  $this->Tobase_model->getNamees() ;
        for ($i=0; $i <count($list) ; $i++) { 
            echo $list[$i]["name_user"] ; 
        }
    ?>
</body>
</html>