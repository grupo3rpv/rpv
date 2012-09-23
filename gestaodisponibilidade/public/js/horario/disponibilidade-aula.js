function getDisponibilidadeProfessor(url, professor) {
    $.ajax({
        url: url + '' + professor,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addDisponibilidadeProfessor(data[i]);
            }
        }
    });
}

function addDisponibilidadeProfessor(disponibilidade) {
    var seletor = '#' + disponibilidade.hora + '-' + disponibilidade.dia;
    $(seletor).addClass('disp');
}