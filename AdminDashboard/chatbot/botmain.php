<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "Paalan";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch scheme information from the database
function getSchemeInformation($schemeName) {
    global $conn;

    // Prepare the SQL query
    $sql = "SELECT * FROM schemes WHERE scheme_name = '$schemeName'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        // Fetch the scheme information
        $scheme = $result->fetch_assoc();

        // Return the scheme details
        return $scheme;
    } else {
        // Return null if no scheme found
        return null;
    }
}

// Function to handle user messages and generate responses
function handleMessage($message) {
    // Predefined keywords and their corresponding responses
    $keywords = array(
        'hai' => 'Hello, My name is Sevake. How can I help you to understand about the schemes and their eligibility provided by the government?',
        'help' => 'Sure, I can help you with information about schemes available for women and child development in India. Please provide the name of the scheme you want to know about.',
        'thank you' => 'You\'re welcome! If you have any more questions, feel free to ask.',
    );

    // Check if the message contains any predefined keywords
    foreach ($keywords as $keyword => $response) {
        if (stripos($message, $keyword) !== false) {
            return $response;
        }
    }

    // If no predefined keyword matched, assume the message is a scheme name
    $schemeName = trim($message);
    $scheme = getSchemeInformation($schemeName);

    if ($scheme) {
        // Scheme found, generate the response
        $response = "Scheme: " . $scheme['scheme_name'] . "\n";
        $response .= "Eligibility: " . $scheme['eligibility'] . "\n";
        $response .= "Description: " . $scheme['description'];

        return $response;
    } else {
        // Scheme not found
        return "I'm sorry, but I couldn't find information about the scheme you mentioned. Please try again with a different scheme name.";
    }
}

// Handle user input
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $userMessage = $_POST['message'];

    // Process the message and generate a response
    $botResponse = handleMessage($userMessage);

    // Return the response as JSON
    echo json_encode(['response' => $botResponse]);
    exit; // Terminate the script after sending the response
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat Bot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .chat-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #f4f4f4;
            border-radius: 5px;
            padding: 20px;
        }

        .chat-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .chat-messages {
            background-color: #fff;
            padding: 10px;
            height: 300px;
            overflow-y: scroll;
        }

        .user-message {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 10px;
        }

        .bot-message {
            background-color: #d3d3d3;
            padding: 10px;
            margin-bottom: 10px;
        }

        .input-container {
            display: flex;
        }

        .input-container input[type="text"] {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-container button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h2>Chat Bot</h2>
        <div class="chat-messages" id="chat-messages">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="input-container">
            <input type="text" id="message-input" placeholder="Type your message" required>
            <button id="send-button">Send</button>
        </div>
    </div>

    <script>
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');

        // Function to display user messages in the chat window
        function displayUserMessage(message) {
            const userMessage = document.createElement('div');
            userMessage.classList.add('user-message');
            userMessage.textContent = message;
            chatMessages.appendChild(userMessage);
        }

        // Function to display bot messages in the chat window
        function displayBotMessage(message) {
            const botMessage = document.createElement('div');
            botMessage.classList.add('bot-message');
            botMessage.textContent = message;
            chatMessages.appendChild(botMessage);
        }

        // Function to send user message to the server and receive a response
        function sendMessageToServer(message) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    displayBotMessage(response.response);
                }
            };

            const data = 'message=' + encodeURIComponent(message);
            xhr.send(data);
        }

        // Event listener for send button click
        sendButton.addEventListener('click', function() {
            const userMessage = messageInput.value.trim();
            if (userMessage !== '') {
                displayUserMessage(userMessage);
                messageInput.value = '';

                // Scroll to the bottom of the chat container
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Send the user message to the server
                sendMessageToServer(userMessage);
            }
        });

        // Event listener for Enter key press in the input field
        messageInput.addEventListener('keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                sendButton.click();
            }
        });
    </script>
</body>
</html>
