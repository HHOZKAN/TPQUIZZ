<?php
include('../utils/db_connect.php');

$listscoresstmnt = $db->prepare('SELECT * FROM scores ORDER BY number DESC'); // Récupère tous les scores triés du meilleur au pire
$listscoresstmnt->execute();
$scoreslist = $listscoresstmnt->fetchAll(PDO::FETCH_ASSOC);

echo '<section>';
echo '<div>';
echo '<div>';
echo '<table>'; // Balise ouvrante du tableau

echo '<tr>'; // Première ligne pour les titres des colonnes
echo '<th>Utilisateur</th>';
echo '<th>Score</th>';
echo '</tr>';

foreach ($scoreslist as $score) {
    $userid = $score['id_user'];
    $listuserstmnt = $db->prepare('SELECT * FROM users WHERE id = :userid');
    $listuserstmnt->bindParam(':userid', $userid);
    $listuserstmnt->execute();
    $listuser = $listuserstmnt->fetch(PDO::FETCH_ASSOC);

    echo '<tr>'; // Nouvelle ligne pour chaque score
    echo '<td>' . $listuser['name'] . '</td>'; // Nom de l'utilisateur
    echo '<td>' . $score['number'] . '</td>'; // Score
    echo '</tr>';
}

echo '</table>'; // Balise fermante du tableau
echo '</div>';
echo '</div>';
echo '</section>';


?>
