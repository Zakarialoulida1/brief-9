<?php
class Project
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function create($data)
    {
        $this->db->query("INSERT INTO Projects (Membre_id,Nom_project, descrip, Date_de_debut, date_fin) 
        VALUES (?,?,?,?,?)");

        $this->db->bind($data['Membre_id']);
        $this->db->bind($data['Nom_project']);
        $this->db->bind($data['descrip']);
        $this->db->bind($data['Date_de_debut']);
        $this->db->bind($data['date_fin']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function fetch_my_projects($ID)
    {
        try {
            $this->db->query("SELECT * from projects where Membre_ID= '$ID'");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function delete_project($id)
    {
        try {
            $this->db->query("DELETE from projects where project_ID= '$id'");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_project($id)
    {
        try {
            $this->db->query("SELECT * from projects where project_ID= '$id'");
            $this->db->execute();
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function update_project($id,$data)
    {
        try {
            $this->db->query("UPDATE projects SET Nom_project=?,descrip=? ,Date_de_debut=? ,date_fin=?  where project_ID= '$id'");
            
           
            
            $this->db->bind($data['Nom_project']);
            $this->db->bind($data['descrip']);
            $this->db->bind($data['Date_de_debut']);
            $this->db->bind($data['date_fin']);
           


            $this->db->execute();
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
