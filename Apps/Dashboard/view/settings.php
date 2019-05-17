<script>
    var user_name = '<?= $_SESSION['UserName']?>';
</script>
<div class="container">
    <div class="row">

        <!--[Div para adicionar novo curso]-->
        <div class="col l6 m6 s12 hide admin-div">
            <div class="card z-depth-2">
                <div class="card-content">
                    <span class="card-title">Novo Curso</span>
                    <div class="row">
                        <form id="new_course_form">

                            <div class="input-field col s12">
                                <input id="course_name" name="course_name" type="text" class="validate-new-course">
                                <label for="course_name">Nome Novo Curso</label>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn" id="new_course_button">Adicionar Curso</a>
                </div>
            </div>
        </div>

        <!--[Div para adicionar nova disciplina]-->
        <div class="col l6 m6 s12 hide admin-div">
            <div class="card z-depth-2">
                <div class="card-content">
                    <span class="card-title">Novo Disciplina</span>
                    <div class="row">
                        <form id="new_disciplina_form">

                            <div class="input-field col s12">
                                <input id="disciplina_name" name="disciplina_name" type="text" class="validate-new-disciplina">
                                <label for="disciplina_name">Nome Nova Disciplina</label>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn" id="new_disciplina_button">Adicionar Disciplina</a>
                </div>
            </div>
        </div>

        <!--[Div para reset de senha]-->
        <div class="col l6 m6 s12">
            <div class="card z-depth-2">
                <div class="card-content">
                    <span class="card-title">Password Reset</span>
                    <div class="row">
                        <form id="reset_pass_form">

                                <div class="input-field col s12">
                                    <input id="last_password" name="last_password" type="password" class="validate-reset">
                                    <label for="last_password">Last Password</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="new_password" name="new_password" type="password" class="validate-reset">
                                    <label for="new_password">New Password</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="confirm_new_password" name="confirm_new_password" type="password" class="validate-reset">
                                    <label for="confirm_new_password">Confirm New Password</label>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn" id="reset_pass">Reset</a>
                </div>
            </div>
        </div>

        <!--[Div para novo usuário]-->
        <div class="col l6 m6 s12 hide admin-div">
            <div class="card z-depth-2">
                <div class="card-content">
                    <span class="card-title">Novo Professor</span>
                    <div class="row">
                        <form id="new_teacher_form">

                            <div class="input-field col s12">
                                <input id="teacher_name" name="teacher_name" type="text" class="validate-new-teacher">
                                <label for="teacher_name">Nome Professor</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="teacher_email" name="teacher_email" type="email" class="validate-new-teacher">
                                <label for="teacher_email">E-mail Professor</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="user_name" name="user_name" type="text" class="validate-new-teacher" readonly="readonly" placeholder="">
                                <label for="user_name">Nome Usuário</label>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn" id="new_teacher_button">Adicionar Professor</a>
                </div>
            </div>
        </div>


        <!--[Div com a lista de professores cadastrados]-->
        <div class="col s12 m12 l12 hide admin-div">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Professores Cadastrados</span>

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <table class="datatable highlight display centered" id="table_professores" name="table_professores">
                                <thead>
                                <tr>
                                    <th>Professor ID</th>
                                    <th>Nome</th>
                                    <th>Usuário</th>
                                    <th>E-mail</th>
                                </tr>
                                </thead>
                                <tbody id="professores_result"></tbody>
                                <tfoot>
                                <tr>
                                    <td>Professor ID</td>
                                    <td>Nome</td>
                                    <td>Usuário</td>
                                    <td>E-mail</td
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>