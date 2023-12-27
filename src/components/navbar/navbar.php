<link rel="stylesheet" href="static/css/navbar.css">

<div class="container-fluid webnavbar">
    <div class="div_assinature bg-dark rounded">
        <span class="text-primary">Bem-vindo!</span> 
        Cantinho especial onde compartilho meus projetos e aptidões, atualizado em
        <span class="text-primary"><?php echo date("Y"); ?></span>
    </div>
        <div class="div_title">
            <div class="bg-dark rounded p-2">
                <h1>
                    OICANJI.COM
                </h1>
                <p>
                    Portifólio de Projetos do Oicanji (eu)
                </p>
            </div>
            <!-- <img src="https://avatars.githubusercontent.com/u/51388779?s=400&u=3662a21c9792442c7290ebf0a0731c528da31013&v=4" 
                        style="transform: scaleX(-1);" 
                        class="rouded shadow-lg border border-4 border-white border-opacity-10" alt="profile" width="90" height="90"> -->
            <canvas id="profile" width="90" height="90" 
                style="image-rendering: pixelated;"
                class="rouded shadow-lg border border-4 border-white border-opacity-10"></canvas>
            <button class="btn btn-primary" id="downloadButton">
                <i class="fas fa-download"></i>
            </button>

        </div>

    <div class="div_routes bg-dark">
        <div class="div_downloads <?php echo $here == 'download' ? 'select' : '" onclick="download()' ?>">
            Central de <br />Downloads
        </div>
        <div class="div_navegation">
            <div>
                <p>
                    Navegação do Site
                </p>
            </div>
            <div class="row mt-2 justify-content-evenly">
                <div class="col <?php echo $here == 'projects' ? 'text-primary' : 'text-secondary" onclick="projects()"' ?>">
                    Projetos
                </div>
                <div class="col-6 <?php echo $here == 'home' ? 'text-primary' : 'text-secondary" onclick="home()"' ?>">
                    Página Inicial
                </div>
                <div class="col-3  <?php echo $here == 'profile' ? 'text-primary' : 'text-secondary" onclick="profile()"' ?>">
                    Aptidões
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // dar refresh na página enviado o parâmetro 'download' na url
    function download() {
        window.location.href = 'index.php?download';
    }
    function home() {
        window.location.href = 'index.php';
    }
    function projects() {
        window.location.href = 'index.php?projects';
    }
    function profile() {
        window.location.href = 'index.php?profile';
    }
    function social(link){
        window.open(link);
    }
</script>

<script src="static/js/profile-parts.js"></script>
<script src="static/js/profile-special.js"></script>
<script src="static/js/profile-random.js"></script>
<script src="static/js/profile.js"></script>