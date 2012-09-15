function Evento () {
    
    this.idEvento = 0;
    this.titulo = '';
    this.dataInicial = null;
    this.dataFinal = null;
    this.hora1 = null;
    this.hora2 = null;
    this.privado = false;
    
    this.construct = function (idEvento, titulo, dataInicial, dataFinal, hora1, hora2) {
        this.idEvento = idEvento;
        this.titulo = titulo;
        this.dataInicial = dataInicial; //converteDataDBToPTBR(dataInicial);
        this.dataFinal = dataFinal; //converteDataDBToPTBR(dataFinal);
        this.hora1 = hora1;
        this.hora2 = hora2;
    }
    
    this.setIdEvento = function (idEvento) {
        this.idEvento = idEvento;
    }
    
    this.setTitulo = function (titulo) {
        this.titulo = titulo;
    }
    
    this.setDataInicial = function (dataInicial) {
        //this.dataInicial = converteDataDBToPTBR(dataInicial);
        this.dataInicial = dataInicial;
    }
    
    this.setDataFinal = function (dataFinal) {
        //this.dataFinal = converteDataDBToPTBR(dataFinal);
        this.dataFinal = dataFinal;
    }
    
    this.setHora1 = function (hora1) {
        this.hora1 = hora1;
    }
    
    this.setHora2 = function (hora2) {
        this.hora2 = hora2;
    }
    
    this.setPrivado = function (privado) {
        this.privado = privado;
    }
    
    this.emString = function () {
        return this.idEvento + ", " + this.titulo + ", " + this.dataInicial + ", " 
        + this.dataFinal + ", " + this.hora1 + ", " + this.hora2;
    }
}

function EventosT() {
    this.eventos = new Array();
    
    this.addEvento = function (evento) {
        this.eventos.push(evento);
    };
    
    this.removeEvento = function(position) {
        this.eventos.splice(position, 1);
    };
}

var EventosR = {
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

function getMinuto(hora) {
    var array = hora.split(":");
    return array[1];
}

function getHoraInt(hora) {
    var array = hora.split(":");
    if (array[0].charAt(0) == '0') {
        return parseInt(array[0].charAt(1));
    } else {
        return parseInt(array[0]);
    }
}