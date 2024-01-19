
//Verificaçao do Modo de ediçao de dados
    if (edit){
        document.getElementsByClassName('insert')[0].style.display='none';
        document.getElementsByClassName('insert')[2].style.display='block';
    }
    else{
        document.getElementsByClassName('insert')[0].style.display='block';
        document.getElementsByClassName('insert')[2].style.display='none';
    }
//Carregamento dos dados na Home
    document.getElementsByClassName('dados')[0].innerHTML=totalCirurgiao;
    document.getElementsByClassName('dados')[1].innerHTML=totalCirurgiao;
    document.getElementsByClassName('dados')[2].innerHTML=totalPaciente;
    document.getElementsByClassName('dados')[3].innerHTML=totalAmbulatoriais+totalComplexas;

//Controlo do tipo de Consulta a ser adicionada
x = document.getElementById("tOpera")
x.onblur = tipo;
function tipo(){
    a = document.getElementById("tOpera").value
    y = document.getElementById("ambulatoriais")
    z = document.getElementById("complexas")
    if(a=="ambulatoriais"){
        z.style.display="none"
        y.style.display="block"
    }else{
        y.style.display="none"
        z.style.display="block"
    }
}
//Controlo das TAB de navegaçao
function openCity(evt, insertName) {
          var i, x, tablinks;
          x = document.getElementsByClassName("insert");
          for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
          }
          tablinks = document.getElementsByClassName("tab");
          for (i = 0; i < x.length; i++) {
              tablinks[i].className = tablinks[i].className.replace("w3-dark-grey", "");
          }
          document.getElementById(insertName).style.display = "block";
          evt.currentTarget.className += " w3-dark-grey";
}

function menuview(){
  document.getElementsByClassName("aside")[0].style.display="block";
}