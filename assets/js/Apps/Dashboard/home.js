$(document).ready(function () {

    /*
    *
    * Initialization
    *
    * */
    $('select').formSelect();
    M.AutoInit();

    $('.material_select_2').formSelect('destroy');
    $('.material_select_2').select2({
        placeholder: "Nome do aluno"
    });

    $('.select2-container').css('width', '100%', '!important');
    $('.select2-container').css('margin-top', '-19px', 'important');
    $('.select2-container--default .select2-selection--multiple').css('border', 'solid grey 0px', 'important');
    $('.select2-container').css('border-bottom', 'solid #aaa 1px', 'important');
    $('.material_select_2').trigger('change.select2');



    /*
    *
    * Functions
    *
    * */

    function validateFields(className)
    {
        var isValid = true;
        var classN = '.' + className;

        $(classN).each(function () {
            if ($(this).is("input")) {
                if ($(this).val() == '' || $(this).val() == ' ') {
                    return isValid = false;
                }
            }

            if ($(this).is("select")) {
                if ($(this).val() == '' || $(this).val() == null) {
                    return isValid = false;
                }
            }

        });
        return isValid;
    }

    function loadFilters()
    {

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/dashboard/load_filters/',
            success: function(responseData) {
                $.each(responseData['disciplinas'], function(i, item){
                    $('#disciplina-nota-aluno').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('#disciplina-comparativo').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('#disciplina-media').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('#disciplina-questoes').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');

                });

                $.each(responseData['cursos'], function(i, item){
                    $('#curso-comparativo').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('#curso-media').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('#curso-questoes').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                });

                $('.select-all').formSelect();
            },
            error: function(e) {
                M.toast({html: 'Opsss, ocorreu um erro!', displayLength: 3000});
            }
        });

    }

    function highchartsAlunoP1xP2(nomeAluno,prova1,prova2)
    {

        Highcharts.chart('aluno-p1-p2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Nota P1 x P2'
            },
            subtitle: {
                text: 'Comparativo de desempenho do aluno nas provas'
            },
            xAxis: {
                categories: [
                    nomeAluno
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Notas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Prova 1',
                data: [prova1]

            }, {
                name: 'Prova 2',
                data: [prova2]

            }]
        });

    }

    function highchartsComparativoTurma(TurmaA,TurmaB)
    {

        var categories = [
            'Turmas'
        ];


        Highcharts.chart('comparativo-turmas', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Comparativos entre Turmas'
            },
            subtitle: {
                text: 'Baseado na média das turmas'
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                }
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value);
                    }
                }
            },

            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        'Média notas: ' + Math.abs(this.point.y);
                }
            },

            series: [{
                name: 'Turma A',
                data: [
                    TurmaA
                ]
            }, {
                name: 'Turma B',
                data: [
                    TurmaB
                ]
            }]
        });
    }

    function highchartsMediaTurma(Turma, Dif)
    {

        Highcharts.chart('media-turma', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Média Notas<br> Turma',
                align: 'center',
                verticalAlign: 'middle',
                y: 40
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:.1f}</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Nota',
                innerSize: '50%',
                data: [
                    ['Média', Turma],
                    {
                        name: 'Other',
                        y: Dif,
                        dataLabels: {
                            enabled: false
                        }
                    }
                ]
            }]
        });

    }

    function highchartsComparacaoQuestoes(Certas, Erradas, Categories)
    {

        Highcharts.chart('questoes-certas-erradas', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Questões'
            },
            subtitle: {
                text: 'Erros e acertos'
            },
            xAxis: {
                categories: Categories,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Questão {point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Acertos',
                data: Certas

            }, {
                name: 'Erros',
                data: Erradas

            }]
        });

    }

    /*
    *
    * Process and actions
    *
    * */

    loadFilters();



    // --------------------------------------------------Filtros dos gráficos
    $("#open-search-aluno").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-aluno-p1-p2').removeClass('hide');
        $('#close-search-aluno').removeClass('hide');
    });

    $("#close-search-aluno").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-aluno-p1-p2').addClass('hide');
        $('#open-search-aluno').removeClass('hide');
    });


    $("#open-search-comparativo-turmas").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-comparativo-turma').removeClass('hide');
        $('#close-search-comparativo-turmas').removeClass('hide');
    });

    $("#close-search-comparativo-turmas").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-comparativo-turma').addClass('hide');
        $('#open-search-comparativo-turmas').removeClass('hide');
    });


    $("#open-search-media-turmas").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-media-turma').removeClass('hide');
        $('#close-search-media-turmas').removeClass('hide');
    });

    $("#close-search-media-turmas").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-media-turma').addClass('hide');
        $('#open-search-media-turmas').removeClass('hide');
    });

    $("#open-search-questoes-turmas").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-questoes-turma').removeClass('hide');
        $('#close-search-questoes-turmas').removeClass('hide');
    });

    $("#close-search-questoes-turmas").on('click', function(){
        $(this).addClass('hide');
        $('#filtro-questoes-turma').addClass('hide');
        $('#open-search-questoes-turmas').removeClass('hide');
    });



    // --------------------------------------------------Grafico do comparativo entre a nota do aluno na P1 x P2
    highchartsAlunoP1xP2('Selecione Aluno',0.00,0.00);

    $("#search-aluno").on('click', function(){
        if(validateFields('validate-aluno-p1-p2')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/dashboard/notas_aluno_provas',
                data: {
                    idAluno: $('#choose-aluno').val(),
                    idDisciplina: $('#disciplina-nota-aluno').val()
                },
                success: function(responseData){
                    highchartsAlunoP1xP2(responseData['nomeAluno'],responseData['prova1'],responseData['prova2']);
                },
                error: function(e){
                    M.toast({html: 'Opsss, ocorreu um erro!', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos!', displayLength: 3000});
        }
    });



    // --------------------------------------------------Comparativo entre duas turmas
    highchartsComparativoTurma(0.00,0.00);

    $("#search-comp-turma").on('click', function(){
        if(validateFields('validate-comparativo-turma')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/dashboard/notas_comparativo_turmas',
                data: {
                    idDisciplina: $('#disciplina-comparativo').val(),
                    idCurso: $('#curso-comparativo').val(),
                    periodoA: $('#periodo-comparativo1').val(),
                    oficialA: $('#official-comparativo1').val(),
                    anoA: $('#ano-comparativo1').val(),
                    semestreA: $('#semestre-comparativo1').val(),
                    periodoB: $('#periodo-comparativo2').val(),
                    oficialB: $('#official-comparativo2').val(),
                    anoB: $('#ano-comparativo2').val(),
                    semestreB: $('#semestre-comparativo2').val(),
                    type: 'Comp'
                },
                success: function(responseData){
                    var turma1 = parseFloat(responseData['turma1']) * -1;
                    var turma2 = parseFloat(responseData['turma2']);
                    highchartsComparativoTurma(turma1,turma2);
                },
                error: function(e){
                    M.toast({html: 'Opsss, ocorreu um erro!', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos!', displayLength: 3000});
        }
    });


    // --------------------------------------------------Média da turma
    highchartsMediaTurma(0.00,0.00);

    $("#search-media-turmas").on('click', function(){
        if(validateFields('validate-media-turma')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/dashboard/notas_comparativo_turmas',
                data: {
                    idDisciplina: $('#disciplina-media').val(),
                    idCurso: $('#curso-media').val(),
                    periodo: $('#periodo-media').val(),
                    oficial: $('#official-media').val(),
                    ano: $('#ano-media').val(),
                    semestre: $('#semestre-media').val(),
                    type: 'Media'
                },
                success: function(responseData){
                    var turma1 = parseFloat(responseData['turma1']);
                    var dif = 10 - turma1;
                    highchartsMediaTurma(turma1, parseFloat(dif));
                },
                error: function(e){
                    M.toast({html: 'Opsss, ocorreu um erro!', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos!', displayLength: 3000});
        }
    });



    // --------------------------------------------------Questões certas por questões erradas
    highchartsComparacaoQuestoes(0, 0, 0);

    $("#search-questoes-turmas").on('click', function(){
        if(validateFields('validate-questoes-turma')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/dashboard/respostas_certas_erradas',
                data: {
                    idDisciplina: $('#disciplina-questoes').val(),
                    idCurso: $('#curso-questoes').val(),
                    periodo: $('#periodo-questoes').val(),
                    oficial: $('#official-questoes').val(),
                    ano: $('#ano-questoes').val(),
                    semestre: $('#semestre-questoes').val(),
                    type: 'Media'
                },
                success: function(responseData){
                    highchartsComparacaoQuestoes(responseData['certas'], responseData['erradas'], responseData['count']);
                },
                error: function(e){
                    M.toast({html: 'Opsss, ocorreu um erro!', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos!', displayLength: 3000});
        }
    });


});