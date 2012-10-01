function addHorario(url, seletor, horario) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(horario),
        context: this,
        async: true,
        success: function(data) {
            if (data.horarioValido == true) {
                addHorarioMarcado(seletor, data);
            } else {
                $("#" + seletor).empty();
                alert('Professor já está alocado neste horário');
            }
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
    $("#" + seletor).append('<br /><a class="button red small" onclick="desmarcarHorario(' + horario.id_horario + ', \'' + seletor + '\')">X</a>');
    //alert('Horário marcado com sucesso!');
}

function removerHorario(url, idHorario, seletor) {
    console.log('url: ' + url);
    console.log('idHorario: ' + idHorario);
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(idHorario),
        context: this,
        async: true,
        success: function(data) {
            if (data > 0) {
                $("#" + seletor).attr('onclick', 'marcarHorario(this.id)');
                $('#' + seletor).empty();
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