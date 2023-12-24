const DEFAULT_DIR = "static/img/profile/";
const canvas = document.getElementById("profile");
const ctx = canvas.getContext("2d");


function randPart(parts) {
  return parts[Math.floor(Math.random() * parts.length)];
}

const createImage = () => {
  const body = [
    "skinboby1_color1.png"
  ]
  const clothes = [
    "clothesbody1_color1.png",
    "clothesbody1_color2.png",
  ]
  const head = [
    "skinhead1_color1.png"
  ]
  const eyes = [
    "eyes1_color1.png"
  ]
  const mouth = [
    {
      skin: "mouth1_color1.png",
      shadow: "mouthshadow1_color1.png"
    },
  ]
  const nouse = [
    {
      skin: "nouse1_color1.png",
      shadow: "nouseshadow1_color1.png"
    },
  ]
  const beard = [
    {
      skin: "beard1_color1.png",
      shadow: "beardshadow1_color1.png"
    },
    {
      skin: "beard1_color2.png",
      shadow: "beardshadow1_color1.png"
    },
    {
      skin: "beard2_color1.png",
      shadow: "beardshadow1_color1.png"
    }
  ]
  const eyebrows = [
    "eyebrows1_color1.png",
    "eyebrows1_color2.png",
    "eyebrows2_color1.png"
  ]
  const glasses = [
    {
      skin: "glasses1_color1.png",
      shadow: "glassesshadow1_color1.png"
    },
    {
      skin: "glasses_donfalmingo.png",
      shadow: "glasses_donfalmingo_shadow.png"
    },
    {
      skin: "",
      shadow: ""
    }
  ]
  const hair = [
    {
      skin: "hair1_color1.png",
      shadow: "hairshadow1_color1.png"
    },
    {
      skin: "hair1_color2.png",
      shadow: "hairshadow1_color1.png"
    },
    {
      skin: "hair2_color1.png",
      shadow: "hairshadow2_color1.png"
    }
  ]
  const nears = [
    "skinear1_color1.png",
  ]

  const choose_mouse = randPart(mouth);
  const choose_nouse = randPart(nouse);
  const choose_beard = randPart(beard);
  const choose_glasses = randPart(glasses);
  const choose_hair = randPart(hair);

  return [
    randPart(body),
    randPart(clothes),
    randPart(head),
    randPart(eyes),
    choose_mouse.skin,
    choose_nouse.skin,
    choose_beard.skin,
    randPart(eyebrows),
    choose_glasses.skin,
    choose_hair.skin,
    choose_mouse.shadow,
    choose_nouse.shadow,
    choose_beard.shadow,
    choose_glasses.shadow,
    choose_hair.shadow,
    randPart(nears),
  ];
}

function drawLayers(layersArray) {
  layersArray.forEach((layer, index) => {
    const img = new Image();
    img.onload = function() {
      ctx.save(); // Salva o estado atual do contexto
      ctx.scale(-1, 1); // Inverte no eixo x mantendo o eixo y igual
      ctx.drawImage(img, -canvas.width, 0, canvas.width, canvas.height); // Desenha a imagem invertida
      ctx.restore(); // Restaura o estado do contexto para evitar a inversão nas próximas imagens
    };
    img.src = DEFAULT_DIR + layer;
  });
}

drawLayers(createImage());

// add listern onclick in canvas
canvas.addEventListener("click", function() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  drawLayers(createImage());
});