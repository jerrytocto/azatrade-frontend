<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Paginador con JSON</title>
</head>

<body>
	<div class="row">
        <div class="page-header">
            <h1>Pruebas de JSON con paginador</h1>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido P</th>
                    <th>Apellido M</th>
                </tr>
            </thead>
            <tbody id="listado">
            </tbody>
        </table>
        <div id="botones" class="btn-group btn-group-xs" 
             role="group" arial-label="grupo">
        </div>
    </div>
    
</div>


<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script 
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    var json = [
        {'nombre':'Fernando','paterno':'Magrosoto','materno':'Vásquez'},
        {'nombre':'Horacio','paterno':'González','materno':'Sodi'},
        {'nombre':'Norberto','paterno':'Ruvalcaba','materno':'Hortenciales'},
        {'nombre':'Alfonso','paterno':'López','materno':'Smith'},
        {'nombre':'Gustavo','paterno':'Vergara','materno':'Algeciras'},
        {'nombre':'Alfredo','paterno':'García','materno':'Raymond'},
        {'nombre':'Jacinto','paterno':'Maldonado','materno':'Heta'},
        {'nombre':'Carlitos','paterno':'Sánchez','materno':'Polies'},
        {'nombre':'Facundo','paterno':'Malahierba','materno':'Peps'},
        {'nombre':'Polo','paterno':'Pérez','materno':'Valderrama'},
        {'nombre':'Fernando','paterno':'Magrosoto','materno':'Vásquez'},
        {'nombre':'Horacio','paterno':'González','materno':'Sodi'},
        {'nombre':'Norberto','paterno':'Ruvalcaba','materno':'Hortenciales'},
        {'nombre':'Alfonso','paterno':'López','materno':'Smith'},
        {'nombre':'Gustavo','paterno':'Vergara','materno':'Algeciras'},
        {'nombre':'Alfredo','paterno':'García','materno':'Raymond'},
        {'nombre':'Jacinto','paterno':'Maldonado','materno':'Heta'},
        {'nombre':'Carlitos','paterno':'Sánchez','materno':'Polies'},
        {'nombre':'Facundo','paterno':'Malahierba','materno':'Peps'},
        {'nombre':'Polo','paterno':'Pérez','materno':'Valderrama'}
    ];
    
    var pag = 1;
    var totales = json.length;

    var xPag = 8;

    //Condicion si json tiene menos registros que los requistros por pagina deseados
    if(totales<xPag){
	xPag = totales;
    }

    var nPag = Math.ceil(totales / xPag);
    var offset = (pag - 1) * xPag;


    var hasta = pag * xPag;


    
    function mostrarLista(desde,hasta){
        var lista = '';
        for(var i = desde; i < hasta; i++){

            var fila = '';
            fila += "<tr>";
            fila += "<td>"+json[i].nombre+"</td>";
            fila += "<td>"+json[i].paterno+"</td>";
            fila += "<td>"+json[i].materno+"</td>";
            fila += "</tr>";
            lista += fila;
        }
        $('#listado').html(lista);
    }
    
    function mostrarBotones(t){
        var botones = '';
        for(var i = 0; i < t; i++){
            var cada = '';
            cada = "<button type='button' "+
                "class='btn btn-info'>"+(i+1)+
                "</button>";
            botones += cada;
        }
        
        $('#botones').append(botones);
    }
    
    function quitarActivo(){
        var losBotones = document.querySelectorAll('#botones button');
        for(var i = 0; i < losBotones.length; i++){
            $(losBotones[i]).removeClass('active');
        }
    }
    
    mostrarLista(offset,hasta);
    mostrarBotones(nPag);
    

    $( document ).ready(function(){
        // Activar el primer botón
        $('#botones button:first-child').addClass('active');
        
        // Poner oyentes a cada botón
        var losBotones = document.querySelectorAll('#botones button');
        for(var i = 0; i < losBotones.length; i++){
            losBotones[i].addEventListener('click',function(){
                quitarActivo();
                var indice = parseInt(this.textContent);


                var o = (indice -1) * xPag;
var paginador=Math.ceil(totales/xPag);
var saldo=totales%xPag;

	var h;
if(paginador===indice){
h=(indice * xPag) - saldo;}else{
h = indice * xPag;
}

          mostrarLista(o,h);
                $(this).addClass('active');
            });
        }
    });
    
</script>
</body>
</html>


    