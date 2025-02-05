<?php

class UserModel extends Model {
    protected $table = 'users'; // Nom de la table

    // Constructeur : Appel au costructeur parent pour la connexion
    public function __construct() {
        parent::__construct($this->table);
    }

    // Méthode pour récupérer un utilisateur par son ID
    public function findById($id) {
        return $this->select('*')       // Selectionne toutes les colonnes
        ->where('id', '=', $id)        // Condition where id = ?
        ->get();                        // Execute la requête et retourne le résultat
    }

    // Méthode pour supprimer un utilisateur
    public function deleteById($id) {
        return $this->query("DELETE FROM " . $this->table . " WHERE id = :id")->execute([':id' => $id]);    // Execute la suppression de l'utilisateur
    }

    // Relation "hasOneé avec UserInfoModel
    public function userInfo() {
        return $this->hasOne('UserInfoModel', 'user_id');    // Relation entre 'users' et 'user_infos'
    }
}
?>