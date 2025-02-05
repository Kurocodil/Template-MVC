<?php

class UserInfoModel extends Model {
    protected $table = 'user_infos'; // Nom de la table

    // Constructeur : Appel au costructeur parent pour la connexion
    public function __construct() {
        parent::__construct($this->table);
    }

    // Méthode pour récupérer les informations d'un utilisateur par son ID
    public function findByUserId($userId) {
        return $this->select('*')               // Sélectionne toutes les colonnes
        ->where('user_id', '=', $userId)        // Condition where user_id = ?
        ->get();
    }
}