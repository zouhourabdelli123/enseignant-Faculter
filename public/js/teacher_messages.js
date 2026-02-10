// Simple messaging logic for teacher <-> admin chat
const config = window.messageConfig || {};
const messagesContainer = document.getElementById('chatMessages');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendMessageBtn');
const unreadBadge = document.getElementById('unreadBadge');

let lastMessageId = null;

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function formatTime(dateString) {
    if (!dateString) return '--:--';
    const normalized = dateString.replace(' ', 'T');
    const date = new Date(normalized);
    if (Number.isNaN(date.getTime())) return '--:--';
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    return `${hours}:${minutes}`;
}

function renderMessage(message) {
    const isSent = Number(message.envoye_par_enseignant) === 1;
    const wrapper = document.createElement('div');
    wrapper.className = `message${isSent ? ' sent' : ''}`;
    wrapper.innerHTML = `
        <div class="message-avatar">${isSent ? 'P' : 'A'}</div>
        <div class="message-content">
            <div class="message-bubble">${escapeHtml(message.content)}</div>
            <div class="message-time">${formatTime(message.created_at)}</div>
        </div>
    `;
    return wrapper;
}

function renderMessages(messages) {
    if (!messagesContainer) return;
    messagesContainer.innerHTML = '';

    if (!messages.length) {
        messagesContainer.innerHTML = `
            <div class="empty-chat">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M21 15a4 4 0 0 1-4 4H7l-4 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path>
                </svg>
                <p>Aucun message pour le moment.</p>
            </div>
        `;
        return;
    }

    messages.forEach((message) => {
        const node = renderMessage(message);
        messagesContainer.appendChild(node);
        lastMessageId = message.id;
    });

    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

async function loadMessages() {
    if (!config.fetchUrl) return;
    try {
        const response = await fetch(config.fetchUrl, {
            headers: {
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });
        if (!response.ok) return;
        const messages = await response.json();
        if (!Array.isArray(messages)) return;
        const latestId = messages.length ? messages[messages.length - 1].id : null;
        if (latestId !== lastMessageId) {
            renderMessages(messages);
        }
    } catch (error) {
        console.error(error);
    }
}

async function markRead() {
    if (!config.readUrl) return;
    try {
        await fetch(config.readUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': config.csrfToken || '',
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });
        if (unreadBadge) {
            unreadBadge.remove();
        }
        document.querySelectorAll('.nav-badge').forEach((badge) => badge.remove());
    } catch (error) {
        console.error(error);
    }
}

async function sendMessage() {
    const message = (messageInput?.value || '').trim();
    if (!message || !config.sendUrl) return;

    sendButton?.setAttribute('disabled', 'disabled');

    try {
        const response = await fetch(config.sendUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': config.csrfToken || '',
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
            body: JSON.stringify({ message }),
        });

        if (response.ok) {
            messageInput.value = '';
            await loadMessages();
        }
    } catch (error) {
        console.error(error);
    } finally {
        sendButton?.removeAttribute('disabled');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (messageInput) {
        messageInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                sendMessage();
            }
        });
    }

    if (sendButton) {
        sendButton.addEventListener('click', sendMessage);
    }

    markRead();
    loadMessages();
    setInterval(loadMessages, 8000);
});
