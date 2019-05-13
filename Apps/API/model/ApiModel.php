<?php

/**
 * This model handles the Controller operation for login
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 */
class ApiModel extends Model {

    public function getValidateUser($user)
    {

        return $this->connection->query("SELECT * FROM tb_core_professor WHERE UserName = '" . $user['user-name'] . "' AND Password = '" . $user['pass-user'] . "'")->fetchAll();

    }

    public function getUserInfo($PessoaID)
    {

        return $this->connection->query("SELECT * FROM tb_core_pessoa WHERE PessoaID = " . $PessoaID)->fetchAll();

    }

    public function getAnswersProof($ProfessorID, $info)
    {

        return $this->connection->query("SELECT
            prova.RespostasCorretas AS Respostas,
            prova.FormatoGabarito AS Gabarito
            
            FROM tb_app_prova AS prova, tb_app_turma AS turma, tb_app_disciplina_curso AS disciplinaCurso
        
            WHERE prova.ProvaID = {$info['ProvaID']} AND turma.TurmaID = prova.TurmaID 
            AND turma.DisciplinaCursoID = disciplinaCurso.DisciplinaCursoID AND disciplinaCurso.ProfessorID = {$ProfessorID}")->fetchAll();

    }

    public function setAnswersStudent($info)
    {

        $this->connection->insert(
            'tb_app_respostas', [
                'ProvaID' => $info['ProvaID'],
                'AlunoID' => $info['AlunoID'],
                'RespostaAluno' => json_encode($info['RespostaAluno']),
                'NotaAluno' => $info['NotaAluno']
            ]
        );

        return $this->connection->id();

    }

}

