<style>
    .modal {
        width: 80%;
        top: 0px !important;
    }
</style>

<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Provas</span>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <table class="datatable highlight display centered" id="table_prova" name="table_prova">
                            <thead>
                            <tr>
                                <th>Prova Oficial</th>
                                <th>Versão de Prova</th>
                                <th>Data Prova</th>
                                <th>Periodo</th>
                                <th>Ano</th>
                                <th>Semestre</th>
                                <th>Deletar</th>
                                <th>Gabarito</th>
                            </tr>
                            </thead>
                            <tbody id="prova_result"></tbody>
                            <tfoot>
                            <tr>
                                <td>Prova Oficial</td>
                                <td>Modelo de Prova</td>
                                <td>Data Prova</td>
                                <td>Periodo</td>
                                <td>Ano</td>
                                <td>Semestre</td>
                                <td>Deletar</td>
                                <td>Gabarito</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-action">
                <a class="btn btn-floating btn-large waves-effect waves-light modal-trigger" id="proof-button" href="#modal-new-prova"><i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
</div>


<!-- Modal New Proof -->
<div id="modal-new-prova" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Nova Prova</h4>
        <div class="row">
            <form id="form-new-proof">
                <div class="input-field col s12 m6 l6">
                    <input id="date_proof" name="date_proof" type="text" class="validate-new-proof datepicker">
                    <label for="date_proof">Data da Prova</label>
                </div>

                <div class="input-field col s12 m6 l6">
                    <select id="official_proof" name="official_proof" class="validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P3">P3</option>
                    </select>
                    <label>Prova Oficial</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="disciplina_proof" name="disciplina_proof" class="validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Disciplina</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="curso_proof" name="curso_proof" class="validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Curso</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="periodo_proof" name="periodo_proof" class="validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                    </select>
                    <label>Período</label>
                </div>

                <div class="input-field col s12 m6 l6">
                    <select id="ano_proof" name="ano_proof" class="validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                    <label>Ano</label>
                </div>

                <div class="input-field col s12 m6 l6">
                    <select id="semestre_proof" name="semestre_proof" class="validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <label>Semestre</label>
                </div>

                <div class="input-field col s12 m5 l5">
                    <select id="questoes_proof" name="questoes_proof" class="validate-gabarito-proof validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                    <label>Quantidade Questões</label>
                </div>

                <div class="input-field col s10 m5 l5">
                    <select id="alternativas_proof" name="alternativas_proof" class="validate-gabarito-proof validate-new-proof">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label>Quantidade Alternativas</label>
                </div>

                <div class="col s2 m2 l2" style="margin-top: 2%;">
                    <a class="btn" id="gerar-gabarito">Gerar</a>
                </div>

                <div class="col s12 m6 l6 offset-m3 offset-l3" id="div_render_gabarito">

                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn" id="salvar-prova">Salvar</a>
        <a href="#!" class="modal-close btn-flat">cancelar</a>
    </div>
</div>



<!-- Modal Vire Gabarito -->
<div id="modal-view-gabarito" class="modal modal-fixed-footer">
    <div class="modal-content" id="modal-content-view-gabarito">
        <div class="row">
            <!--[LINHA 1]-->
            <div class="col s12 m12 l12 center" style="border: black solid 2px;">
                <img src="<?= APPLICATION_NAME?>/assets/img/logocertcomp.png">
                <br>
                <b>Faculdade de Tecnologia de São Bernardo do Campo Adib Moiseis Dib</b>
            </div>

            <!--[LINHA 2]-->
            <div class="col s12 m12 l12" style="border: black solid 2px;">
                <b id="curso_render" name="curso_render">CURSO: </b>
            </div>

            <!--[LINHA 3]-->
            <div class="col s7 m7 l7" style="border: black solid 2px;">
                <b id="disciplina_render" name="disciplina_render">DISCIPLINA: </b>
            </div>

            <div class="col s3 m3 l3" style="border: black solid 2px;">
                <b id="codi_render" name="codi_render">CÓDIGO: </b>
            </div>

            <div class="col s2 m2 l2" style="border: black solid 2px;">
                <b id="sigla_render" name="sigla_render">SIGLA: </b>
            </div>

            <!--[LINHA 4]-->
            <div class="col s7 m7 l7" style="border: black solid 2px;">
                <b id="professor_render" name="professor_render">PROFESSOR: </b>
            </div>

            <div class="col s5 m5 l5" style="border: black solid 2px;">
                <b id="avaliacao_render" name="avaliacao_render">AVALIAÇÃO OFICIAL: </b>
            </div>

            <!--[LINHA 5]-->
            <div class="col s3 m3 l3" style="border: black solid 2px;">
                <b id="ra_render" name="ra_render">RA: </b>
            </div>

            <div class="col s7 m7 l7" style="border: black solid 2px;">
                <b id="nome_ra_render" name="nome_ra_render">NOME: </b>
            </div>

            <div class="col s2 m2 l2 center" style="border: black solid 2px;">
                <b>NOTA: </b>
            </div>

            <!--[LINHA 6]-->
            <div class="col s3 m3 l3" style="border: black solid 2px;">
                <p id="turno_render" name="turno_render">TURNO: </p>
            </div>

            <div class="col s2 m2 l2" style="border: black solid 2px;">
                <p id="ciclo_render" name="ciclo_render">CICLO: </p>
            </div>

            <div class="col s2 m2 l2" style="border: black solid 2px;">
                <p id="data_render" name="data_render">DATA: </p>
            </div>

            <div class="col s3 m3 l3" style="border: black solid 2px;">
                <p>Vista do aluno </p>
            </div>

            <div class="col s2 m2 l2 center" style="border: black solid 2px;">
                <p class="tx-white">NOTA</p>
            </div>

            <div class="col s8 m8 l8" style="border: black solid 4px; margin-top: 10%;">
                <div class="col s6 m6 l6" id="div_view_gabarito_1" name="div_view_gabarito_1"></div>
                <div class="col s6 m6 l6" id="div_view_gabarito_2" name="div_view_gabarito_2"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn" id="gerar-gabaritos-turma" name="gerar-gabaritos-turma">Gerar Gabaritos</a>
        <a href="#!" class="modal-close btn-flat">cancelar</a>
    </div>
</div>