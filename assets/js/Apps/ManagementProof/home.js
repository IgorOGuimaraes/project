$(document).ready(function () {
    /*
    * Initialization
    * */
    var datatable_prova = $('#table_prova');
    var id_gabarito = null;

    //Initialization datepicker
    var datepicker_element = document.querySelectorAll('.datepicker');
    M.Datepicker.init(
        datepicker_element, (
            {
                container: 'body',
                'format': 'yyyy-mm-dd',
                'autoClose': true,
                'showClearBtn': true
            }
        ));

    $('select').formSelect();


    /*
    * Functions
    * */
    function loadDatatableProvas() {
        datatable_prova.dataTable().fnDestroy();
        datatable_prova.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementProof/load_prova/",
            responsive: false,
            columns: [
                {data: "Prova Oficial"},
                {data: "Versão de Prova"},
                {data: "Data Prova"},
                {data: "Periodo"},
                {data: "Ano"},
                {data: "Semestre"},
                {data: "Excluir"},
                {data: "Editar"}
            ],
            dom: 'frtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                'lengthMenu': "_MENU_"
            },
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    input.setAttribute("Placeholder","Filter");
                    $(input).appendTo($(column.footer()).empty())
                        .on('keyup change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });

        $('#table_prova_wrapper').css('width', '100%', 'important');
        $('#table_prova_filter').css('width', '100%', 'important');
        $('#table_prova_filter').css('text-align', 'left');
    }

    function loadDisciplinaCurso()
    {

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementProof/load_disciplina_curso/',
            success: function (responseData){
                $.each(responseData['disciplina'], function (i, item) {
                    $('#disciplina_proof').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                });

                $.each(responseData['curso'], function (i, item) {
                    $('#curso_proof').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                });

                $('select').formSelect();
            },
            error: function () {
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });

    }

    function validateFields(className)
    {
        var class_name = '.' + className;
        var valid = true;

        $(class_name).each(function () {
            if($(this).is('input')){
                if($(this).val() == '' || $(this).val() == ' '){
                    return valid = false;
                }
            }
        });

        $(class_name).each(function () {
            if($(this).is('select')){
                if($(this).val() == '' || $(this).val() == ' ' || $(this).val() == null || parseFloat($(this).val()) == 0.00){
                    return valid = false;
                }
            }
        });

        return valid;
    }



    /*
    * Process
    * */
    loadDatatableProvas();
    loadDisciplinaCurso();

    $('#proof-button').on('click', function () {
        $('#modal-new-prova').css('width', '100%', '!important');
        $('#modal-new-prova').css('height', '100%', '!important');
        $('#modal-new-prova').css('max-height', '100%', '!important');
        $('#modal-new-prova').css('top', '0px', '!important');
    });

    $('#gerar-gabarito').on('click', function () {
        if(validateFields('validate-gabarito-proof')){
            var qtd_questoes = $('#questoes_proof').val();
            var qtd_alternativas = $('#alternativas_proof').val();
            var i = 1;
            var j = 0;
            var letter = ['A', 'B', 'C', 'D', 'E'];

            $('#div_render_gabarito').empty();

            while (i <= qtd_questoes) {
                $('#div_render_gabarito').append('<div class="col s12 m6 l6 offset-m3 offset-l3">' +
                    '<div class="input-field col s3 m3 l3">' +
                    '    <input id="disabled" type="text" value="' + i + '" disabled>' +
                    '   <label for="disabled">Questão</label>' +
                    '</div>' +
                    '<div class="input-field col s6 m6 l6">' +
                        '<select id="resposta_questao_' + i + '" name="resposta_questao[]" class="validate-new-proof">' +
                            '<option value="" disabled selected>Choose option</option>' +
                        '</select>' +
                        '<label>Alternativas</label>' +
                    '</div>' +
                    '<div class="input-field col s3 m3 l3">' +
                    '   <select id="peso_proof_' + i + '" name="peso_proof[]" class="validate-new-proof peso_proof_calc">\n' +
                    '       <option value="0.00" selected>0.00</option>\n' +
                    '       <option value="0.25">0.25</option>\n' +
                    '       <option value="0.50">0.50</option>\n' +
                    '       <option value="0.75">0.75</option>\n' +
                    '       <option value="1.00">1.00</option>\n' +
                    '       <option value="1.25">1.25</option>\n' +
                    '       <option value="1.50">1.50</option>\n' +
                    '       <option value="1.75">1.75</option>\n' +
                    '       <option value="2.00">2.00</option>\n' +
                    '       <option value="2.25">2.25</option>\n' +
                    '       <option value="2.50">2.50</option>\n' +
                    '       <option value="2.75">2.75</option>\n' +
                    '       <option value="3.00">3.00</option>\n' +
                    '   </select>' +
                    '   <label>Peso</label>' +
                    '</div></div>');
                while(j < qtd_alternativas){
                    var id_name = '#resposta_questao_' + i;

                    $(id_name).append('<option value="' + letter[j] + '">' + letter[j] + '</option>');

                    j++;
                }
                j = 0;
                i++;
            }

            $('#div_render_gabarito').append('<div class="col s12 m6 l6 offset-m3 offset-l3">' +
                '<div class="input-field col s12 m12 l12">' +
                '    <input id="nota_total" type="text" value="0.00" disabled>' +
                '   <label for="nota_total">Nota Total Prova</label>' +
                '</div></div>');

            $('select').formSelect();
            M.updateTextFields();

        } else {
            M.toast({html: 'Informe a quantidade de questões/alternativas!', displayLength: 3000});
        }
    });

    $(document.body).on('change', '.peso_proof_calc', function () {
        var qtd_questoes = $('#questoes_proof').val();
        var i = 1;
        var total = 0.00;

        while(i <= qtd_questoes){
            var id_questao = '#peso_proof_' + i;
            var peso_nota = parseFloat($(id_questao).val());
            if(peso_nota != 0.00){
                total += peso_nota;
            }
            i++;
        }

        $('#nota_total').val(total.toFixed(2));

    });

    $('#salvar-prova').on('click', function (){
        var nota_prova = $('#nota_total').val();

        if(nota_prova == 10) {
            if(validateFields('validate-new-proof')){
                $.ajax({
                    type: 'POST',
                    url: APPLICATION_NAME + '/ManagementProof/save_new_proof/',
                    data: $('#form-new-proof').serialize(),
                    success: function(responseData) {
                        M.toast({html: responseData['message'], displayLength: 3000});

                        if(responseData['status'] === 'success'){
                            $('#div_render_gabarito').empty();
                            $('#form-new-proof').trigger('reset');
                            $('#modal-new-prova').modal('close');
                            loadDatatableProvas();
                        }
                    },
                    error: function() {
                        M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                    }
                });
            } else {
                M.toast({html: 'Preencha todos os campos para salvar a prova!', displayLength: 3000});
            }
        } else {
            M.toast({html: 'A prova deve valer 10!', displayLength: 3000});
        }
    });

    $(document.body).on('click', '.delete-prova', function () {
        var id_prova = $(this).attr('id');

        Swal.fire({
            title: "Tem certeza?",
            text: "Você deseja excluir essa prova?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: '#11d65f',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    type: 'POST',
                    url: APPLICATION_NAME + '/ManagementProof/delete_prova',
                    data: {ProvaID: id_prova},
                    success: function (responseData){
                        M.toast({html: responseData['message'], displayLength: 3000});
                        loadDatatableProvas();
                    },
                    error: function () {
                        M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                    }
                });
            }
        });
    });

    $(document.body).on('click', '.open-view-info', function(){
        id_gabarito = $(this).attr('id');
        var letter = ['A', 'B', 'C', 'D', 'E'];

        $('#modal-view-gabarito').modal('open');
        $('#modal-view-gabarito').css('width', '100%', '!important');
        $('#modal-view-gabarito').css('height', '100%', '!important');
        $('#modal-view-gabarito').css('max-height', '100%', '!important');
        $('#modal-view-gabarito').css('top', '0px', '!important');

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementProof/render_gabarit/',
            data: {GabaritoID: id_gabarito},
            success: function(responseData){
                var Qtd_questoes = responseData['prova']['Qtd_questoes'];
                var Qtd_alternativas = responseData['prova']['Qtd_alternativas'];

                $('#curso_render').html('CURSO: ' + responseData['informations'][0]['CursoNome']);
                $('#disciplina_render').html('Disciplina: ' + responseData['informations'][0]['NomeDisciplina']);
                $('#professor_render').html('PROFESSOR: ' + responseData['informations'][0]['NomePessoa']);
                $('#avaliacao_render').html('AVALIAÇÃO OFICIAL: ' + responseData['informations'][0]['ProvaOficial']);
                $('#turno_render').html('TURNO: ' + responseData['informations'][0]['Periodo']);
                $('#ciclo_render').html('CICLO: ' + responseData['informations'][0]['Ano'] + ' | ' + responseData['informations'][0]['Semestre'] + '° Sem');
                $('#data_render').html('DATA: ' + responseData['informations'][0]['DataProva']);

                $('#div_view_gabarito_1').empty();
                $('#div_view_gabarito_2').empty();

                var i = 1;
                var j = 0;

                while(i <= Qtd_questoes){

                    if(i <= 10) {
                        $('#div_view_gabarito_1').append('<div class="col s12 l12 m12" style="margin: 2% 2% 2% 2%;" id="div_alternativa_questao_' +i+ '">' +
                            '<div class="col s2 m2 l2"><b>' +i+ '</b></div></div>');
                    } else {
                        $('#div_view_gabarito_2').append('<div class="col s12 l12 m12" style="margin: 2% 2% 2% 2%;" id="div_alternativa_questao_' +i+ '">' +
                            '<div class="col s2 m2 l2"><b>' +i+ '</b></div></div>');
                    }

                    while(j < Qtd_alternativas){
                        var id_name = '#div_alternativa_questao_' + i;

                        $(id_name).append('<div class="col s2 m2 l2">' +
                            '<a class="btn btn-floating btn-small" style="border: black solid 4px; color: black; background-color: white !important;"><b>' +letter[j]+ '</b></a></div>');
                        j++;
                    }
                    j = 0;
                    i++;
                    M.updateTextFields();
                }
            },
            error: function(){
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });
    });


    $('#gerar-gabaritos-turma').on('click', function(){
        window.open(APPLICATION_NAME + '/ManagementProof/export/' + id_gabarito, '_blank');
    });

});