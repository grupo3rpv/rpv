function addHorario(url, seletor, horario) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(horario),
        context: this,
        async: false,
        success: function(data) {
            addHorarioMarcado(seletor, data);
        }
    });
}

function addHorarioMarcado(seletor, horario) {
    $("#" + seletor).removeAttr("onclick");
    $("#" + seletor).empty();
    //$("#" + seletor).addClass('marc');
    var disciplina = searchDisciplina(horario.id_disciplina_curso);
    var professores = searchProfessores(horario.professores);
    $("#" + seletor).append(disciplina);
    for (var i in professores) {
        $("#" + seletor).append('<br />' + professores[i]);
    }
    $("#" + seletor).append('<br /><a class="button red small" onclick="desmarcarHorario(' + horario.id_horario + ')">X</a>');
    //alert('Horário marcado com sucesso!');
}

function removerHorario(url, idHorario) {
    console.log(url + '' + idHorario);
    $.ajax({
        url: url + '' + idHorario,
        type: "GET",
        context: this,
        async: false,
        success: function(data) {
            if (data > 0) {
                console.log('dentro do remover horario');
            }
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