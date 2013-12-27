<?php 
error_reporting(E_ALL);
include './Classes/Team.Class.php';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            body {background-color:#996600;}
            p {color:blue;}
            ul {width: 730px}
            ul li {float: left; list-style: none; width: 170px}
            .clear {clear: both}
        </style>
        <title></title>
    </head>
    <body>
      
        <?php 
        if(isset($page) && $page !='') {
            
            switch ($page) {
                case 'team' :
                    include('team.php');
                    break;
                case 'jogo':
                    include('jogo');
                    break;
            }
        }
        ?>
       
    </body>
</html>
