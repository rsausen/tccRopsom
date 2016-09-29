$(function() {
  $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
function setCollapse() {
  var url = window.location;
  var element = $('ul.nav a').filter(function() {
    return this.href == url;
  }).addClass('active').parent();

  while (true) {
    if (element.is('li')) {
      element = element.parent().addClass('in').parent();
    } else {
      break;
    }
  }
};

function setSize() {
  var topOffset = 50;
  var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  if (width < 768) {
    $('div.navbar-collapse').addClass('collapse');
    topOffset = 100; 
  } else {
    $('div.navbar-collapse').removeClass('collapse');
  }
  var height = ((window.innerHeight > 0) ? window.innerHeight : screen.height) - 1;
  height = height - $('#navbar-top').height();
  if (height < 1) height = 1;
  if (height > topOffset) {
    $("#page-wrapper").css("min-height", (height) + "px");
  }
};


$('#entrada').mask('00:00');
$('#saida').mask('00:00');
$('#hora').mask('00:00');
$('#data').mask('00/00/0000');
$('#dataEntrada').mask('00/00/0000');
$('#dataSaida').mask('00/00/0000');
$('#dt').mask('00/00/0000');
$('#cnpj').mask('00.000.000/0000-00');
$('#telefone').mask('(00) 0000-0000');


$('#valor').maskMoney({thousands:'.',decimal:','});

$('select[name=estado_id]').change(function () {
  var id = $(this).val();
  $.ajax({
    url: "/getCidades/"+id+"/",
    type: "get",
    success: function (cidades) {
      $('select[name=cidade_id]').empty();
      $.each(cidades, function (key, value) {
        $('select[name=cidade_id]').append('<option value=' + value.id + '>' + value.nome + '</option>');
      });
    },

    error: function(data){
      alert('Erro!');
    }
  });
});

/*$(function(){
  $.datepicker.regional['pt-BR'] = {
    closeText: 'Fechar',
    prevText: '&#x3c;Anterior ',
    nextText: ' Pr&oacute;ximo&#x3e;',
    currentText: 'Hoje',
    monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
    'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
    'Jul','Ago','Set','Out','Nov','Dez'],
    dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
    dayNamesMin: ['D','S','T','Q','Q','S','S'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
  });
 // Função Datepicker chama a primeira que faz a conversão para português
 $(function() {
  $( "#datepicker" ).datepicker( $.datepicker.regional[ "pt-BR" ]);
  $( "#datepicker2" ).datepicker( $.datepicker.regional[ "pt-BR" ]);
});

*/
function ConfirmDelete()
{
  var x = confirm("Tem certeza que deseja excluir este item?");
  if (x)
    return true;
  else
    return false;
}

function ConfirmCreate()
{
  var x = confirm("Cadastrado com sucesso.");
  if (x)
    return true;
  else
    return false;
}

function ConfirmEdit()
{
  var x = confirm("Editado com sucesso.");
  if (x)
    return true;
  else
    return false;
}
