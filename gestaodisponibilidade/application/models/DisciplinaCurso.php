<?php

class Application_Model_DisciplinaCurso extends Zend_Db_Table_Row_Abstract {
      
//   private $id_curso;
//   private $id_disciplina;
//   private $id_disciplina_curso;
   
   public function getId_curso() {
       return $this->id_curso;
   }

   public function setId_curso($id_curso) {
       $this->id_curso = $id_curso;
   }

   public function getId_disciplina() {
       return $this->id_disciplina;
   }

   public function setId_disciplina($id_disciplina) {
       $this->id_disciplina = $id_disciplina;
   }

   public function getId_disciplina_curso() {
       return $this->id_disciplina_curso;
   }

   public function setId_disciplina_curso($id_disciplina_curso) {
       $this->id_disciplina_curso = $id_disciplina_curso;
   }




}

