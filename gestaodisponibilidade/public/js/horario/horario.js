function addHorario(url, seletor, horario) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(horario),
        context: this,
        async: true,
        success: function(data) {
            $("#" + seletor).empty();
            if (data.horarioValido == true) {
                addHorarioMarcado(seletor, data);
            } else {
                alert('Professor já está alocado neste horário');
            }
        }
    });
}

function addHorarioMarcado(seletor, horario) {
    $("#" + seletor).removeAttr("onclick");
    //$("#" + seletor).addClass('marc');
    var disciplina = searchDisciplina(horario.id_disciplina_curso);
    //console.log(horario.professores);
    var professores = searchProfessores(horario.professores);
    $("#" + seletor).append(disciplina);
    for (var i in professores) {
        //console.log(professores[i]);
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

function getHorarios(url, periodoLetivo, curso, turma) {
//    console.log('url: ' + url);
//    console.log('Periodo letivo: ' + periodoLetivo);
//    console.log('Curso: ' + curso);
//    console.log('Turma: ' + turma);
    var dados = {'periodoLetivo' : periodoLetivo,
        'curso' : curso,
        'turma' : turma}
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(dados),
        context: this,
        async: true,
        success: function(data) {
            for (var i in data) {
                console.log(data[i]);
                var seletor = extractSeletor(data[i]);
                console.log(seletor);
                addHorarioMarcado2(seletor, data[i]);
            }
        }
    });
}

function addHorarioMarcado2(seletor, horario) {
    $("#" + seletor).removeAttr("onclick");
    var disciplina = searchDisciplina(horario.id_disciplina_curso);
    $("#" + seletor).append(disciplina);
    for (var i in horario.professores) {
        $("#" + seletor).append('<br />' + horario.professores[i].nome);
    }
    $("#" + seletor).append('<br /><a class="button red small" onclick="desmarcarHorario(' + horario.id_horario + ', \'' + seletor + '\')">X</a>');
}

function extractSeletor(horario) {
    var horaInicial = horario.hora_inicial.split(':');
    return horaInicial[0] + '-' + horario.dia;
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