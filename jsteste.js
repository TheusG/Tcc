const botoesCardapio = document.querySelectorAll('.botaodoscrias');
const ConteinerProduto = document.querySelector('#idConteinerProduto');
const quitButton = document.querySelector('#quitButton');

botoesCardapio.forEach(botao => {
  botao.addEventListener('click', () => {
    ConteinerProduto.classList.toggle('conteinerProdutoOn');
  });
});

quitButton.addEventListener('click', () => {
  ConteinerProduto.classList.remove('conteinerProdutoOn');
  ConteinerProduto.classList.add('conteinerProdutoOf');
});