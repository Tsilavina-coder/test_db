<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = ""; // à modifier si nécessaire
$dbname = "test_db"; // à modifier si nécessaire

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête pour récupérer la liste des départements
$sql = "SELECT dept_no, dept_name FROM departments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Liste des départements</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Numéro</th><th>Nom</th></tr>";
    // Affichage des données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["dept_no"]) . "</td><td>" . htmlspecialchars($row["dept_name"]) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucun département trouvé.";
}

$conn->close();
?>
</body>
</html>