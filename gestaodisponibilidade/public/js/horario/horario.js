function addHorario(url, seletor, horario) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: horario,
        context: this,
        async: false,
        success: function() {
            
        }
    });
}

function Horario () {
    
    this.periodoLetivo = 0;
    this.curso = 0;
    this.turma = 0;
    this.disciplina = 0;
    this.professores = null;
    this.dia = null;
    this.horaInicial = null;
    this.horaFinal = null;
    
    this.construct = function (periodoLetivo, curso, turma, disciplina, professores, dia, horaInicial, horaFinal) {
        this.periodoLetivo = periodoLetivo;
        this.curso = curso;
        this.turma = turma;
        this.disciplina = disciplina;
        this.professores = professores
        this.dia = dia;
        this.horaInicial = horaInicial;
        this.horaFinal = horaFinal;
    }
}