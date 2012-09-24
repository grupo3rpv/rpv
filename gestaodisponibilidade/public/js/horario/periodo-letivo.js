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
    var option = '<option value="' + periodoLetivo.id_periodo_letivo + '">' + periodoLetivo.nome + '</option>';
    $(seletor).append(option);
}