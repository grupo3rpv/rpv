var Evento = {
    
    idEvento : 0,
    titulo : '',
    dataInicial : null,
    dataFinal : null,
    hora1 : null,
    hora2 : null,
    
    construct : function (idEvento, titulo, dataInicial, dataFinal, hora1, hora2) {
        this.idEvento = idEvento;
        this.titulo = titulo;
        this.dataInicial = converteDataDBToPTBR(dataInicial);
        this.dataFinal = converteDataDBToPTBR(dataFinal);
        this.hora1 = hora1;
        this.hora2 = hora2;
    },
    
    setIdEvento : function (idEvento) {
        this.idEvento = idEvento;
    },
    
    setTitulo : function (titulo) {
        this.titulo = titulo;
    },
    
    setDataInicial : function (dataInicial) {
        this.dataInicial = converteDataDBToPTBR(dataInicial);
    },
    
    setDataFinal : function (dataFinal) {
        this.dataFinal = converteDataDBToPTBR(dataFinal);
    },
    
    setHora1 : function (hora1) {
        this.hora1 = hora1;
    },
    
    setHora2 : function (hora2) {
        this.hora2 = hora2;
    },
    
    emString : function () {
        return this.idEvento + ", " + this.titulo + ", " + this.dataInicial + ", " 
        + this.dataFinal + ", " + this.hora1 + ", " + this.hora2;
    }
}

var Eventos = {
    eventos : new Array(),
    
    addEvento : function (evento) {
        this.eventos.push(evento);
    },
    
    removeEvento : function(position) {
        this.eventos.splice(position, 1);
    }
}

function converteDataDBToPTBR(data) {
    data = data.replace(/\"/g, "");
    var array = data.split("-");
    var day = array[2];
    var month = array[1];
    var year = array[0];
    return day + '/' + month + '/' + year;
}

function getDia(data) {
    var array = data.split("/");
    return array[0];
}

function getHora(hora) {
    var array = hora.split(":");
    return array[0];
}

function getHoraInt(hora) {
    var array = hora.split(":");
    if (array[0].charAt(0) == '0') {
        return array[0].charAt(1);
    } else {
        return array[0];
    }
}