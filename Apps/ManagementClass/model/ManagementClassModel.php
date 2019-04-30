<?php

class ManagementClassModel extends Model
{

    public function getTurma($ProfessorID)
    {
        return $this->connection->query("SELECT 
                t.TurmaID AS TurmaID,
                t.DisciplinaCursoID AS DisciplinaCursoID,
                t.Periodo AS Periodo,
                t.Ano AS Ano,
                t.Semestre AS Semestre,
                d.NomeDisciplina AS NomeDisciplina,
                c.NomeCurso AS NomeCurso
                FROM tb_app_turma AS t, tb_app_disciplina AS d, tb_app_curso AS c, tb_app_disciplina_curso AS dc
                WHERE t.DisciplinaCursoID = dc.DisciplinaCursoID AND dc.DisciplinaID = d.DisciplinaID AND dc.CursoID = c.CursoID AND dc.ProfessorID = " . $ProfessorID)->fetchAll();
    }

    public function deleteTurma($turmaID)
    {
        return $this->connection->delete("tb_app_turma", ['TurmaID' => $turmaID]);
    }

    public function getDisciplina()
    {
        return $this->connection->query("SELECT * FROM tb_app_disciplina")->fetchAll();
    }

    public function getCurso()
    {
        return $this->connection->query("SELECT * FROM tb_app_curso")->fetchAll();
    }

    public function getCursoDisciplina($disciplina, $curso, $professor)
    {
        return $this->connection->select('tb_app_disciplina_curso', ['DisciplinaCursoID'],
            [
                'AND' => [
                    'CursoID' => $curso,
                    'DisciplinaID' => $disciplina,
                    'ProfessorID' => $professor
                ]
            ]
        );
    }

    public function setCursoDisciplina($disciplina, $curso, $professor)
    {
        $this->connection->insert('tb_app_disciplina_curso', [
                'CursoID' => $curso,
                'DisciplinaID' => $disciplina,
                'ProfessorID' => $professor
            ]
        );

        return $this->connection->id();
    }

    public function setNewTurma($DisciplinaCursoID, $periodo, $year, $semester)
    {
        $this->connection->insert(
            'tb_app_turma', [
                'DisciplinaCursoID' => $DisciplinaCursoID,
                'Periodo' => $periodo,
                'Ano' => $year,
                'Semestre' => $semester
            ]
        );

        return $this->connection->id();
    }

}