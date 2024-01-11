<style>
    /* Styles for the modal */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 1001;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.9);
        animation: fadeInOut 0.3s ease; /* Fade animation */
    }

    .modal-content{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Styles for the image in the modal */
    .modal-image {
        margin: auto;
        display: block;
    }

    /* Styles for the close button */
    .close-btn {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        width: 0px;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    @keyframes fadeInOut {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<div id="customModal" class="custom-modal" onclick="closeModal()" title="Fechar janela">
  <span class="close-btn">&times;</span>
  <div class="modal-content">
    <img class="modal-image" id="modalImg">
  </div>
</div>

<script>
    var imgs = document.querySelectorAll("img:not(.noZoom)");
    
    var modal = document.getElementById("customModal");
    var modalImg = document.getElementById("modalImg");

    imgs.forEach(function(img) {
        img.addEventListener("click", function() {
            modal.style.display = "block";
            modalImg.src = this.src;

            modalImg.style.maxWidth = '90%';
            modalImg.style.height = 'auto'
            modalImg.style.maxHeight = '90%';
            modalImg.style.pointerEvents = 'none';
        });
    });

    function closeModal() {
        modal.style.display = "none";
    }

    // if ESC key is pressed, close the modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>
