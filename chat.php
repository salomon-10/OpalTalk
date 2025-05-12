<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
    exit();
}

require 'config.php';

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OpalTalk - Chat privé</title>
    <link rel="icon" href="img/opaltalk.ico" type="opaltalk/x-icon">
    <link rel="stylesheet" href="chat.css">
</head>
<body>
<div class="container">

  <div class="chat">
     <h2 id="userStatus" class="user-status"><?php echo htmlspecialchars($username); ?></h2>
       <button onclick="toggleDarkMode()" class="dark-mode-btn">dark-mode🌙</button>
       
    <div class="email">
     
      <input type="text" id="recherche" placeholder="Rechercher un contact..." class="search-bar">
    
      <h3>Contacts</h3>
      <ul class="contact-list">
        
        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=opaltalk', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $query = $bdd->query('SELECT id, username FROM users WHERE id != ' . $user_id);
        while ($user = $query->fetch()) {
            echo '<li onclick="openChat(' . $user['id'] . ', \'' . $user['username'] . '\')">' . htmlspecialchars($user['username']) . '</li>';
        }
       

        ?>
      </ul>
    </div>
  </div>

  <div class="message-zone">
  <h2 id="chatWith" class="chat-with">Chat avec ...</h2>

    <div class="message_box" id="messages">
      <p>Choisissez un contact pour commencer à discuter.</p>
    </div>

    <form id="messageForm" class="typing-area">
        
      <input type="text" id="message" name="message" placeholder="Message et Emoji..." required>
      <button type="submit">Envoyer</button>
    </form>
  </div>
</div>


<script>
let currentReceiverId = null;

function openChat(receiverId, receiverName) {
    currentReceiverId = receiverId;
    document.getElementById('chatWith').textContent = "Chat avec " + receiverName;
    document.getElementById('messages').innerHTML = '<p>Chargement des messages avec ' + receiverName + '...</p>';
    fetchMessagesWith(receiverId);
}

function fetchMessagesWith(receiverId) {
    fetch('fetch.php?receiver_id=' + receiverId)
        .then(res => res.text())
        .then(data => {
            document.getElementById('messages').innerHTML = data;
        });
}

setInterval(() => {
    if (currentReceiverId) {
        fetchMessagesWith(currentReceiverId);
    }
}, 2000);

document.getElementById('messageForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const message = document.getElementById('message').value;
    if (message.trim() === '' || !currentReceiverId) return;

    fetch('send.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'message=' + encodeURIComponent(message) + '&receiver_id=' + currentReceiverId
    }).then(() => {
        document.getElementById('message').value = '';
        fetchMessagesWith(currentReceiverId);
    });
});

//  recherche 
document.getElementById('recherche').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    document.querySelectorAll('.contact-list li').forEach(item => {
        const name = item.textContent.toLowerCase();
        item.style.display = name.includes(query) ? 'block' : 'none';
    });
});

// dark
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
}

// 
window.onload = () => {
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
}
// emoji
const button = document.querySelector('#emoji-button');
const input = document.querySelector('#message');
const picker = new EmojiButton({
  position: 'top-end',
  autoHide: false,
  showPreview: false
});

button.addEventListener('click', () => {
  picker.togglePicker(button);
});

picker.on('emoji', emoji => {
  input.value += emoji;
  input.focus();
});
</script>
</script>
</body>
</html>
