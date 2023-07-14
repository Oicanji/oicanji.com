<link rel="stylesheet" href="static/css/navbar.css">

<div class="container-fluid webnavbar">
    <div class="div_assinature bg-dark rounded">
        <span class="text-primary">oicanji.com</span> 
        Portifólio de Projetos do Oicanji 
        <span class="text-primary"><?php echo date("Y"); ?></span>
    </div>
    <?php if($header_show){ ?>
        <div class="div_welcome bg-dark rounded">
            <p class="font-monospace"><?php require('src/components/words/words.php') ?></p>
        </div>
        <div class="div_profile bg-dark rounded p-2">
            <div class="row">
                <div class="col-7 pt-2 text-end">
                    <p>Ignacio (Oicanji)</p>
                    <p class="text-primary">DEV && Artist</p>
                    <p class="text-primary">Brasil</p>
                </div>
                <div class="col-5">
                    <img src="https://avatars.githubusercontent.com/u/51388779?s=400&u=3662a21c9792442c7290ebf0a0731c528da31013&v=4" 
                        style="transform: scaleX(-1);" 
                        class="rounded-circle shadow-lg border border-1 border-white border-opacity-10" alt="profile" width="90" height="90">
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="div_downloads <?php echo $here == 'download' ? 'select' : '" onclick="download()' ?>">
        downloads
    </div>
    <div class="div_routes bg-dark">
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
    <div class="div_social bg-dark">
        <div class="row justify-content-evenly">
            <div class="col" onclick="social('https:\/\/twitter.com\/the_oicanji')">
                <div class="bg-primary text-dark p-1">
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>
            <div class="col" onclick="social('https:\/\/github.com\/Oicanji')">
                <div class="bg-light text-dark p-1">
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>
            <div class="col" onclick="social('https:\/\/www.instagram.com\/oicanji\/'); alert('eu não uso insta, não me chama lá porfavor')">
                <div class="text-dark p-1" style="background-color: #f52a52;">
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>
            <div class="col" onclick="social('https:\/\/www.linkedin.com\/in\/oicanji\/')">
                <div class="bg-info text-dark p-1">
                    <i class="fa-brands fa-linkedin"></i>
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