<?php

$path_suffix = "../";  
$path = $_SERVER['SCRIPT_FILENAME'];  
if (stristr($path, 'index.php')){  
    $path_suffix = "./";  
}

echo '
<head>
    <link rel="stylesheet" href="'.$path_suffix.'CSS/contactbull.css">
</head>
<div id="contactnous" >
    <img src="'.$path_suffix.'img/general/contact.png" alt="LogoConv">
</div>
<div id="chat-popup">
    <div id="chat-history">
        <div id="chat-output">
            <p>Hello! How can I assist you today?</p>
        </div>
    </div>
    <div id="chat-questions">
        <button class="question-btn" data-answer="Our online store is open 24/7, you can shop anytime!">When is your online store open?</button>
        <button class="question-btn" data-answer="You can contact us via email at support@example.com.">How can I contact you?</button>
        <button class="question-btn" data-answer="We offer a 30-day warranty on all our products.">Do you have a warranty on your products?</button>
        <button class="question-btn" data-answer="Our shipping fees are $5, and delivery is free for orders over $50.">What are your shipping fees?</button>
        <button class="question-btn" id="talk-to-human">Talk to a human</button>
    </div>
</div>
';

?>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const contactBtn = document.getElementById("contactnous");
    const chatPopup = document.getElementById("chat-popup");
    const chatHistory = document.getElementById("chat-history");
    const questionBtns = document.querySelectorAll(".question-btn");
    
    // Show the popup when hovering over the contact button
    contactBtn.addEventListener("mouseenter", function () {
        chatPopup.classList.add("show");
    });

    // Keep the popup visible while hovering over the popup
    chatPopup.addEventListener("mouseenter", function () {
        chatPopup.classList.add("show");
    });

    // Hide the popup when moving away from the button and the popup
    contactBtn.addEventListener("mouseleave", function () {
        setTimeout(function() {
            if (!chatPopup.matches(':hover')) {
                chatPopup.classList.remove("show");
            }
        }, 100);
    });

    chatPopup.addEventListener("mouseleave", function () {
        setTimeout(function() {
            if (!contactBtn.matches(':hover')) {
                chatPopup.classList.remove("show");
            }
        }, 100);
    });

    // Handle clicks on the question buttons with automatic responses
    questionBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            const userQuestion = btn.innerText;
            const botAnswer = btn.getAttribute("data-answer");

            // Add the user's question to the chat history
            const userMessage = document.createElement("p");
            userMessage.classList.add("user-message");
            userMessage.innerText = "You: " + userQuestion;
            chatHistory.appendChild(userMessage);

            // Simulate a delay before showing the bot's response
            setTimeout(function() {
                const botMessage = document.createElement("p");
                botMessage.classList.add("bot-message");
                if(botAnswer == null){
                    botAnswer = "";
                }
                botMessage.innerText = "" + botAnswer;
                chatHistory.appendChild(botMessage);

                // Scroll to the bottom to view the latest message
                chatHistory.scrollTop = chatHistory.scrollHeight;
            }, 1000);  // Delay of 1 second before bot responds
        });
    });

    // Handle "Talk to a human" button click without automatic response
    const talkToHumanBtn = document.getElementById("talk-to-human");

    talkToHumanBtn.addEventListener("click", function() {
        // Add the user's message for the "Talk to a human" button without an immediate response
        const userMessage = document.createElement("p");
        userMessage.classList.add("user-message");
        chatHistory.appendChild(userMessage);

        // Simulate a delay before showing the bot's response
        setTimeout(function() {
            const loadingMessage = document.createElement("p");
            loadingMessage.classList.add("bot-message");
            loadingMessage.innerText = "Looking for an agent, please wait...";
            chatHistory.appendChild(loadingMessage);

            // Scroll to the bottom to view the latest message
            chatHistory.scrollTop = chatHistory.scrollHeight;

            // Simulate a longer delay before the final message
            setTimeout(function() {
                // Replace the loading message with the final response
                loadingMessage.innerText = "Sorry, everybody is busy, try later.";
            }, 3000);  // Delay of 3 seconds before final response
        }, 1000);  // Delay of 1 second before initial response
    });
});
</script>

