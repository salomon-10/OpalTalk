<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['receiver_id'])) {
    exit;
}

$my_id = $_SESSION['user_id'];
$receiver_id = (int) $_GET['receiver_id'];

$stmt = $pdo->prepare("
    SELECT messages.*, users.username 
    FROM messages 
    JOIN users ON messages.sender_id = users.id
    WHERE (sender_id = :me AND receiver_id = :them)
       OR (sender_id = :them AND receiver_id = :me)
    ORDER BY created_at ASC
");
$stmt->execute([
    'me' => $my_id,
    'them' => $receiver_id
]);

while ($row = $stmt->fetch()) {
    $me = ($row['sender_id'] == $my_id) ? 'me' : '';
    echo "<div class='message $me'><strong>{$row['username']}:</strong> " . htmlspecialchars($row['message']) . "</div>";
}


?>
