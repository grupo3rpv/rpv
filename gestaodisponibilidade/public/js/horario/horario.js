function addHorario(url, seletor, horario) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(horario),
        context: this,
        async: false,
        success: function(data) {
            $("#" + seletor).addClass('marc');
        }
    });
}

function Horario () {
    
    this.periodoLetivo = 0;
    this.curso = 0;
    this.turma = 0;
    this.disciplina = 0;
    this.professores = new Array();
    this.dia = null;
    this.horaInicial = null;
    this.horaFinal = null;
    
    this.addProfessor = function (professor) {
        this.professores.push(professor);
    }
}