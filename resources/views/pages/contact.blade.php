@extends('layouts.app')

@section('title', 'Contact | The Valley & Peaks')
@section('meta_description', 'Get in touch with The Valley & Peaks for collaborations, partnerships, and travel-related inquiries.')

@section('content')
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero__content">
            <p class="hero__eyebrow">Get in Touch</p>
            <h1 class="hero__title">Contact Us</h1>
            <p class="hero__subtitle">We'd love to hear from you — whether it's a collaboration, partnership, or travel question.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <div class="contact-info__item">
                    <div class="contact-info__label">Email</div>
                    <p><a href="mailto:hello@thevalleyandpeaks.com">hello@thevalleyandpeaks.com</a></p>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__label">Collaboration Inquiries</div>
                    <p>Brand collaborations, content partnerships, and media features.</p>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__label">Tourism Board Partnerships</div>
                    <p>Destination marketing and promotional collaborations with tourism boards.</p>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__label">Hotel Partnerships</div>
                    <p>Hotel reviews, hosted stays, and hospitality partnerships.</p>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__label">Business Inquiries</div>
                    <p>Travel-related business opportunities and affiliate partnerships.</p>
                </div>

                <div class="social-links">
                    <a href="https://instagram.com/thevalleyandpeaks" target="_blank" rel="noopener">Instagram</a>
                    <a href="https://facebook.com/thevalleyandpeaks" target="_blank" rel="noopener">Facebook</a>
                    <a href="https://twitter.com/thevalleyandpeaks" target="_blank" rel="noopener">Twitter</a>
                </div>
            </div>

            <div>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')<span style="color: red; font-size: 0.875rem;">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<span style="color: red; font-size: 0.875rem;">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="inquiry_type">Inquiry Type</label>
                        <select id="inquiry_type" name="inquiry_type" required>
                            <option value="general" @selected(old('inquiry_type') === 'general')>General Inquiry</option>
                            <option value="collaboration" @selected(old('inquiry_type') === 'collaboration')>Collaboration</option>
                            <option value="tourism_board" @selected(old('inquiry_type') === 'tourism_board')>Tourism Board Partnership</option>
                            <option value="hotel_partnership" @selected(old('inquiry_type') === 'hotel_partnership')>Hotel Partnership</option>
                            <option value="brand_collaboration" @selected(old('inquiry_type') === 'brand_collaboration')>Brand Collaboration</option>
                            <option value="business" @selected(old('inquiry_type') === 'business')>Business Inquiry</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
                        @error('subject')<span style="color: red; font-size: 0.875rem;">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                        @error('message')<span style="color: red; font-size: 0.875rem;">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn--primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
