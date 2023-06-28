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
        $response .= "\n Description: " . $scheme['description'] . "\n";

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><span class="text-warning">Paa</span>Lan</a>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <i class="fa fa-building" aria-hidden="true"></i>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="log.html">Log in/sign up</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/indian1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption ">
              <h5>POSHAN Abhiyan</h5>
              <p>PM's Overaarching Scheme for Holistic Nourishment.</p>
              <p><a href="https://poshanabhiyaan.gov.in/" class="btn btn-warning nt-3">Learn More</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/indian2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption ">
              <h5>Sukanya Samriddhi Yojana</h5>
              <p>For the bright future of ypur girl child</p>
              <p><a href="https://jaano.swaniti.org/" class="btn btn-warning nt-3">Learn More</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/indian3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption ">
              <h5>Pradhan Mantri Surakshit Matritva Abhiyan</h5>
              <p>Pregnant women lactating women get upto Rs.6000</p>
              <p><a href="https://transformingindia.mygov.in/scheme/sukanya-samriddhi-yojana/" class="btn btn-warning nt-3">Learn More</a></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    

<!-- about starts here -->
<section id="about" class="about section-padding">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-12">
            <div class="about-img">
                <img src="img/about2.jpeg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
            <div class="about-text">
                <h2>About us</h2>
                <p><h5>Paalan is an online platform for Anganwadis. We have a lot of Aganwadis near us, but we are not able to access them. There are a lot of schemes related to Anganwadi 
                  that are beneficial for everyone, but not everybody is able to access them. It's because of the lack of communication. In order to reduce this issue, 
                  we came up with a solution called Paalan. It will help them recognize the
                  stock that is not being utilized and identify the region where there is a lack of stock and transport the balance or extra stock into that particular region.
                </h5>
                </p>
            </div>

        </div>
    </div>
</div>
</section>

<section id="services" class="services section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-header text-center pb-5">
          <h2>Our Services</h2>
          <p>Paalan helps in managing stock and admissions related to Anganwadi and  <br>helps in communicating with people about the new schemes. </p>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card text-white text-center bg-dark pb-2">
          <div class="card-body">
            <i class="bi bi-bar-chart"></i>
            <h3 class="card-title">Social impact</h3>
            <p class="lead">Paalan aims to create a positive social impact by improving access to Anganwadi schemes and resources, 
                ensuring that more individuals and communities can benefit from them.
               </p>
               <button class="btn btn-warning text-dark">Read More</button>
          </div>
        </div>
      </div>
      
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card text-white text-center bg-dark pb-2">
            <div class="card-body">
              <i class="bi bi-buildings-fill"></i>
              <h3 class="card-title">Technology</h3>
              <p class="lead">With its innovative digital platform, Paalan harnesses the power of technology to facilitate data collection, analysis, 
                and resource allocation.
                 </p>
                 <button class="btn btn-warning text-dark">Read More</button>
            </div>
          </div>
        </div>
        
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-dark pb-2">
              <div class="card-body">
                <i class="bi bi-calendar2-heart"></i>
                <h3 class="card-title">Community development</h3>
                <p class="lead">Paalan contributes to community development by strengthening the infrastructure and services of Anganwadis,
                   enabling them to better serve the needs of the community
                   </p>
                   <button class="btn btn-warning text-dark">Read More</button>
              </div>
            </div>
          </div>

    </div>
  </div>

</section>

<!-- sevake starts here -->
<div class="chat-container" id="chat-container">
        <h2>Sevake</h2>
        <div class="chat-messages" id="chat-messages">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="input-container">
            <input type="text" id="message-input" placeholder="Type your message" required>
            <button id="send-button">Send</button>
        </div>
        <button class="minimize-button" id="minimize-button" onclick="minimizeChatWindow()">&minus;</button>
    </div>

    <div class="chat-button" onclick="openChatWindow()">Chat</div>

    <script>
        const chatContainer = document.getElementById('chat-container');
        const chatButton = document.getElementsByClassName('chat-button')[0];
        const minimizeButton = document.getElementById('minimize-button');
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');

        // Function to open the chat window
        function openChatWindow() {
            chatContainer.style.display = 'block';
        }

        // Function to minimize the chat window
        function minimizeChatWindow() {
            chatContainer.style.display = 'none';
        }

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
    <style>

.chat-container {
           position: fixed;
            bottom: 100px;
            right: 5px;
            background-color: #f4f4f4;
            border-radius: 5px;
            padding: 20px;
            display: none; /* Hide the chat container by default */
            z-index: 1000;
            width:400px;
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
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .chat-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: #fff;
            font-size: 24px;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
            z-index: 9999;
        }

        .minimize-button {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            border: none;
            background-color: transparent;
            color: #aaa;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
    <!-- sevake ends here -->

<!-- contact section -->

<section id="contact" class="contact section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-header text-center pb-5">
          <h2>
            Contact Us
          </h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
      <div class="row m-0">
        <div class="col-md-12 p-0 pt-4 pb-4">
          <form action="#" class="bg-light p-4.m-auto" >
            <div class="row m-0">
              <div class="col-md-12 p-0 pt-4 pb-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="text" class="form-control" required placeholder="Your full name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="email" class="form-control" required placeholder="Your email here">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <textarea rows="3" required class="form-control" placeholder="Your Query here"></textarea>
                    </div>
                  </div>
                  <button class="btn btn-warning btn-lg btn-block mt-3">Submit</button>
      
                </div>
              </div>
            </div>
      
      
      
      
      
      
          </div>
        </div>
      </section>
          </form>
      </div>






    </div>
  </div>
</section>


<!-- footer -->

<footer class="bg-dark p-2 text-center">
  <div class="container">
    <p class="text-white">All Right Reserved @Paalan</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script> 
<script src="https://smtpjs.com/v3/smtp.js">
</script>

 <script>
  var btn = document.getElementById('btn');
  btn.addEventListener('click',function(e) {
    e.preventDefault()
    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "triggeredspid@gmail.com",
    Password : "password",
    To : 'triggeredspid@gmail.com',
    From : "you@isp.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => alert(message)
);
  })
 </script>
</body>
</html>
