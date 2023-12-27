const DEFAULT_DIR = "static/img/profile/";
const canvas = document.getElementById("profile");
const ctx = canvas.getContext("2d");


function randPart(parts, force_chance = 0.025) {
  console.log(force_chance);
  const choose = parts[Math.floor(Math.random() * parts.length)];
  if(choose.hasOwnProperty("chance")) {
    if(Math.random() < choose.chance+force_chance) {
      return choose;
    } else {
      return randPart(parts, force_chance+0.025);
    }
  }
  return choose;
}

const createImage = () => {
  const choose_animal = Math.random() < ANIMAL_CHANCE ? randPart(ANIMAL) : null;
  const choose_special = Math.random() < SPECIAL_CHANCE ? randPart(SPECIAL) : null;

  const choose_mouth = randPart(MOUTH);
  const choose_nouse = randPart(NOUSE);
  const choose_beard = randPart(BEARD);
  const choose_glasses = randPart(GLASSES);
  const choose_hair = randPart(HAIR);

  const final = [
    randPart(BODY).skin,
    randPart(CLOTHES).skin,
    randPart(HEAD).skin,
    choose_mouth.skin,
    choose_nouse.skin,
    choose_beard.skin,
  ]

  if(choose_hair.skin != "") {
    final.push(choose_hair.skin);
  }
  if(choose_mouth.shadow != "") {
    final.push(choose_mouth.shadow);
  }
  if(choose_nouse.shadow != "") {
    final.push(choose_nouse.shadow);
  }
  if(choose_beard.shadow != "") {
    final.push(choose_beard.shadow);
  }

  final.push(randPart(EYES).skin);

  if(choose_hair.shadow != "") {
    final.push(choose_hair.shadow);
  }

  if(choose_glasses.shadow != "") {
    final.push(choose_glasses.shadow);
  }

  if(choose_glasses.skin != "") {
    final.push(choose_glasses.skin);
  }

  final.push(randPart(EYEBROWS).skin);
  
  final.push(randPart(NEARS).skin);

  if(choose_animal) {
    final.push(choose_animal.skin);
  }
  if(choose_special) {
    final.push(choose_special.skin);
  }

  console.log(final);

  return final;
}

async function drawLayers(layersArray) {
  async function drawImageAtIndex(index) {
    if (index >= layersArray.length) return; // Se chegou ao final do array, termina

    const img = new Image();
    img.onload = async function() {
      ctx.save(); // Salva o estado atual do contexto
      ctx.scale(-1, 1); // Inverte no eixo x mantendo o eixo y igual
      ctx.imageSmoothingEnabled = false; // Desativa a suavização para manter a nitidez
      ctx.drawImage(img, -canvas.width, 0, canvas.width, canvas.height);
      ctx.restore();

      // Desenha a próxima imagem após o carregamento da atual
      await drawImageAtIndex(index + 1);
    };
    img.src = DEFAULT_DIR + layersArray[index];
  }

  await drawImageAtIndex(0);
}


drawLayers(createImage());

// add listern onclick in canvas
canvas.addEventListener("click", function() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  drawLayers(createImage());
});



function downloadImage() {
  const tempCanvas = document.createElement("canvas");
  const tempCtx = tempCanvas.getContext("2d");

  const aspectRatio = 35;
  tempCanvas.width = canvas.width * aspectRatio;
  tempCanvas.height = canvas.height * aspectRatio;

  tempCtx.imageSmoothingEnabled = false;
  tempCtx.webkitImageSmoothingEnabled = false;
  tempCtx.mozImageSmoothingEnabled = false;

  tempCtx.scale(-1, 1); // Inverte no eixo X mantendo o eixo Y igual
  tempCtx.drawImage(canvas, -tempCanvas.width, 0, tempCanvas.width, tempCanvas.height);

  const downloadLink = document.createElement("a");
  downloadLink.href = tempCanvas.toDataURL("image/png"); // Convertendo o canvas para um URL de dados da imagem
  downloadLink.download = "oicanji_"+NAMES_RAND[Math.floor(Math.random() * NAMES_RAND.length)]+".png"; // Nome do arquivo para download
  downloadLink.click();
}

// Suponha que você tenha um botão de download com o ID "downloadButton"
const downloadButton = document.getElementById("downloadButton");
downloadButton.addEventListener("click", downloadImage);