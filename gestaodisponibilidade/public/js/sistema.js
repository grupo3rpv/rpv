function adicionaAreaInteresse(){
    area = true;
    $("#id_area_professor > option").each(function() {
        if (this.value == $("#id_area option:selected").val()) {
            alert("Área já informada!");
            area = false;
        }
    });
    if (area) {
        $("#id_area_professor").append('<option value="'+$("#id_area option:selected").val()+'" label="'+$("#id_area option:selected").text()+'">'+$("#id_area option:selected").text()+'</option>');
    }
}

function removerAreaInteresse(){
    $("#id_area_professor > option:selected").remove();
}

function selecionarTodosElementos() {
    $("#id_area_professor option").attr({
        selected : "selected"
    });
}