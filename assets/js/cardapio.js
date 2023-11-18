const menu = document.querySelector('.nav-links');
const burguer = document.querySelector('.burguer');
const linha1 = document.querySelector('#linha1');
const linha2 = document.querySelector('#linha2');
const linha3 = document.querySelector('#linha3');


// const home = document.querySelector('#home')
// const sobre = document.querySelector('#sobre')
// const skills = document.querySelector('#skills')
// const projetos = document.querySelector('#projetos')

const loginbutton2 = document.querySelector('#abrirLogin2');
const loginbutton = document.querySelector('#abrirLogin');
const login = document.querySelector('.megaConteiner');
const exitbutton = document.querySelector('#exitButtonn');

const botaoConfirmarCompra = document.querySelector('#botaoCarrinho');
const miniCarrinho = document.querySelector('.miniCarrinhoOf');

// $('#exibirProd').fadeOut(0);
// function exibirProduto(codigo){
//   $('#exibirProd').fadeIn(500);
//   $.ajax({
//     // Type tava post antes 
//     type: "post",
//     url: "confirmarPedido.php?Id_Produto="+codigo,
//     success: function (response) {
//       $('#exibirProd').html(response);    
//     }
//   });

// }

// exibir = document.querySelector('#exibirProd');
// $('#exibirProd').click(function (e) { 
//   e.preventDefault();
//   $(this).fadeOut(500);
// });

botaoConfirmarCompra.addEventListener('click', () => {
  miniCarrinho.classList.toggle('miniCarrinhoOn');

});

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


burguer.addEventListener('click', () => {
  menu.classList.toggle('nav-active');
  linha1.classList.toggle('linha1-active')
  linha2.classList.toggle('linha2-active')
  linha3.classList.toggle('linha3-active')
});
