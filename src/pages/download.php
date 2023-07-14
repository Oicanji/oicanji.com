<div class="container-fluid" style="margin-top: 10px;">
    <div class="bg-dark flag-box">
        Você esta em downloads
    </div>
    <div class="bg-dark rounded p-2 text-secondary" style="margin-top: 10px;">
        <h3>Meus projetos disponíveis para download:</h3>
        <div class="p-3 text-white row justify-content-evenly">
            <?php
                $dir = 'downloads/projetos/';
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        // verificar a extensão do arquivo
                        $ext = pathinfo($file, PATHINFO_EXTENSION);

                        echo '<a class="link-light link-underline link-underline-opacity-0" href="downloads/projetos/'.$file.'" download>';
                        echo '  <div class="text-center col-md-2">';
                        echo '      <div class="h6">';
                        switch($ext){
                            case 'apk':
                                echo 'Jogo para Android'
                                .  '</div>';
                                echo '<div style="font-size:74px">'
                                .       '<i class="fa-solid fa-file-arrow-down"></i>'
                                .    '</div>';
                                break;
                            default:
                                echo '<p><i class="fa-solid fa-file"></i></p></div>';
                        }

                        echo '<p class="link-primary link-underline link-underline-opacity-100">'.$file.'</p></div></a>';
                    }
                }
            ?>
        </div>
    </div>
    
    <div class="bg-dark rounded p-2 text-secondary" style="margin-top: 10px;">
        <h3>Outros arquivos:</h3>
        <small>Arquivos que não são projetos, mas que alguém pode estar buscando por.</small>
        <div class="p-3 text-white row justify-content-evenly">
            <?php
                $dir = 'downloads/outros/';
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        // verificar a extensão do arquivo
                        $ext = pathinfo($file, PATHINFO_EXTENSION);

                        echo '<a class="link-light link-underline link-underline-opacity-0" href="downloads/outros/'.$file.'" download >';
                        echo '<div class="text-center col-md-2">';
                        echo '<div class="h6">';
                        switch($ext){
                            case 'apk':
                                echo 'Jogo para Android </div>';
                                echo '<div style="font-size:74px"><i class="fa-solid fa-file-arrow-down"></i></div>';
                                break;
                            case 'zip':
                                echo 'Arquivo ZIP </div>';
                                echo '<div style="font-size:74px"><i class="fa-solid fa-file-zipper"></i></div>';
                                break;
                            default:
                                echo 'Arquivo </div>';
                                echo '<div style="font-size:74px"><i class="fa-solid fa-file"></i></div>';
                        }

                        echo '<p class="link-primary link-underline link-underline-opacity-100">'.$file.'</p></div></a>';
                    }
                }
            ?>
        </div>
    </div>
</div>