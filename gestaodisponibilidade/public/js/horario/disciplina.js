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
    var option = '<option value="' + disciplina.id_disciplina + '">' + disciplina.nome + '</option>';
    $(seletor).append(option);
}