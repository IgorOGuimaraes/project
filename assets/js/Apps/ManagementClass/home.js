$(document).ready(function () {

    /*
    * Initialization
    * */

    var datatableTurma = $('#table_turma');

    //Initialize modal
    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    $('select').formSelect();

    /*
    * Functions
    * */

    function loadDatatableTurma()
    {
        datatableTurma.dataTable().fnDestroy();
        datatableTurma.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementClass/load_turma/",
            responsive: false,
            columns: [
                {data: "Ano"},
                {data: "Semestre"},
                {data: "Periodo"},
                {data: "Nome do Curso"},
                {data: "Nome da Materia"},
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

        $('#table_turma_wrapper').css('width', '100%', 'important');
        $('#table_turma_filter').css('width', '100%', 'important');
        $('#table_turma_filter').css('text-align', 'left');
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
                if($(this).val() == '' || $(this).val() == ' '){
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
            url: APPLICATION_NAME + '/ManagementClass/infos_disciplina_curso',
            success: function (responseData) {
                $.each(responseData['data'], function(i, item){
                    $('#disciplina-add').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('select').formSelect();
                });

                $.each(responseData['data1'], function(i, item){
                    $('#nome_curso').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('select').formSelect();
                });
            },
            error: function () {
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });
    }

    /*
    * Process
    * */

    loadDatatableTurma();
    renderSelectDisciplinas();

    //Delete class
    $(document.body).on('click', '.delete-turma', function() {
        var discipliaCurso = $(this).attr('id');
        var turmaID = $(this).attr('name');

        Swal.fire({
            title: "Tem certeza?",
            text: "Você deseja excluir essa Turma?",
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
                    url: APPLICATION_NAME + '/ManagementClass/delete_turma',
                    data: {disciplinaCursoID: discipliaCurso, turma_ID: turmaID},
                    success: function (responseData){
                        M.toast({html: responseData['message'], displayLength: 3000});
                        loadDatatableTurma();
                    },
                    error: function () {
                        M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                    }
                });
            }
        });
    });

    $("#new-class-button").on('click', function () {
        if(validateFields('validate-turma')){
            $.ajax({
                type: 'POST',
                    url: APPLICATION_NAME + '/ManagementClass/insert_new_class',
                data: $('#form-new-class').serialize(),
                success: function (responseData) {
                    M.toast({html: 'Turma Salva com sucesso', displayLength: 3000});
                    $('#form-new-class').trigger('reset');
                    $('#modal-new-class').modal('close');

                    loadDatatableTurma();

                },
                error: function () {
                    M.toast({html: 'Opsss, algo deu errado!!', displayLength: 3000});
                }
            });
        }
    });

});