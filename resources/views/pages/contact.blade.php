{{-- resources/views/pages/contact.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- ── Contact Section ── --}}
<section class="contact-section" id="contact">
    <div class="nebula" style="left: -150px; bottom: 10%;"></div>
    
    <p class="section-label">Get In Touch</p>
    <h2>Let's Work Together</h2>
    
    <div class="contact-container" x-data="contactForm()">
        <div class="contact-info">
            <div class="info-card">
                <div class="info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <h3>Email</h3>
                <p>balasaravanan062@gmail.com</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <h3>Location</h3>
                <p>Chennai, India</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <h3>Status</h3>
                <p>Available for Projects</p>
            </div>
            
            <div class="social-links">
                <a href="https://linkedin.com/in/balasaravanan-s-366365235" class="social-link" aria-label="LinkedIn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                </a>
                <a href="https://github.com/Balasad" class="social-link" aria-label="GitHub">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                </a>
                <a href="https://x.com/Balasad_" class="social-link" aria-label="X (Twitter)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>
        </div>

        <form 
            class="contact-form"
            @submit.prevent="submitForm"
            action="https://api.web3forms.com/submit"
            method="POST"
        >
            <input type="hidden" name="access_key" value="f006e32f-5528-4407-a73f-1fd725f4eae0">
            
            <div class="form-group" :class="{ 'has-error': errors.name }">
                <label for="name">Your Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    x-model="form.name"
                    @input="validateField('name')"
                    placeholder="John Doe"
                    :disabled="isSubmitting"
                >
                <span class="error-msg" x-show="errors.name" x-text="errors.name"></span>
            </div>

            <div class="form-group" :class="{ 'has-error': errors.email }">
                <label for="email">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    x-model="form.email"
                    @input="validateField('email')"
                    placeholder="john@example.com"
                    :disabled="isSubmitting"
                >
                <span class="error-msg" x-show="errors.email" x-text="errors.email"></span>
            </div>

            <div class="form-group" :class="{ 'has-error': errors.subject }">
                <label for="subject">Subject</label>
                <input 
                    type="text" 
                    id="subject" 
                    name="subject" 
                    x-model="form.subject"
                    @input="validateField('subject')"
                    placeholder="Project Inquiry"
                    :disabled="isSubmitting"
                >
                <span class="error-msg" x-show="errors.subject" x-text="errors.subject"></span>
            </div>

            <div class="form-group" :class="{ 'has-error': errors.message }">
                <label for="message">Message</label>
                <textarea 
                    id="message" 
                    name="message" 
                    rows="5"
                    x-model="form.message"
                    @input="validateField('message')"
                    placeholder="Tell me about your project..."
                    :disabled="isSubmitting"
                ></textarea>
                <span class="error-msg" x-show="errors.message" x-text="errors.message"></span>
            </div>

            <button type="submit" class="btn-submit" :disabled="isSubmitting || !isValid">
                <span x-show="!isSubmitting && !isSuccess">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    Send Message
                </span>
                <span x-show="isSubmitting && !isSuccess" class="loading-spinner"></span>
                <span x-show="isSuccess" class="success-msg">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Message Sent!
                </span>
            </button>
        </form>
    </div>
</section>

<script>
function contactForm() {
    return {
        form: {
            name: '',
            email: '',
            subject: '',
            message: ''
        },
        errors: {
            name: '',
            email: '',
            subject: '',
            message: ''
        },
        isSubmitting: false,
        isSuccess: false,

        validateField(field) {
            this.errors[field] = '';
            
            if (field === 'name' && !this.form.name.trim()) {
                this.errors.name = 'Name is required';
            }
            
            if (field === 'email') {
                if (!this.form.email.trim()) {
                    this.errors.email = 'Email is required';
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email)) {
                    this.errors.email = 'Please enter a valid email';
                }
            }
            
            if (field === 'subject' && !this.form.subject.trim()) {
                this.errors.subject = 'Subject is required';
            }
            
            if (field === 'message' && !this.form.message.trim()) {
                this.errors.message = 'Message is required';
            } else if (field === 'message' && this.form.message.trim().length < 10) {
                this.errors.message = 'Message must be at least 10 characters';
            }
        },

        get isValid() {
            return (
                this.form.name.trim() &&
                this.form.email.trim() && 
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email) &&
                this.form.subject.trim() &&
                this.form.message.trim() &&
                this.form.message.trim().length >= 10
            );
        },

        async submitForm() {
            ['name', 'email', 'subject', 'message'].forEach(f => this.validateField(f));
            
            if (!this.isValid) return;
            
            this.isSubmitting = true;
            
            try {
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('email', this.form.email);
                formData.append('subject', this.form.subject);
                formData.append('message', this.form.message);
                
                const response = await fetch('https://api.web3forms.com/submit', {
                    method: 'POST',
                    body: formData
                });
                
                if (response.ok) {
                    this.isSuccess = true;
                    this.form = { name: '', email: '', subject: '', message: '' };
                    setTimeout(() => { this.isSuccess = false; }, 5000);
                } else {
                    throw new Error('Failed to send');
                }
            } catch (error) {
                alert('Failed to send message. Please try again.');
            } finally {
                this.isSubmitting = false;
            }
        }
    }
}
</script>

<style>
.contact-section {
    padding: 80px;
    position: relative;
    z-index: 1;
    content-visibility: auto;
    contain-intrinsic-size: 0 800px;
}

.contact-container {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    max-width: 1200px;
    margin: 0 auto;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.info-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s;
}

body:not(.dark-mode) .info-card {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.info-card:hover {
    border-color: var(--green);
    transform: translateX(8px);
}

.info-icon {
    font-size: 28px;
    margin-bottom: 12px;
    color: var(--green);
}

body:not(.dark-mode) .info-icon {
    color: var(--green);
}

.info-card h3 {
    font-size: 14px;
    color: var(--green-light);
    margin-bottom: 6px;
    font-weight: 600;
}

.info-card p {
    color: var(--text-muted);
    font-size: 15px;
}

.social-links {
    display: flex;
    gap: 12px;
    margin-top: 16px;
}

.social-link {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: var(--surface);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    transition: all 0.3s;
}

body:not(.dark-mode) .social-link {
    background: rgba(0, 0, 0, 0.04);
}

.social-link:hover {
    background: var(--green-dim);
    border-color: var(--green);
    color: var(--green-light);
    transform: translateY(-3px);
}

.contact-form {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 40px;
}

body:not(.dark-mode) .contact-form {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 32px rgba(0,0,0,0.08);
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
    margin-bottom: 8px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 18px;
    color: var(--text);
    font-size: 15px;
    font-family: var(--font-body);
    transition: all 0.3s;
    resize: vertical;
}

body:not(.dark-mode) .form-group input,
body:not(.dark-mode) .form-group textarea {
    background: rgba(255, 255, 255, 0.8);
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--green);
    box-shadow: 0 0 0 3px var(--green-dim);
}

.form-group input:disabled,
.form-group textarea:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.form-group.has-error input,
.form-group.has-error textarea {
    border-color: #ef4444;
}

.error-msg {
    display: block;
    color: #ef4444;
    font-size: 12px;
    margin-top: 6px;
}

.btn-submit {
    width: 100%;
    padding: 16px 32px;
    font-family: var(--font-display);
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.5px;
    border-radius: 30px;
    background: linear-gradient(135deg, var(--green), var(--green));
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

body:not(.dark-mode) .btn-submit {
    background: linear-gradient(135deg, var(--green), #be185d);
}

.btn-submit:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 0 40px var(--green-glow);
}

.btn-submit:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-submit svg {
    transition: transform 0.3s;
}

.btn-submit:hover:not(:disabled) svg {
    transform: translateX(4px);
}

.loading-spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.success-msg {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #4ade80;
}

@media (max-width: 1024px) {
    .contact-section { padding: 60px 40px; }
    .contact-container { grid-template-columns: 1fr; gap: 40px; }
}

@media (max-width: 768px) {
    .contact-section { padding: 40px 16px; }
    .contact-form { padding: 24px; }
}
</style>

@endsection
