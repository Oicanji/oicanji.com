<!doctype html>
<html lang="pt-br">
    <head>
        <?php require('src/include/header.php') ?>
    </head>
    <body class="bg-black text-light">
        <?php
            $here = '';
            $header_show = true;

            // pegar o parâmetro 'download' da url
            if (isset($_GET['download'])) { 
                $here = 'download';
            }else if(isset($_GET['projects'])){
                $here = 'projects';
            }else if(isset($_GET['profile'])){
                $here = 'profile';
                $header_show = false;
            }else{
                $here = 'home';
            }

            require('src/components/navbar/navbar.php');
            
            switch($here){
                case 'home':
                    require('src/pages/home.php');
                    break;
                case 'projects':
                    require('src/pages/projects.php');
                    break;
                case 'profile':
                    require('src/pages/profile.php');
                    break;
                case 'download':
                    require('src/pages/download.php');
                    break;
            }

            require('src/include/footer.php');
        ?>
        <br />
    </body>
</html>
