<?php

$words = array(
    'Seja bem vindo ao meu portifólio de projetos!',
    'Aqui você encontrará meus projetos e links para download.',
    'Aproveite e me siga nas redes sociais!',
    'Obrigado pela visita!',
    'Você é um visitante muito especial!',
    'Obrigado por estar aqui!',
    'Obrigado por me visitar!',
    'Obrigado por me acompanhar!',
    'Dá uma olhada nos meus projetos!',
    'Dá uma olhada nos meus links!',
    'Primeira vez aqui?',
    'Já conhece meus projetos?',
    'Sim eu sei, o texto muda toda vez que você atualiza a página.',
    'Como você está hoje?',
    'Como diria Michael Jackson, abiridin!',
    'Quer conhecer um cara do balacobaco, veja os projetos do @leandl no github!',
    'O verdadeiro tesouro é os amigos que fazemos no caminho.',
    'Sim eu faço apontamentos e referências aqui no footer, deixa eu ser feliz ;-;',
    'Infelizmente não tenho muito tempo para me dedicar a esse portifólio, mas sempre que posso dou uma atualizada.',
    'Infinito é o número de vezes que você pode atualizar essa página e ver um texto diferente. (Não é infinito, mas é bastante)',
    'Para sempre agradecido a meu colega de técnico Thiago, que me fez ter interesse em programação.',
    'Você é team front-end ou team back-end?',
    'Obrigado e volte sempre!',
    'Ryan, é você? (Se você é o Ryan, muito obrigado por me visitar! Senão, obrigado também!)',
    'Duvido você não ler isso.',
    'Já pensou em fazer um portifólio?',
    'Java.nullPointerException não é legal, mas é engraçado.',
    'This is the way.',
    'Não foi possível carregar o texto, tente novamente mais tarde. (Não é um erro, é só um texto aleatório mesmo)',
    '( ͡° ͜ʖ ͡°)',
    '(23:23:32 jul 23 2021) PHP ERROR: Undefined index: oicanji.php on line 1, cause: undefined variable $oicanji',
    'Tem mensagens escondidas aqui, tente achar!',
    'Sim dependo do dia você pode ver mensagens diferentes aqui.',
    'Oh maaaan!',
    'Never gonna give you up, never gonna let you down...',
    'Acho que você já entendeu como funciona isso aqui né?',
    'Acho que terei que baixar uma placa de vídeo nova para jogar Cyberpunk 2077.',
    'O chatgpt já domina o mundo, e você nem percebeu.',
    'Já lanço o GTA 6? Eu não sei kk',
    'Eu realmente gosto do PHP, facil rápido e prático.',
    'Trabalho com React, mas isso não me faz ignorar criticas ao React. Minha opinião é que o React é bom para projetos em equipe grandes e complexos, mas para projetos pequenos e simples, é melhor usar o Vue ou o PHP com CSS que vocês tão vendo aqui.',
    'Gostaria de lançar um jogo com a Unity, mais torcer para o fracasso do mesmo para não cair nas cobranças da licença da Unity é desanimador.',
    'Um dia eu ainda vou lançar um jogo, e você vai poder jogar ele aqui.',
    'Realmente eu nunca quis assistir One Piece, mas após me acustumar na lentidão do anime, eu realmente acho que não há shounen a altura de One Piece.',
    'Realmente Jujustu Kaisen é um dos animes já feitos.',
    'Relax and take notes, while I take tokes of the ...',
    'Pra cima, pra baixo, izquerda, direita, esquerda, direita, B, A, start... Opa você aqui e eu fazendo o Konami Code.',
    'Yesterday, all my troubles seemed so far away, now it looks as though they\'re here to stay, oh I believe in yesterday...',
    'Me formar em Sistemas para Internet, foi incrível, conheci pessoas incríveis, e os professores são muito bons.',
    'Não aguento mais RPG, pior coisa que tem é jogo de turno... Dito isso Baldur\'s Gate 3 é um dos melhores jogos que já joguei.',
    'Meu nojo com RPG de turno vem de horas no RPG Maker, mexi tanto com o programa que não aguento mais ver um jogo de turno.',
    'Talvez toda essa raiva do RPG de turno também seja causa do Pokémon... É legal mas depois de 10 jogos iguais, enjoa.',
    'Trabalhar com modder em jogos é algo que respeito muito, um dia quero ser um modder.',
    'Não fale para meu professor Miguel que uso css inline, ele vai me matar.',
    'Vera Fischer Falsa. ( Verdadeiro com Falso dá Falso, não me esqueço das aulas de tabela verdade )',
    'Toca Raul!',
    'O jogo',
);

// holidays detection
$day = date('d');
$month = date('m');

if ($day == 25 && $month == 12) array_merge($words, [
    'Feliz natal!',
    'Merry christmas!',
    'Feliz navidad!',
    'Ho ho ho! Feliz natal!',
    'Feliz natal e próspero ano novo!',
    'Porque você está aqui no natal? Vá aproveitar com sua família!',
    'Porque está nevando aqui? Não tem neve no Brasil!',
    'Aqui seu presente: https://www.youtube.com/watch?v=dQw4w9WgXcQ'
]);

if ($day == 31 && $month == 12) array_merge($words, ['Feliz ano novo!']);

if ($day == 22 && $month == 11) array_merge($words, ['É meu aniversário!']);

if ($day == 1 && $month == 4) array_merge($words, [
    'Este site é feito em React + Kotlin :p',
    'Hoje é o dia da mentira!',
    'Hoje é o dia da mentira! (Não é mentira)',
    'Hoje é o dia da mentira! (É mentira)',
    'Hoje é o dia da mentira! (Não é mentira, é mentira)',
]);

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    echo $words[rand(0, count($words) - 1)];
} else {
    echo 'O caramba, você não está usando SSL? Eu deixei de configurar o SSL?? Nossa que vergonha... Isso é um erro meu, desculpe.';
}

?>