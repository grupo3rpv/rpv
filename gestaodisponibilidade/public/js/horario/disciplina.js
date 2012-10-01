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

function searchDisciplina(idDisciplina) {
    var disciplina;
    $('#disciplinas option').each(function() {
        //console.log(this);
        if (idDisciplina == $(this).val()) {
            //console.log(idDisciplina);
            //console.log($(this).text());
            disciplina = $(this).text();
            return false;
        }
    });
    //console.log(disciplina);
    return disciplina;
}