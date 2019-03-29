$(document).ready(function () {

    /*Initialization*/
    var datatable_aluno = $('#table_aluno');



    /*Functions*/

    function loadDatatableAluno()
    {

        datatable_aluno.dataTable().fnDestroy();
        datatable_aluno.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementStudent/load_alunos/",
            responsive: true,
            columns: [
                {data: "RA Aluno"},
                {data: "Nome Aluno"},
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

        $('#table_aluno_wrapper').css('width', '101%', 'important');
        $('#table_aluno_filter').css('width', '101%', 'important');
        $('#table_aluno_filter').css('text-align', 'left');

    }


    /*Process*/

    loadDatatableAluno();

});