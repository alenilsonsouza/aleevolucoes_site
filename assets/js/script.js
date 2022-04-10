$(function(){

/*Ação do menu*/
$('.btMenu').click(function(){
  $('#menu').toggle();
});

	/* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           
           $.ajax({
                url : BASE_URL+'ajax/consultar_cep',  
                type : 'POST', 
                data: 'cep=' + $('#cep').val(), 
                dataType: 'json', 
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua').val(data.rua);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#estado').val(data.estado);
 
                        $('#numero').focus();
                    }
                }
           });   
   return false;    
   })


//Abrir Orçamento
$('.abrirPop').click(function(){
  $('#areaOrcamento').attr('style','display:flex');
});
$('#fecharPop').click(function(){
  $('#areaOrcamento').hide();
});
$('.btFecharResposta').click(function(){
  $('.respostaBox').hide();
});

//Carregar Dúvida
if($('#duvidasConteudo')[0]){
  carregarDuvida();
}

//Pesquisa
$('#pesquisaDuvida').keyup(function(){

  let texto = $(this).val();
  console.log(texto);
  if(texto.length > 2){
    carregarDuvida('', texto);
  }else{
    carregarDuvida();
  }
});

function carregarDuvida(pagina='', pesquisa=''){

  $.ajax({
    url: BASE_URL+'ajax/pesquisaduvida',
    data:{p:pagina, pesquisa:pesquisa},
    beforeSend:function(){},
    success:function(r){
      $('#duvidasConteudo').html(r);
    },
    complete:function(){

      //Abrir a resposta da dúvida
      $('.itemDuvida').click(function(){
        $(this).find('.respostaDuvida').toggle();
        $(this).find('.setaAbrir').toggleClass('girarseta');
      });

      //Paginação
      $('.pag').click(function(){
        let pagina = $(this).attr('data-p');
        carregarDuvida(pagina,'');
      });
    }
  });
}
//Deslize de Evoluções
$(".desliz").click(function (event) {

    event.preventDefault();

    let idElemento = $(this).attr("href");

    let deslocamento = $(idElemento).offset().top;

    $('html, body').animate({ scrollTop: deslocamento }, 'slow');

  });
//Deixar Menu Fixo ao rolar    
$(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
        $('#topo').addClass("f-nav");
    } else {
        $('#topo').removeClass("f-nav");
    }
});
});

let btCloseEl = document.querySelector('#btFecharModal');
let modalEl = document.querySelector('.modalFormResult');

if(btCloseEl && modalEl) {
  btCloseEl.addEventListener('click', ()=>{
    modalEl.remove();
  });
}