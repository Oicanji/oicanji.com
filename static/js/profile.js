const DEFAULT_DIR = "static/img/profile/";
const canvas = document.getElementById("profile");
const ctx = canvas.getContext("2d");


function randPart(parts, force_chance = 0.025) {
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

const avatar = {
  body: "",
  clothes: "",
  head: "",
  mouth_shadow: "",
  mouth: "",
  nouse_shadow: "",
  nouse: "",
  beard_shadow: "",
  beard: "",
  hair_shadow: "",
  hair: "",
  eyes: "",
  eyebrows: "",
  nears: "",
  glasses_shadow: "",
  glasses: "",
  animal: "",
  special: ""
}

const createImage = () => {
  const choose_animal = Math.random() < ANIMAL_CHANCE ? randPart(ANIMAL) : null;
  const choose_special = Math.random() < SPECIAL_CHANCE ? randPart(SPECIAL) : null;

  const choose_mouth = randPart(MOUTH);
  const choose_nouse = randPart(NOUSE);
  const choose_beard = randPart(BEARD);
  const choose_glasses = randPart(GLASSES);
  const choose_hair = randPart(HAIR);

  avatar.body = randPart(BODY).skin;
  avatar.clothes = randPart(CLOTHES).skin;
  avatar.head = randPart(HEAD).skin;
  avatar.mouth = choose_mouth.skin;
  avatar.mouth_shadow = choose_mouth.shadow;
  avatar.nouse = choose_nouse.skin;
  avatar.nouse_shadow = choose_nouse.shadow;
  avatar.beard = choose_beard.skin;
  avatar.beard_shadow = choose_beard.shadow;
  avatar.hair = choose_hair.skin;
  avatar.hair_shadow = choose_hair.shadow;
  avatar.eyes = randPart(EYES).skin;
  avatar.eyebrows = randPart(EYEBROWS).skin;
  avatar.nears = randPart(NEARS).skin;
  avatar.glasses = choose_glasses.skin;
  avatar.glasses_shadow = choose_glasses.shadow;
  avatar.animal = choose_animal ? choose_animal.skin : "";
  avatar.special = choose_special ? choose_special.skin : "";

  if(Math.random() < EASTER_EGG_CHANCE) {
    if(Math.random() < 0.3) {
      return [EASTER_EGG[Math.floor(Math.random() * EASTER_EGG.length)].image];
    }

    const choose_egg = COSPLAY[Math.floor(Math.random() * COSPLAY.length)];

    for ( part of choose_egg.parts) {
      avatar[part.layer] = part.skin;
    }

  }
  const final = [];
  for (const [_, value] of Object.entries(avatar)) {
    if(value != "") {
      final.push(value);
    }
  }
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
      ctx.webkitImageSmoothingEnabled = false;
      
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