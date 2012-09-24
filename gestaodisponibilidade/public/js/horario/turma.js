function getTurmas(url, seletor) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addTurma(seletor, data[i]);
            }
        }
    });
}

function addTurma(seletor, turma) {
    var option = '<option value="' + turma.id_turma + '">' + turma.nome + '</option>';
    $(seletor).append(option);
}