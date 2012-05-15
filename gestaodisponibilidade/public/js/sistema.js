function adicionaAreaInteresse(){
    $("#id_area_professor").append('<option value="'+$("#id_area option:selected").val()+'" label="'+$("#id_area option:selected").text()+'">'+$("#id_area option:selected").text()+'</option>');
}

function selecionarTodosElementos() {
    $("#id_area_professor option").attr({selected : "selected"});
}