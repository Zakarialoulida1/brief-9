<?php
class Stat{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getstats($id){
        $this->db->query("SELECT p.Nom_project, COUNT(q.id_task) AS taskcount FROM projects p JOIN task q ON p.project_ID = q.id_project WHERE p.Membre_ID = $id AND q.archive=0 GROUP BY p.Nom_project ORDER BY taskcount DESC LIMIT 1");
        $this->db->execute();
        return $this->db->single();
    }
    public function get_project_withless_tasks($id){
        $this->db->query("SELECT p.Nom_project, COUNT(q.id_task) AS taskcount FROM projects p JOIN task q ON p.project_ID = q.id_project WHERE p.Membre_ID = $id AND q.archive=0 GROUP BY p.Nom_project ORDER BY taskcount asc LIMIT 1");
        $this->db->execute();
        return $this->db->single();
    }
    public function get_project_no_tasks($id){
        $this->db->query("SELECT p.Nom_project, COUNT(q.id_task) AS taskcount FROM projects p JOIN task q ON p.project_ID = q.id_project WHERE p.Membre_ID = $id AND q.archive=0 GROUP BY p.Nom_project ORDER BY taskcount asc LIMIT 1");
        $this->db->execute();
        return $this->db->single();
    }

}