<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Disciplinas</span>
            </div>

            <div class="row">
                <div class="col s12 m12 l12">
                    <table class="datatable highlight display centered" id="table_disciplina" name="table_disciplina">
                        <thead>
                        <tr>
                            <th>ID Disciplina</th>
                            <th>Nome Disciplina</th>
                            <th>Nome Curso</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                        <tbody id="disciplina_result"></tbody>
                        <tfoot>
                        <tr>
                            <th>ID Disciplina</th>
                            <th>Nome Disciplina</th>
                            <th>Nome Curso</th>
                            <th>Excluir</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="card-action">
                <a class="btn btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal-new-disciplina">
                    <i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal-new-disciplina">
    <div class="modal-content">
        <h4 class="header tx-dark-blue">Adicionar Disciplina</h4>

        <div class="row">
            <form id="form-new-disciplina">
                <div class="input-field col s6 m6 l6">
                    <input id="nome_disciplina" name="nome_disciplina[]" type="text" class="validate-new-disciplina">
                    <label for="nome_disciplina">Nome Disciplina</label>
                </div>

                <div class="input-field col s5 m5 l5">
                    <select id="nome_curso" name="nome_curso[]" class="validate-new-disciplina">
                        <option value="" disable selected>Choose your option</option>
                    </select>
                    <label>Nome Curso</label>
                </div>

                <div class="col s1 m1 l1" style="padding-top: 20px;">
                    <a class="btn-flat blue-text right" id="more-user-button" name="more-user-button">
                        <i class="large material-icons">add_circle_outline</i>
                    </a>
                </div>
            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-blue btn" id="adicionar-disciplina">Adicionar</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>