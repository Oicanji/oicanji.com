<link rel="stylesheet" href="static/css/project.css">

<div class="container-fluid" style="margin-top: 10px;">
    <div class="bg-dark flag-box">
        Você esta vendo meu projeto :)
    </div>
    <div class="bg-dark rounded p-2 text-secondary text-center" style="margin-top: 10px;">
        <div style="text-align: left;">
            <botton class="btn btn-sm btn-primary" onclick="window.location.href = 'index.php?projects'">
                Voltar ao Projetos <i class="fas fa-arrow-left"></i>
            </botton>
        </div>
        <?php
            require('src/components/projects/project.php');
        ?>
    </div>
</div>