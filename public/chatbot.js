(function () {
    let chatToken;
    let chatURL;

    // Função para inicializar o chatbot com o ID do cliente e URL do endpoint
    window.initializeChatBot = function (tokenChat, urlChat) {
        chatToken = tokenChat;
        chatURL = urlChat;
        createChatButton();
    };

    // Função para criar o botão flutuante do chat
    function createChatButton() {
        const button = document.createElement('button');
        button.id = 'chatbot-floating-button';
        // button.innerText = 'Chat com IA';
        button.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 13.85 2.5 15.55 3.4 17L2 22L6.96 20.58C8.41 21.41 10.15 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C10.34 20 8.85 19.47 7.7 18.55L7.13 18.07L4 19L5 15.86L4.55 15.27C3.67 14.19 3.1 12.87 3.1 11.5C3.1 7.6 6.1 4.6 10 4.6C13.9 4.6 16.9 7.6 16.9 11.5C16.9 15.4 13.9 18.4 10 18.4H10.15L12 17H10.4H10.3C11.7 17 13.1 16.8 14.4 16.3L15.15 16L14.7 16.27C13.59 16.84 12.32 17.1 11 17.1C11.35 17.1 11.7 17 12 17H12.45H12.6H12H12.2H12H12.4H12.7L14.7 16.25L14.7 16.25L12 16.27V16.17H12.2L14.7 16.3L14.7 16.3V16.37L12.55 16.3H12.3V16.4L12.45 16.3V16.45L12.15 17.05L11.4 16.8L12.15 17.05V16.95L14.55 17.2L12 17V16.27Z" fill="white"/>
            </svg>
        `;
        Object.assign(button.style, {
            position: 'fixed',
            bottom: '20px',
            right: '20px',
            backgroundColor: '#007bff',
            color: '#fff',
            borderRadius: '50%',
            width: '60px',
            height: '60px',
            border: 'none',
            cursor: 'pointer',
            fontSize: '16px',
            boxShadow: '0px 4px 8px rgba(0, 0, 0, 0.2)',
            zIndex: '1000',
        });
        document.body.appendChild(button);

        button.addEventListener('click', openChatWindow);
    }

    // Função para abrir a janela do chat
    function openChatWindow() {
        const existingChatWindow = document.getElementById('chatbot-chat-window');
        if (existingChatWindow) {
            existingChatWindow.remove();
        }

        const floatingButton = document.getElementById('chatbot-floating-button');
        if (floatingButton) {
            floatingButton.style.display = 'none';
        }

        const chatWindow = document.createElement('div');
        chatWindow.id = 'chatbot-chat-window';
        Object.assign(chatWindow.style, {
            position: 'fixed',
            bottom: '20px',
            right: '20px',
            width: '500px',
            height: '600px',
            backgroundColor: '#fff',
            borderRadius: '8px',
            boxShadow: '0px 4px 12px rgba(0, 0, 0, 0.1)',
            display: 'flex',
            flexDirection: 'column',
            zIndex: '1001',
        });
        document.body.appendChild(chatWindow);

        const closeButton = document.createElement('button');
        closeButton.innerText = '✖';
        Object.assign(closeButton.style, {
            alignSelf: 'flex-end',
            background: 'none',
            border: 'none',
            fontSize: '20px',
            cursor: 'pointer',
            margin: '5px',
            color: '#666',
        });
        closeButton.addEventListener('click', () => {
            chatWindow.remove();
            if (floatingButton) floatingButton.style.display = 'block';
        });
        chatWindow.appendChild(closeButton);

        const messagesContainer = document.createElement('div');
        messagesContainer.style.flex = '1';
        messagesContainer.style.padding = '10px';
        messagesContainer.style.overflowY = 'auto';
        chatWindow.appendChild(messagesContainer);

        loadMessages(messagesContainer);

        const inputContainer = document.createElement('div');
        inputContainer.style.display = 'flex';
        inputContainer.style.borderTop = '1px solid #ccc';
        chatWindow.appendChild(inputContainer);

        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'Digite sua mensagem...';
        input.style.borderRadius = '8px 0 0 8px';
        input.style.width = '70%';
        input.style.flex = '1';
        input.style.padding = '10px';
        input.style.border = 'none';
        input.style.outline = 'none';
        inputContainer.appendChild(input);

        const sendButton = document.createElement('button');
        sendButton.innerText = 'Enviar';
        Object.assign(sendButton.style, {
            width: '30%',
            backgroundColor: '#007bff',
            color: '#fff',
            border: 'none',
            padding: '10px',
            cursor: 'pointer',
            borderRadius: '0 0 8px 0',
        });
        inputContainer.appendChild(sendButton);

        sendButton.addEventListener('click', () => sendMessage(input.value, messagesContainer, input));
    }

    // Função para enviar a mensagem ao endpoint
    function sendMessage(message, messagesContainer, input) {
        if (!message.trim()) return;

        const userMessage = document.createElement('div');
        userMessage.innerText = message;
        userMessage.style.alignSelf = 'flex-end';
        userMessage.style.margin = '5px';
        userMessage.style.padding = '8px';
        userMessage.style.backgroundColor = '#007bff';
        userMessage.style.color = '#fff';
        userMessage.style.borderRadius = '5px';
        messagesContainer.appendChild(userMessage);
        saveMessage(message, 'user');

        input.value = '';

        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        fetch(chatURL + '/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + chatToken,
            },
            body: JSON.stringify({ message }),
        })
            .then(response => response.json())
            .then(data => {
                const botMessage = document.createElement('div');
                botMessage.innerText = data.reply || 'Desculpe, houve um problema ao processar sua mensagem.';
                botMessage.style.alignSelf = 'flex-start';
                botMessage.style.margin = '5px';
                botMessage.style.padding = '8px';
                botMessage.style.backgroundColor = '#e0e0e0';
                botMessage.style.borderRadius = '5px';
                messagesContainer.appendChild(botMessage);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;

                messagesContainer.scrollTop = messagesContainer.scrollHeight;
                
                saveMessage(data.reply, 'bot');
            })
            .catch(error => {
                console.error('Erro ao enviar mensagem:', error);
            });
    }

    function saveMessage(message, sender) {
        const chatHistory = JSON.parse(localStorage.getItem('chatHistory')) || [];
        chatHistory.push({ message, sender });
        localStorage.setItem('chatHistory', JSON.stringify(chatHistory));
    }

    function loadMessages(messagesContainer) {
        const chatHistory = JSON.parse(localStorage.getItem('chatHistory')) || [];
        chatHistory.forEach(({ message, sender }) => {
            const messageDiv = document.createElement('div');
            messageDiv.innerText = message;
            messageDiv.style.margin = '5px';
            messageDiv.style.padding = '8px';
            messageDiv.style.borderRadius = '5px';

            if (sender === 'user') {
                Object.assign(messageDiv.style, {
                    alignSelf: 'flex-end',
                    backgroundColor: '#007bff',
                    color: '#fff',
                });
            } else {
                Object.assign(messageDiv.style, {
                    alignSelf: 'flex-start',
                    backgroundColor: '#e0e0e0',
                });
            }

            messagesContainer.appendChild(messageDiv);
        });
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
})();
