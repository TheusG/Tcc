const menu      = document.querySelector('.nav-links');
const burguer   = document.querySelector('.burguer');
const linha1    = document.querySelector('#linha1');
const linha2    = document.querySelector('#linha2');
const linha3    = document.querySelector('#linha3');
const home =document.querySelector('#home')
const sobre =document.querySelector('#sobre')
const skills =document.querySelector('#skills')
const projetos =document.querySelector('#projetos')

const loginbutton2 = document.querySelector('#abrirLogin2');
const loginbutton = document.querySelector('#abrirLogin');
const login = document.querySelector('.megaConteiner');
const exitbutton = document.querySelector('#exitButtonn');



loginbutton2.addEventListener('click', () => {
  login.classList.toggle('megaConteinerOn');
  menu.classList.toggle('nav-active');
  linha1.classList.toggle('linha1-active')
  linha2.classList.toggle('linha2-active')
  linha3.classList.toggle('linha3-active')

});

loginbutton.addEventListener('click', () => {
  login.classList.toggle('megaConteinerOn');
});

exitbutton.addEventListener('click', () => {
  login.classList.remove('megaConteinerOn'); // Remova a classe megaConteinerOn
  login.classList.add('megaConteiner'); // Adicione a classe megaConteiner
});


burguer.addEventListener('click',()=>{
    menu.classList.toggle('nav-active');
    linha1.classList.toggle('linha1-active')
    linha2.classList.toggle('linha2-active')
    linha3.classList.toggle('linha3-active')
});
home.addEventListener('click' ,()=>{
    menu.classList.toggle('nav-active');
    linha1.classList.toggle('linha1-active')
    linha2.classList.toggle('linha2-active')
    linha3.classList.toggle('linha3-active')
    const targetId = home.getAttribute('href'); // Obtém o ID do alvo

  // Obtém o elemento alvo
  const targetElement = document.querySelector(targetId);
});
sobre.addEventListener('click' ,()=>{
    menu.classList.toggle('nav-active');
    linha1.classList.toggle('linha1-active')
    linha2.classList.toggle('linha2-active')
    linha3.classList.toggle('linha3-active')
    const targetId = home.getAttribute('href'); // Obtém o ID do alvo

  // Obtém o elemento alvo
  const targetElement = document.querySelector(targetId);
});
skills.addEventListener('click' ,()=>{
    menu.classList.toggle('nav-active');
    linha1.classList.toggle('linha1-active')
    linha2.classList.toggle('linha2-active')
    linha3.classList.toggle('linha3-active')
    const targetId = home.getAttribute('href'); // Obtém o ID do alvo

  // Obtém o elemento alvo
  const targetElement = document.querySelector(targetId);
});
projetos.addEventListener('click' ,()=>{
    menu.classList.toggle('nav-active');
    linha1.classList.toggle('linha1-active')
    linha2.classList.toggle('linha2-active')
    linha3.classList.toggle('linha3-active')
    const targetId = home.getAttribute('href'); // Obtém o ID do alvo
});

 var contador = 3;

function exibirImagemAnterior() {
  const imagens = document.querySelectorAll('.imagens img');
  const imagemAtiva = document.querySelector('.imagem-ativa');
  const imagemAnterior = imagemAtiva.previousElementSibling;

  if (imagemAnterior !== nul) {
    imagemAtiva.classList.remove('imagem-ativa');
    imagemAtiva.classList.add('imagem-of');

    imagemAnterior.classList.remove('imagem-of');
    imagemAnterior.classList.add('imagem-ativa');
  }
}

function exibirProximaImagem() {
  const imagens = document.querySelectorAll('.imagens img');
  const imagemAtiva = document.querySelector('.imagem-ativa');
  const proximaImagem = imagemAtiva.nextElementSibling;

  if (proximaImagem !== null) {
    imagemAtiva.classList.remove('imagem-ativa');
    imagemAtiva.classList.add('imagem-of');

    proximaImagem.classList.remove('imagem-of');
    proximaImagem.classList.add('imagem-ativa');
  }
}



  const botaoCardapio = document.querySelector('#botaoCardapio');
const ConteinerProduto = document.querySelector('#idConteinerProduto');
const quitButton = document.querySelector('#quitButton');

botaoCardapio.addEventListener('click', () => {
  ConteinerProduto.classList.toggle('conteinerProdutoOn');
});

quitButton.addEventListener('click', () => {
   
    ConteinerProduto.classList.remove('conteinerProdutoOn'); // Remova a classe megaConteinerOn
    ConteinerProduto.classList.add('conteinerProdutoOf'); // Adicione a classe megaConteiner
  });
