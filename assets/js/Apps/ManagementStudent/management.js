$(document).ready(function () {

    /*Initialization*/
    var id_lb = 0;
    var id_aluno = 0;
    var select_disciplinas = 0;
    var datatable_aluno = $('#table_aluno');
    var datatable_disciplinas = $('#table_disciplina');

    //Initialize modal
    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    $('select').formSelect();

    /*Functions*/
    function loadDatatableAluno()
    {

        datatable_aluno.dataTable().fnDestroy();
        datatable_aluno.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementStudent/load_alunos/",
            responsive: false,
            columns: [
                {data: "RA Aluno"},
                {data: "Nome Aluno"},
                {data: "Deletar"},
                {data: "Disciplinas"},
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

        $('#table_aluno_wrapper').css('width', '100%', 'important');
        $('#table_aluno_filter').css('width', '100%', 'important');
        $('#table_aluno_filter').css('text-align', 'left');

    }

    function loadDatatableDisciplinas(id_aluno)
    {

        datatable_disciplinas.dataTable().fnDestroy();
        datatable_disciplinas.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementStudent/load_disciplinas_aluno/?id_aluno=" + id_aluno,
            responsive: false,
            columns: [
                {data: "Curso"},
                {data: "Disciplina"},
                {data: "Periodo"},
                {data: "Ano"},
                {data: "Semestre"},
                {data: "Notas"},
                {data: "Deletar"}
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

        $('#table_disciplina_wrapper').css('width', '100%', 'important');
        $('#table_disciplina_filter').css('width', '100%', 'important');
        $('#table_disciplina_filter').css('text-align', 'left');

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
                if($(this).val() == '' || $(this).val() == ' ' || $(this).val() == null){
                    return valid = false;
                }
            }
        });

        return valid;
    }

    function renderSelectDisciplinas()
    {

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementStudent/infos_disciplina_curso',
            success: function (responseData) {
                $.each(responseData['data'], function(i, item){
                    $('#disciplina-add').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('#disciplina-export').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('select').formSelect();
                });

                $.each(responseData['data1'], function(i, item){
                    $('#nome_curso').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('#nome_curso_export').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('select').formSelect();
                });
            },
            error: function () {
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });
    }


    /*Process*/
    loadDatatableAluno();
    renderSelectDisciplinas();

    $("#more-user-button").on('click',function (){
        $("#form-new-aluno").append('<div><div class="input-field col s6 m6 l6">\n' +
            '                    <input id="' + id_lb + '_nome_aluno" name="nome_aluno[]" type="text" class="validate-new-aluno">\n' +
            '                    <label for="nome_aluno">Nome Aluno</label>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="input-field col s5 m5 l5">\n' +
            '                    <input id="' + id_lb + '_ra_aluno" name="ra_aluno[]" type="number" class="validate-new-aluno">\n' +
            '                    <label for="ra_aluno">RA Aluno</label>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="col s1 m1 l1" style="padding-top: 20px;">\n' +
            '                    <a class="btn-flat red-text right" id="remove-user-fields" name="remove-user-fields">\n' +
            '                        <i class="large material-icons">delete_forever</i>\n' +
            '                    </a>\n' +
            '                </div></div>');

        id_lb++;
    });

    $("#new-aluno").on('click',function (){
        if(validateFields('validate-new-aluno')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + "/ManagementStudent/new_aluno",
                data: $('#form-new-aluno').serialize(),
                success: function (responseData) {
                    console.log(responseData['data']);

                    $('#modal-new-aluno').modal('close');
                    $('#form-new-aluno').trigger('reset');
                    M.toast({html: responseData['message'], displayLength: 3000});
                    loadDatatableAluno();
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos!'});
        }
    });

    //Remove fields add
    $(document.body).on('click', '#remove-user-fields', function (e) {
        e.preventDefault();
        $(this).parent('div').parent('div').remove();
    });

    $(document.body).on('click', '.open-view-info', function () {
        id_aluno = $(this).attr('name');
        $('#modal-edit-aluno').modal('open');

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementStudent/view_aluno',
            data: {alunoID: id_aluno},
            success: function (responseData){
                $('#nome-aluno').html(responseData['data'][0]['NomePessoa']);

                $('#nome_aluno_view').val(responseData['data'][0]['NomePessoa']);
                $('#ra_aluno_view').val(responseData['data'][0]['RA']);

                loadDatatableDisciplinas(id_aluno);

                M.updateTextFields();
            },
            error: function (){
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });
    });

    $(document.body).on('click', '.delete-aluno',function () {
        id_aluno = $(this).attr('name');
        var id_pessoa = $(this).attr('id');

        Swal.fire({
            title: "Tem certeza?",
            text: "Você deseja excluir esse aluno?",
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
                    url: APPLICATION_NAME + '/ManagementStudent/delete_aluno',
                    data: {idAluno: id_aluno, idPessoa: id_pessoa},
                    success: function (responseData){
                        M.toast({html: responseData['message'], displayLength: 3000});
                        loadDatatableAluno();

                        var colls = document.querySelectorAll('.collapsible');
                        M.Collapsible.init(colls);
                    },
                    error: function () {
                        M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                    }
                });
            }
        });
    });

    $(document.body).on('click', '#new-disciplina-aluno', function () {
        if(validateFields('validate-disciplina-aluno')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/ManagementStudent/add_disciplina_aluno/',
                data: $('#form-add-disciplina').serialize() + '&id_aluno=' + id_aluno,
                success: function (responseData) {
                    console.log(responseData['debug']);
                    M.toast({html: responseData['message'], displayLength: 3000});

                    if(responseData['status'] !== 'invalid'){
                        $('#form-add-disciplina').trigger('reset');
                        $('#modal-add-disciplina').modal('close');
                    }
                },
                error: function (e) {
                    M.toast({html: 'Opssss, algo deu errado!', displayLength: 3000});
                    console.log(e);
                }
            });
        } else {
            M.toast({html: 'Preenchar todos os campos!', displayLength: 3000});
        }
    });

    $(document.body).on('click', '.delete-turma',function () {
        id_aluno = $(this).attr('id');
        var id_turma = $(this).attr('name');

        Swal.fire({
            title: "Tem certeza?",
            text: "Você deseja excluir essa disciplina?",
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
                url: APPLICATION_NAME + '/ManagementStudent/delete_disciplina',
                data: {idAluno: id_aluno, idTurma: id_turma},
                success: function (responseData){
                    M.toast({html: responseData['message'], displayLength: 3000});
                    loadDatatableDisciplinas();

                    var colls = document.querySelectorAll('.collapsible');
                    M.Collapsible.init(colls);
                },
                error: function () {
                    M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                }
            });
        }
    });
    });


    $(document.body).on('click', '.open-view-disciplinas', function(){
        $('#modal-add-disciplina').modal('open');
        $('#header-aluno-disciplina').html($(this).attr('id'));

        id_aluno = $(this).attr('name');
    });


    $(document.body).on('click', '.open-notas-turma', function () {
        $('#modal-nota-disciplina').modal('open');
        var turmaID = $(this).attr('name');

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementStudent/load_notas_alunos',
            data: {alunoID: id_aluno, turmaID: turmaID},
            success: function (responseData){
            },
            error: function () {
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });
    });

    $('#export-notas-button').on('click', function(e) {

        if(validateFields('validate-export')){
            // $.ajax({
            //     type: 'POST',
            //     url: APPLICATION_NAME + '/ManagementStudent/export_notas',
            //     data: $('#form-export-notas').serialize(),
            //     success: function (responseData){
            //         console.log(responseData['data']);
            //     },
            //     error: function () {
            //         M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            //     }
            // });

            var disciplina = $("#disciplina-export").val();
            var curso = $("#nome_curso_export").val();
            var periodo = $("#periodo-add-export").val();
            var ano = $("#ano-export").val();
            var semestre = $("#semestre-export").val();

            e.preventDefault();
            window.open( APPLICATION_NAME + "/ManagementStudent/export_notas/?disciplina=" + disciplina +
            '&curso=' + curso + '&periodo=' + periodo + '&ano=' + ano + '&semestre=' + semestre);
        } else {
            M.toast({html: 'Preencha todos os campos!', displayLength: 3000});
        }

    });


});