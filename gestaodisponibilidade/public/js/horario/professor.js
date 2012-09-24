function getProfessores(url, seletor, disciplina) {
    $.ajax({
        url: url + '' + disciplina,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addProf(seletor, data[i]);
            }
        }
    });
}

function addProf(seletor, professor) {
    var option = '<option value="' + professor.id_usuario + '">' + professor.nome + ' - ' + professor.nivel_interesse + '</option>';
    $(seletor).append(option);
}