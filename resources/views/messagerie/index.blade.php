@extends('dashbaord.main')

@section('content')
<link href="{{ asset('css/message.css') }}" rel="stylesheet">

<div class="page-container">
    <div class="chat-container">
        <div class="chat-sidebar">
            <div class="chat-sidebar-header">
                <h3>Messages</h3>
                <input type="text" class="chat-search" placeholder="Rechercher une conversation..." disabled>
            </div>

            <div class="chat-list">
                <div class="chat-item active">
                    <div class="chat-item-avatar">A</div>
                    <div class="chat-item-info">
                        <div class="chat-item-name">
                            <span>Administration</span>
                            <span class="chat-item-time">
                                {{ $lastMessage ? \Illuminate\Support\Carbon::parse($lastMessage->created_at)->format('H:i') : '--:--' }}
                            </span>
                        </div>
                        <div class="chat-item-last">
                            {{ $lastMessage ? \Illuminate\Support\Str::limit($lastMessage->content, 40) : 'Aucun message' }}
                        </div>
                    </div>
                    @if ($unreadCount > 0)
                        <div class="chat-item-unread" id="unreadBadge">{{ $unreadCount }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="chat-main">
            <div class="chat-header">
                <div class="chat-header-avatar">A</div>
                <div class="chat-header-info">
                    <h4>Administration</h4>
                    <div class="chat-header-status">
                        <span class="status-dot-online"></span>
                        <span>En ligne</span>
                    </div>
                </div>
            </div>

            <div class="chat-messages" id="chatMessages">
                @if ($messages->count() === 0)
                    <div class="empty-chat">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 15a4 4 0 0 1-4 4H7l-4 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path>
                        </svg>
                        <p>Aucun message pour le moment.</p>
                    </div>
                @else
                    @foreach ($messages as $message)
                        @php
                            $isSent = (int) $message->envoye_par_enseignant === 1;
                        @endphp
                        <div class="message {{ $isSent ? 'sent' : '' }}">
                            <div class="message-avatar">{{ $isSent ? 'P' : 'A' }}</div>
                            <div class="message-content">
                                <div class="message-bubble">{{ $message->content }}</div>
                                <div class="message-time">
                                    {{ \Illuminate\Support\Carbon::parse($message->created_at)->format('H:i') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="chat-input-area">
                <div class="chat-input-wrapper">
                    <input type="text" class="chat-input" id="messageInput" placeholder="Tapez votre message...">
                    <button class="chat-send-btn" id="sendMessageBtn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.messageConfig = {
        fetchUrl: "{{ route('message.messages') }}",
        sendUrl: "{{ route('message.send') }}",
        readUrl: "{{ route('message.read') }}",
        teacherId: {{ (int) $teacherId }},
        csrfToken: "{{ csrf_token() }}"
    };
</script>
<script src="{{ asset('js/teacher_messages.js') }}"></script>

@endsection
