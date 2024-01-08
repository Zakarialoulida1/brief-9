<?php
class Task
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function add_task($data)
    {

        $this->db->query("INSERT INTO task(titre,deadline,status,id_user,id_project) VALUES(?,?,?,?,?)");


        $this->db->bind($data['titre']);
        $this->db->bind($data['deadline']);
        $this->db->bind($data['status']);
        $this->db->bind($data['id_user']);
        $this->db->bind($data['id_project']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function fetch_tasks($id)
    {
        try {
            // var_dump($id);
            // die();
            $this->db->query("SELECT * FROM task WHERE id_project= $id  AND status = -1 AND archive=0  ORDER BY deadline");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_tasks_doing($id)
    {
        try {
            // var_dump($id);
            // die();
            $this->db->query("SELECT * FROM task WHERE id_project= $id  AND status = 0 AND archive=0  ORDER BY deadline");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_tasks_done($id)
    {
        try {
            // var_dump($id);
            // die();
            $this->db->query("SELECT * FROM task WHERE id_project= $id  AND status = 1 AND archive=0  ORDER BY deadline");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_task($id_task)
    {
        try {
            $this->db->query("SELECT * from task where id_task= $id_task");
            $this->db->execute();
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function update_task($id_task,$data){

        try {
            $this->db->query("UPDATE task SET titre=?,deadline=? ,status=?   where id_task= '$id_task'");
            
           
            
            $this->db->bind($data['titre']);
            $this->db->bind($data['deadline']);
            $this->db->bind($data['status']);
           
           


            $this->db->execute();
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function archive_task($id_task){
        
        try {
            $this->db->query("UPDATE task   SET archive=1   where id_task= '$id_task'");
       
            $this->db->execute();
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function found_task($titre,$id_project){
        try{
            $this->db->query("SELECT * from task where titre LIKE '%{$titre}%' AND archive=0 AND id_project=$id_project ORDER BY deadline ");
            $this->db->execute();
            return $this->db->return_array();
        }catch(PDOException $e){
            return $e->getMessage();

        }
    }
}
