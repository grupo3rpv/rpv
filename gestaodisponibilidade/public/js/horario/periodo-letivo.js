function getPeriodosLetivos(url, seletor) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addPeriodoLetivo(seletor, data[i]);
            }
        }
    });
}

function addPeriodoLetivo(seletor, periodoLetivo) {
    var option = '<option label="' + periodoLetivo.nome + '" value="' + periodoLetivo.id_periodo_letivo + '"></option>';
    $(seletor).append(option);
}