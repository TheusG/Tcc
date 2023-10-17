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