function getDisciplinasByCurso(url, seletor, curso) {
    $.ajax({
        url: url + '' + curso,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addDisciplina(seletor, data[i]);
            }
        }
    });
}

function addDisciplina(seletor, disciplina) {
    var option = '<option label="' + disciplina.nome + '" value="' + disciplina.id_disciplina + '"></option>';
    $(seletor).append(option);
}