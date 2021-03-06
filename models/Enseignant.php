<?php
require 'models/Model.php';
class Enseignant extends Model{

    public function getEns($cycle)
    {
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT nom, prenom, temps_recep FROM enseignants WHERE cycle = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
    public function getAll()
    {
        $query = $this->db->prepare("SELECT id, nom, prenom FROM enseignants ORDER BY nom");
        $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    public function getInfo($id)
    {
        $query = $this->db->prepare("SELECT temps_recep FROM enseignants WHERE id=?");
        $query->execute([$id]);
        $rows[0] = $query->fetchAll();
        $query = $this->db->prepare("SELECT classes.classe, eh.* FROM (enseignants_class AS ec JOIN classes ON classes.id=ec.class_id JOIN enseignants_heure AS eh ON eh.class_id=classes.id) WHERE eh.ens_id=?");
        $query->execute([$id]);
        $rows[1] = $query->fetchAll();
        return $rows;
    }
    public function getClasses()
    {
        $query = $this->db->prepare("SELECT * FROM classes");
        $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    public function store()
    {
        $query = $this->db->prepare("SELECT * FROM enseignants_class WHERE ens_id = ? AND class_id = ?");
        $query->execute([$_POST['enseignant'], $_POST['class']]);
        $exist = $query->fetch(PDO::FETCH_ASSOC);
        if(!$exist){
            $query = $this->db->prepare("INSERT INTO enseignants_class (ens_id, class_id) VALUES (?, ?)");
            $query->execute([$_POST['enseignant'], $_POST['class']]);
        }
        $query = $this->db->prepare("INSERT INTO enseignants_heure (ens_id, class_id, heure) VALUES (?, ?, ?)");
        $query->execute([$_POST['enseignant'], $_POST['class'], $_POST['heure']]);
        if(!empty($_POST['recep'])){
            $query = $this->db->prepare("UPDATE enseignants SET temps_recep=?WHERE id=?");
            $query->execute([$_POST['recep'], $_POST['enseignant']]);
        }
    }
    public function update()
    {
        $query = $this->db->prepare("UPDATE info_ecole SET paragraphe=?WHERE id=?");
        $query->execute([$_POST['paraMAJ'], $_POST['id']]);
    }
    public function delete($id, $class, $heure)
    {
        $query = $this->db->prepare("DELETE FROM enseignants_heure WHERE ens_id=? AND class_id=? AND heure=?");
        $query->execute([$id, $class, $heure]);
    }
}