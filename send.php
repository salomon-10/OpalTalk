<?php
session_start();
require 'config.php';

if (isset($_POST['message'], $_POST['receiver_id'], $_SESSION['user_id'])) {
    $message = trim($_POST['message']);
    $receiver_id = (int) $_POST['receiver_id'];
    $sender_id = $_SESSION['user_id'];

    if ($message !== '') {
        $stmt = $pdo->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
        $stmt->execute([$sender_id, $receiver_id, $message]);
    }
}
?>
