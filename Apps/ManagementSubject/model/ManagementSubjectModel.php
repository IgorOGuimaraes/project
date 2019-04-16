<?php
/**
 * Created by PhpStorm.
 * User: fz388
 * Date: 03/03/2019
 * Time: 20:49
 */

class ManagementSubjectModel extends Model
{

    public function getAllDisciplinas($prodessor_id)
    {
        return $this->connection->query("SELECT * FROM tb_app_disciplina AS disc, tb_app_disciplina_curso AS dcur, tb_app_curso AS cur
        WHERE disc.DisciplinaID = dcur.DisciplinaID AND cur.CursoID = dcur.CursoID AND dcur.ProfessorID = $prodessor_id")->fetchAll();
    }

    public function getNomeCursos()
    {
        return $this->connection->query("SELECT * FROM tb_app_curso")->fetchAll();
    }

    public function setNewDisciplina($new)
    {
        $this->connection->insert(
            'tb_app_disciplina', [
                'NomeDisciplina' => $new
            ]
        );

        return $this->connection->id();
    }

    public function setDesciplinaCurso($id_curso, $id_disciplina, $id_professor)
    {

        return $this->connection->insert(
            'tb_app_disciplina_curso', [
                'CursoID' => $id_curso,
                'DisciplinaID' => $id_disciplina,
                'ProfessorID' => $id_professor,
            ]
        );

    }

    public function getCursoDisciplina($disciplinaCursoID)
    {

        return $this->connection->query("SELECT * FROM tb_app_disciplina_curso WHERE DisciplinaCursoID = $disciplinaCursoID")->fetchAll();

    }

    public function deleteDisciplinaCurso($disciplinaCursoID)
    {
        return $this->connection->delete('tb_app_disciplina_curso' , ['DisciplinaCursoID' => $disciplinaCursoID]);
    }

    public function deleteDisciplina($DisciplinaID)
    {
        return $this->connection->delete('tb_app_disciplina' , ['DisciplinaID' => $DisciplinaID]);
    }



}