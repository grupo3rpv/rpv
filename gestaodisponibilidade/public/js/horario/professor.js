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

function searchProfessores(professores) {
    var profs = new Array();
    for (var i in professores) {
        $('#professores option').each(function() {
            //console.log(this);
            //console.log(professores[i].id_usuario);
            if (professores[i].id_usuario == $(this).val()) {
                //console.log($(this).text());
                profs.push($(this).text());
                return false;
            }
        });
    }
    console.log(profs);
    return profs;
}