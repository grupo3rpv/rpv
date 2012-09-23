function getProfessores(url, seletor, disciplina) {
    $.ajax({
        url: url + '' + disciplina,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addProfessor(seletor, data[i]);
            }
        }
    });
}

function addProfessor(seletor, professor) {
    var option = '<option label="' + professor.nome + ' - ' + professor.nivel_interesse + '" value="' + professor.id_usuario + '"></option>';
    $(seletor).append(option);
}