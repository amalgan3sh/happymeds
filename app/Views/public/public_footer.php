 
<style>
.chatbot-icon {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  background-color: #007bff;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

.chatbot-icon:hover {
  transform: scale(1.1);
}

.chatbot-icon i {
  color: white;
  font-size: 24px;
}

.chatbot-container {
  display: none;
  position: fixed;
  bottom: 90px;
  right: 20px;
  width: 350px;
  height: 500px;
  background-color: #f8f9fa;
  border-radius: 10px;
  overflow: hidden;
  flex-direction: column;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
}

.chatbot-header {
  background-color: #007bff;
  color: white;
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.chatbot-header h3 {
  margin: 0;
  font-size: 18px;
}

#close-chat {
  background: none;
  border: none;
  color: white;
  font-size: 24px;
  cursor: pointer;
}

.chat-messages {
  flex-grow: 1;
  overflow-y: auto;
  padding: 10px;
}

.message {
  max-width: 80%;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 20px;
  line-height: 1.4;
  word-wrap: break-word;
}

.user-message {
  background-color: #007bff;
  color: white;
  align-self: flex-end;
  margin-left: auto;
}

.bot-message {
  background-color: #e9ecef;
  color: #343a40;
}

.faq-prompts {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
  padding: 10px;
}

.faq-prompt {
  background-color: #e9ecef;
  border: none;
  border-radius: 20px;
  padding: 5px 10px;
  font-size: 12px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.faq-prompt:hover {
  background-color: #ced4da;
}

.chat-input-area {
  display: flex;
  padding: 10px;
  background-color: #fff;
}

#user-input {
  flex-grow: 1;
  border: 1px solid #ced4da;
  border-radius: 20px;
  padding: 8px 15px;
  font-size: 14px;
}

#send-message {
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  margin-left: 10px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

#send-message:hover {
  background-color: #0056b3;
}
</style>

 
 <!-- <section> begin ============================-->
 <section class="py-8 bg-1000">

<div class="container">
  <div class="row flex-center">
    <div class="col-auto mb-5"><a class="pe-2 d-flex align-items-center text-decoration-none fw-bold fs-3" href="#">
        <div class="text-warning">ARANEA</div>
        <!-- <div class="text-white">Meds</div> -->
      </a></div>
  </div>
  <div class="row flex-center">
    <div class="col-auto mb-5">
      <ul class="list-unstyled list-inline mb-0">
        <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Home</a></li>
        <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Key Features</a></li>
        <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Pricing</a></li>
        <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">Testimonial</a></li>
        <li class="list-inline-item me3 me-sm-4"><a class="text-light text-decoration-none" href="#!">FAQ</a></li>
      </ul>
    </div>
  </div>
  <div class="row flex-center">
    <div class="col-auto mb-5">
      <ul class="list-unstyled list-inline">
        <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!">
            <svg class="bi bi-facebook" xmlns="https://www.w3.org/2000/svg" width="32" height="32" fill="#7D7987" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
            </svg></a></li>
        <li class="list-inline-item me-3"><a href="#!">
            <svg class="bi bi-twitter" xmlns="https://www.w3.org/2000/svg" width="32" height="32" fill="#7D7987" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
            </svg></a></li>
        <li class="list-inline-item me-3"><a href="#!">
            <svg class="bi bi-instagram" xmlns="https://www.w3.org/2000/svg" width="32" height="32" fill="#7D7987" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"> </path>
            </svg></a></li>
      </ul>
    </div>
  </div>
  <div class="row flex-center">
    <div class="col-auto">
      <p class="mb-0 fs--1 text-700">&copy; This website created by &nbsp;
        <svg class="bi bi-suit-heart-fill" xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 16 16">
        </svg><a class="text-700" href="https://spyderhub.in/" target="_blank">SpyderHub </a>
      </p>
    </div>
  </div>
</div>
<!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->


</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->




<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="<?php echo base_url('assets/');?>vendors/@popperjs/popper.min.js"></script>
<script src="<?php echo base_url('assets/');?>vendors/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>vendors/is/is.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="<?php echo base_url('assets/');?>assets/js/theme.js"></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>


<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
<!-- Floating Chatbot -->
<div id="chatbot-icon" class="chatbot-icon">
  <i class="fas fa-comments"></i>
</div>

<div id="chatbot-container" class="chatbot-container">
  <div class="chatbot-header">
    <h3>Aranea Assistant</h3>
    <button id="close-chat">×</button>
  </div>
  <div id="chat-messages" class="chat-messages">
    <!-- Chat messages will be inserted here -->
  </div>
  <div id="faq-prompts" class="faq-prompts">
    <!-- FAQ prompts will be inserted here -->
  </div>
  <div class="chat-input-area">
    <input type="text" id="user-input" placeholder="Type your message...">
    <button id="send-message"><i class="fas fa-paper-plane"></i></button>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const chatbotIcon = document.getElementById('chatbot-icon');
  const chatbotContainer = document.getElementById('chatbot-container');
  const closeChat = document.getElementById('close-chat');
  const userInput = document.getElementById('user-input');
  const sendMessage = document.getElementById('send-message');
  const chatMessages = document.getElementById('chat-messages');
  const faqPrompts = document.getElementById('faq-prompts');

  const faqs = [
    { question: "How are you?", answer: "I'm doing well, thank you! How can I assist you today?" },
    { question: "What services do you offer?", answer: "We offer a range of healthcare investment and ecommerce solutions. Would you like more details on a specific service?" },
    { question: "How do I create an account?", answer: "To create an account, click on the 'Register Now' button for your preferred account type on our homepage. Follow the prompts to complete your registration." },
    { question: "Is my data secure?", answer: "Yes, we take data security very seriously. We use advanced encryption and follow strict privacy policies to protect your information." }
  ];

  function createFAQPrompts() {
    faqs.forEach(faq => {
      const promptButton = document.createElement('button');
      promptButton.classList.add('faq-prompt');
      promptButton.textContent = faq.question;
      promptButton.addEventListener('click', () => handleFAQPrompt(faq.question, faq.answer));
      faqPrompts.appendChild(promptButton);
    });
  }

  function handleFAQPrompt(question, answer) {
    addMessage(question, true);
    setTimeout(() => addMessage(answer), 500);
  }

  chatbotIcon.addEventListener('click', function() {
    chatbotContainer.style.display = 'flex';
    chatbotIcon.style.display = 'none';
  });

  closeChat.addEventListener('click', function() {
    chatbotContainer.style.display = 'none';
    chatbotIcon.style.display = 'flex';
  });

  function addMessage(message, isUser = false) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message');
    messageElement.classList.add(isUser ? 'user-message' : 'bot-message');
    messageElement.textContent = message;
    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function handleUserMessage(message) {
    // This is where you'd integrate with a real chatbot API
    // For now, we'll just provide a generic response
    setTimeout(() => {
      addMessage("Thank you for your message. Our team will get back to you soon with a detailed response.");
    }, 500);
  }

  sendMessage.addEventListener('click', function() {
    const message = userInput.value.trim();
    if (message) {
      addMessage(message, true);
      userInput.value = '';
      handleUserMessage(message);
    }
  });

  userInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      sendMessage.click();
    }
  });

  // Initial bot message and FAQ prompts
  addMessage("Hello! How can I assist you with Aranea's platform today? You can also click on the prompts below for quick answers to common questions.");
  createFAQPrompts();
});
</script>
</body>

</html>