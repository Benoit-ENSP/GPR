<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        echo "<h1>🔍 Test de connexion aux bases de données</h1>";

        // Test de la base principale (gpr_bdd)
        echo "<h2>Base principale : gpr_bdd</h2>";
        try {
            $mainDb = Database::connect('default');
            $tables = $mainDb->query("SHOW TABLES")->getResult();
            echo "<p>✅ Connexion réussie</p><ul>";
            foreach ($tables as $row) {
                foreach ($row as $table) {
                    echo "<li>$table</li>";
                }
            }
            echo "</ul>";
        } catch (\Throwable $e) {
            echo "<p>❌ Erreur : " . $e->getMessage() . "</p>";
        }

        // Test de la base de test (gpr_test)
        echo "<h2>Base de test : gpr_test</h2>";
        try {
            $testDb = Database::connect('tests');
            $tables = $testDb->query("SHOW TABLES")->getResult();
            echo "<p>✅ Connexion réussie</p><ul>";
            foreach ($tables as $row) {
                foreach ($row as $table) {
                    echo "<li>$table</li>";
                }
            }
            echo "</ul>";
        } catch (\Throwable $e) {
            echo "<p>❌ Erreur : " . $e->getMessage() . "</p>";
        }
    }
}
