<link rel="stylesheet" href="static/css/footer.css">

<div class="container-fluid" style="margin-top: 10px;">

    <div class="bg-dark footer">
        <p class="text-center pb-2 pt-2">Meus contatos</p>
        <div class="footer-container">
            <div class="text-dark p-1" style="background-color: #404040;" onclick="social('https:\/\/twitter.com\/the_oicanji')">
                <i class="fa-solid fa-x" style="color: #fff;"></i>
            </div>
            <div class="bg-light text-dark p-1" onclick="social('https:\/\/github.com\/Oicanji')">
                <i class="fa-brands fa-github"></i>
            </div>
            <div class="text-dark p-1" style="
                background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
            " 
            
            onclick="social('https:\/\/www.instagram.com\/oicanji\/'); alert('eu não uso insta, não me chama lá porfavor')">
                <i class="fa-brands fa-instagram" style="color: #fff;"></i>
            </div>
            <div class="bg-info text-dark p-1" onclick="social('https:\/\/www.linkedin.com\/in\/oicanji\/')">
                <i class="fa-brands fa-linkedin" style="color: #0a3c6b;"></i>
            </div>
            <div class="text-dark p-1" style="background-color: #eb4034;" onclick="social('https:\/\/oicanji.itch.io');">
                <i class="fa-brands fa-itch-io" style="color: #fff;"></i>
            </div>
        </div>
    </div>
    <div class="bg-dark rounded p-4 text-center">
        <p class="font-monospace"><?php require('src/components/words/words.php') ?></p>
    </div>
</div>
