const botaoCardapio = document.querySelector('#botaoCardapio');
const ConteinerProduto = document.querySelector('#idConteinerProduto');

botaoCardapio.addEventListener('click', () => {
  ConteinerProduto.classList.toggle('conteinerProdutoOn');
});