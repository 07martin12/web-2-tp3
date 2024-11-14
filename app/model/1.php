<?php
/*
class TaskModel {

7777777777777777
    public function getTasks($filtrarFinalizadas = null, $orderBy = false) {
        $sql = 'SELECT * FROM tareas';

        if($filtrarFinalizadas != null) {
            if($filtrarFinalizadas == 'true')
                $sql .= ' WHERE finalizada = 1';
            else
                $sql .= ' WHERE finalizada = 0';
        }

        if($orderBy) {
            switch($orderBy) {
                case 'titulo':
                    $sql .= ' ORDER BY titulo';
                    break;
                case 'prioridad':
                    $sql .= ' ORDER BY prioridad';
                    break;
            }
        }

    }
 777777777777777777777777777

    public function insertTask($title, $description, $priority, $finished = false) { 
        $query = $this->db->prepare('INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES (?, ?, ?, ?)');
        $query->execute([$title, $description, $priority, $finished]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseTask($id) {
        $query = $this->db->prepare('DELETE FROM tareas WHERE id = ?');
        $query->execute([$id]);
    }

    public function setFinalize($id, $finalizada) {        
        $query = $this->db->prepare('UPDATE tareas SET finalizada = ? WHERE id = ?');
        $query->execute([$finalizada, $id,]);
    }

    function updateTask($id, $titulo, $descripcion, $prioridad, $finalizada) {    
        $query = $this->db->prepare('UPDATE tareas SET titulo = ?, descripcion = ?, prioridad = ?, finalizada = ? WHERE id = ?');
        $query->execute([$titulo, $descripcion, $prioridad, $finalizada, $id]);
    }
}
