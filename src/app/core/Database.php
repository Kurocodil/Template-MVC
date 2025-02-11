<?php
/**
 * @ Author: Mathéo Siron
 * @ Create Time: 2025-05-02 13:50:57
 * @ Modified by: Mathéo Siron
 * @ Modified time: 2025-05-02 13:50:57
 * @ Description: Classe de base de données pour gérer la connexion à la base de données PDO.
 */


class Database {
    private $host = 'localhost';                                                                                        // Hôte de la base de données
    private $db_name = 'nom_de_la_base';                                                                                // Nom de la base de données
    private $username = 'root';                                                                                         // Utilisateur de la base de données
    private $password = '';                                                                                             // Mot de passe de l'utilisateur
    protected $conn;                                                                                                    // La connexion PDO

    // Méthode de connexion à la base de données
    public function connect() {
        try{
            $this->conn = new PDO('mysql:host=$this->host;dbname=$this->db_name', $this->username, $this->password);    // PDO crée une connexion à la base de données
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                                       // On définit le mode 'erreur PDO en exeption

            return $this->conn;                                                                                         // Retourner la connexion pour utilisation dans d'autres classes
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            return null;                                                                                                // Retourner null en cas d'erreur
        }
    }
}
?>