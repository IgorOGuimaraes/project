<style>
    .modal {
        width: 1000px;
    }
</style>

<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Alunos</span>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <table class="datatable highlight display centered" id="table_aluno" name="table_aluno">
                            <thead>
                            <tr>
                                <th>RA Aluno</th>
                                <th>Nome Aluno</th>
                                <th>Deletar</th>
                                <th>Disciplinas</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody id="aluno_result"></tbody>
                            <tfoot>
                            <tr>
                                <td>RA Aluno</td>
                                <td>Nome Aluno</td>
                                <td>Deletar</td>
                                <td>Disciplinas</td>
                                <td>Editar</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-action">
                <a class="btn btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal-new-aluno"><i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal-new-aluno">
    <div class="modal-content">
        <h4 class="header tx-dark-blue">Novo Aluno</h4>

        <div class="row">
            <form id="form-new-aluno">
                <div class="input-field col s6 m6 l6">
                    <input id="nome_aluno" name="nome_aluno[]" type="text" class="validate-new-aluno">
                    <label for="nome_aluno">Nome Aluno</label>
                </div>

                <div class="input-field col s5 m5 l5">
                    <input id="ra_aluno" name="ra_aluno[]" type="text" class="validate-new-aluno" maxlength="13" minlength="1">
                    <label for="ra_aluno">RA Aluno</label>
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
        <a class="waves-effect waves-yellow btn" id="new-aluno">Adicionar</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>

<div class="modal" id="modal-edit-aluno">
    <div class="modal-content">
        <h4 class="header tx-dark-blue" id="nome-aluno"></h4>

        <div class="row">
            <form id="form-new-aluno">
                <div class="input-field col s6 m6 l6">
                    <input id="nome_aluno_view" name="nome_aluno_view[]" type="text" class="validate-update-aluno">
                    <label for="nome_aluno_view">Nome Aluno</label>
                </div>

                <div class="input-field col s6 m6 l6">
                    <input id="ra_aluno_view" name="ra_aluno_view[]" type="text" class="validate-update-aluno" maxlength="13" minlength="1">
                    <label for="ra_aluno_view">RA Aluno</label>
                </div>
            </form>

            <div class="col s12 m12 l12">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">book</i>Disciplinas</div>
                        <div class="collapsible-body"><span>
                                <table class="datatable highlight display centered" id="table_disciplina" name="table_disciplina">
                                    <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Disciplina</th>
                                        <th>Período</th>
                                        <th>Ano</th>
                                        <th>Semestre</th>
                                        <th>Notas</th>
                                        <th>Deletar</th>
                                    </tr>
                                    </thead>
                                    <tbody id="disciplina_result"></tbody>
                                    <tfoot>
                                    <tr>
                                        <td>Curso</td>
                                        <td>Disciplina</td>
                                        <td>Período</td>
                                        <td>Ano</td>
                                        <td>Semestre</td>
                                        <th>Notas</th>
                                        <td>Deletar</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </span></div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-yellow btn" id="edit-aluno">Salvar</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>

<div class="modal" id="modal-add-disciplina">
    <div class="modal-content">
        <h4 class="header tx-dark-blue" id="header-aluno-disciplina"></h4>

        <div class="row">
            <form id="form-add-disciplina">
                <div class="input-field col s12 m4 l4">
                    <select id="disciplina-add" name="disciplina-add" class="validate-disciplina-aluno">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Disciplina</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="nome_curso" name="nome_curso" class="validate-disciplina-aluno">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Curso</label>
                </div>

                <div class="input-field col s11 m3 l3">
                    <select id="periodo-add" name="periodo-add" class="validate-disciplina-aluno">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                    </select>
                    <label>Período</label>
                </div>
            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-yellow btn" id="new-disciplina-aluno">Adicionar</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>


<div class="modal" id="modal-nota-disciplina">
    <div class="modal-content">
        <h4 class="header tx-dark-blue">Notas</h4>

        <p>P1: 10.00</p>
        <p>P2: 7.00</p>
        <p>P3: 0.00</p>
    </div>
</div>