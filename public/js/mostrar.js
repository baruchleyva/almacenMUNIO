function mostrarHora(){
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();

    horaImprimible= hora + " : " + minuto + " : " + segundo;

    document.getElementById('mostrarHora').innerHTML = horaImprimible;
}