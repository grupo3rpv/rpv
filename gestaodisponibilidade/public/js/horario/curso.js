function getCursos(url, seletor) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        context: this,
        async: false,
        success: function(data) {
            for (var i in data) {
                addCurso(seletor, data[i]);
            }
        }
    });
}

function addCurso(seletor, curso) {
    var option = '<option value="' + curso.id_curso + '">' + curso.nome + '</option>';
    $(seletor).append(option);
}