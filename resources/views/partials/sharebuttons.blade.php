{{--
    Reusable share bar. Include twice on the article page:
    once above the featured image, once at the bottom.

    Usage: @include('partials.share-buttons', ['article' => $article])
--}}
@php
    $shareUrl   = urlencode(url()->current());
    $shareTitle = urlencode($article->title);
    $shareText  = urlencode($article->title . ' - ' . url()->current());
@endphp

<div class="share-bar">
    <span class="share-bar__label">Share this article</span>

    <div class="share-bar__icons">
        {{-- Facebook --}}
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
           class="share-icon share-icon--facebook"
           target="_blank" rel="noopener noreferrer"
           aria-label="Share on Facebook" title="Share on Facebook">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.89h2.78l-.45 2.91h-2.33V22c4.78-.76 8.44-4.92 8.44-9.94Z"/>
            </svg>
        </a>

        {{-- X / Twitter --}}
        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
           class="share-icon share-icon--twitter"
           target="_blank" rel="noopener noreferrer"
           aria-label="Share on X (Twitter)" title="Share on X (Twitter)">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                <path d="M18.24 2H21l-6.6 7.54L22.2 22h-6.1l-4.78-6.26L5.83 22H3l7.06-8.07L2.1 2h6.26l4.32 5.72L18.24 2Zm-1.07 18.17h1.7L7.9 3.74H6.08l11.09 16.43Z"/>
            </svg>
        </a>

        {{-- WhatsApp --}}
        <a href="https://api.whatsapp.com/send?text={{ $shareText }}"
           class="share-icon share-icon--whatsapp"
           target="_blank" rel="noopener noreferrer"
           aria-label="Share on WhatsApp" title="Share on WhatsApp">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                <path d="M12.01 2C6.49 2 2.02 6.48 2.02 12c0 1.87.51 3.63 1.4 5.13L2 22l4.99-1.38A9.95 9.95 0 0 0 12.01 22C17.53 22 22 17.52 22 12S17.53 2 12.01 2Zm5.8 14.14c-.24.68-1.4 1.3-1.94 1.38-.5.08-1.13.11-1.83-.12-.42-.13-.96-.31-1.65-.61-2.9-1.25-4.79-4.17-4.94-4.36-.14-.2-1.18-1.57-1.18-3s.75-2.13 1.02-2.42c.26-.29.57-.36.76-.36h.55c.18 0 .42-.07.65.5.24.58.8 2 .87 2.15.07.14.11.31.02.5-.09.19-.14.3-.28.47-.14.16-.29.36-.42.48-.14.13-.28.28-.12.55.16.28.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.14.44.12.6-.07.16-.19.7-.81.88-1.09.18-.28.36-.23.6-.14.24.09 1.55.73 1.82.87.27.14.44.2.51.32.07.12.07.68-.17 1.36Z"/>
            </svg>
        </a>

        {{-- Gmail --}}
        <a href="https://mail.google.com/mail/?view=cm&fs=1&su={{ $shareTitle }}&body={{ $shareText }}"
           class="share-icon share-icon--gmail"
           target="_blank" rel="noopener noreferrer"
           aria-label="Share via Gmail" title="Share via Gmail">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5-8-5V6l8 5 8-5v2Z"/>
            </svg>
        </a>

        {{-- Instagram has no web share-link endpoint, so this copies the URL
             so it can be pasted into a Story / bio / DM. --}}
        {{-- <button type="button"
                class="share-icon share-icon--instagram js-instagram-share"
                data-url="{{ url()->current() }}"
                aria-label="Copy link to share on Instagram" title="Copy link for Instagram">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                <path d="M12 2c2.72 0 3.06.01 4.12.06 1.06.05 1.79.22 2.43.47.66.26 1.21.6 1.76 1.15.5.5.9 1.1 1.15 1.76.25.64.42 1.37.47 2.43.05 1.06.06 1.4.06 4.12s-.01 3.06-.06 4.12c-.05 1.06-.22 1.79-.47 2.43a4.9 4.9 0 0 1-1.15 1.76 4.9 4.9 0 0 1-1.76 1.15c-.64.25-1.37.42-2.43.47C15.06 22 14.72 22 12 22s-3.06-.01-4.12-.06c-1.06-.05-1.79-.22-2.43-.47a4.9 4.9 0 0 1-1.76-1.15 4.9 4.9 0 0 1-1.15-1.76c-.25-.64-.42-1.37-.47-2.43C2 15.06 2 14.72 2 12s.01-3.06.06-4.12c.05-1.06.22-1.79.47-2.43.26-.66.6-1.21 1.15-1.76.5-.5 1.1-.9 1.76-1.15.64-.25 1.37-.42 2.43-.47C8.94 2.01 9.28 2 12 2Zm0 2c-2.67 0-2.99.01-4.04.06-.87.04-1.34.18-1.65.3-.42.16-.71.35-1.02.66-.31.31-.5.6-.66 1.02-.12.31-.26.78-.3 1.65C4.28 8.74 4.27 9.06 4.27 12s.01 3.26.06 4.31c.04.87.18 1.34.3 1.65.16.42.35.71.66 1.02.31.31.6.5 1.02.66.31.12.78.26 1.65.3 1.05.05 1.37.06 4.04.06s2.99-.01 4.04-.06c.87-.04 1.34-.18 1.65-.3.42-.16.71-.35 1.02-.66.31-.31.5-.6.66-1.02.12-.31.26-.78.3-1.65.05-1.05.06-1.37.06-4.31s-.01-3.26-.06-4.31c-.04-.87-.18-1.34-.3-1.65a2.7 2.7 0 0 0-.66-1.02 2.7 2.7 0 0 0-1.02-.66c-.31-.12-.78-.26-1.65-.3C14.99 4.01 14.67 4 12 4Zm0 3.5A4.5 4.5 0 1 1 12 16a4.5 4.5 0 0 1 0-8.5Zm0 2A2.5 2.5 0 1 0 12 14a2.5 2.5 0 0 0 0-5Zm4.75-2.15a1.05 1.05 0 1 1 0 2.1 1.05 1.05 0 0 1 0-2.1Z"/>
            </svg>
        </button> --}}
    </div>
</div>