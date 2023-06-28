<?php
session_start();


?>



<!DOCTYPE html>
<html>
<head>
    <title>Chat System</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.chat-container {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.chat-header {
    background-color: #075e54;
    color: #fff;
    padding: 10px;
    text-align: center;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.chat-messages {
    height: 300px;
    padding: 10px;
    overflow-y: scroll;
}

.chat-input {
    display: flex;
    align-items: center;
    padding: 10px;
}

.chat-input select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

.chat-input input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    flex-grow: 1;
    margin-right: 10px;
}

.chat-input .send-button {
    padding: 8px 16px;
    background-color: #128c7e;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.chat-message {
    margin-bottom: 10px;
    background-color: #000;
    width: 150px;
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 5px;
}

.sender {
    text-align: left;
    background-color: #0d0c0c;
    color: white;

}

.receiver {
    text-align: left;
    background-color: #99ff99;
}

.stock-available {
    background-color: #99ff99;
}

.stock-defect {
    background-color: #ff8080;
}

.stock-unavailable {
    background-color: #ffff99;
}

.button-container {
    display: flex;
    align-items: center;
}

.button {
    padding: 5px 10px;
    margin-right: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.defect-button {
    background-color: #ff8080;
    color: #fff;
}

.available-button {
    background-color: #99ff99;
    color: #000;
}

.unavailable-button {
    background-color: #ffff99;
    color: #000;
}

.message {
    width: 150px;
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 5px;
}

.defect {
    background-color: #ff8080;
}

.available {
    background-color: #99ff99;
}

.unavailable {
    background-color: #ffff99;
}


    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Chat System</h2>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="chat-input">
            <div class="button-container">
                <button class="button defect-button" onclick="sendMessage('defect')">Defect</button>
                <button class="button available-button" onclick="sendMessage('available')">Available</button>
                <button class="button unavailable-button" onclick="sendMessage('unavailable')">Unavailable</button>
            </div>
            <input type="text" id="message-input" placeholder="Type your message" required>
            <button class="button send-button" onclick="sendMessageFromInput()">Send</button>
        </div>
    </div>

    <script>
        // Get DOM elements
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');

        // Send message
        function sendMessage(stockStatus) {
            const message = document.createElement('div');
            message.classList.add('message', stockStatus);

            switch (stockStatus) {
                case 'defect':
                    message.textContent = 'Defect';
                    break;
                case 'available':
                    message.textContent = 'Stock is available';
                    break;
                case 'unavailable':
                    message.textContent = 'Stock not available';
                    break;
            }

            chatMessages.appendChild(message);

            // Scroll to the bottom of the chat container
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Send the message to the server (modify the URL and request as per your needs)
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'send_message.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(`message=${stockStatus}`);
        }

        
           // Send message from input box
           function sendMessageFromInput() {
            const inputMessage = messageInput.value.trim();
            if (inputMessage !== '') {
                displayChatMessage(inputMessage, 'sender');
                messageInput.value = '';

                // Scroll to the bottom of the chat container
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }

        // Display chat message
        function displayChatMessage(message, className) {
            const chatMessage = document.createElement('div');
            chatMessage.classList.add('chat-message', className);
            chatMessage.textContent = message;
            chatMessages.appendChild(chatMessage);
        }
        
       
    </script>
</body>
</html>
