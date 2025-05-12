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

// Récup de msg
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

$messages = $stmt->fetchAll();

// Maj "vus"
$updateVu = $pdo->prepare("
    UPDATE messages 
    SET vu = 1 
    WHERE sender_id = :them AND receiver_id = :me AND vu = 0
");
$updateVu->execute([
    'them' => $receiver_id,
    'me' => $my_id
]);

foreach ($messages as $row) {
    $is_me = ($row['sender_id'] == $my_id);

  
    $message_text = htmlspecialchars($row['message']);
    $username = htmlspecialchars($row['username']);

    $class = $is_me ? 'me' : '';

    // lecture
    $status = '';
    if ($is_me) {
        $status = $row['vu'] ? '🟢' : '⚪';
        $status = "<span class='status'>$status</span>";
    }

    echo "<div class='message $class'><strong>$username:</strong> $message_text $status</div>";
    
}
?>

