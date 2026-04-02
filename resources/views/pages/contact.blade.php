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
                <div class="info-icon">✉</div>
                <h3>Email</h3>
                <p>balasaravanan062@gmail.com</p>
            </div>
            <div class="info-card">
                <div class="info-icon">📍</div>
                <h3>Location</h3>
                <p>Chennai, India</p>
            </div>
            <div class="info-card">
                <div class="info-icon">💼</div>
                <h3>Status</h3>
                <p>Available for Projects</p>
            </div>
            
            <div class="social-links">
                <a href="https://linkedin.com/in/balasaravanan-s-366365235" class="social-link" aria-label="LinkedIn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <a href="https://github.com/Balasad" class="social-link" aria-label="GitHub">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="Twitter">
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
                    Send Message
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </span>
                <span x-show="isSubmitting && !isSuccess" class="loading-spinner"></span>
                <span x-show="isSuccess" class="success-msg">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
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
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s;
}

.info-card:hover {
    border-color: var(--green);
    transform: translateX(8px);
}

.info-icon {
    font-size: 28px;
    margin-bottom: 12px;
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
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    transition: all 0.3s;
}

.social-link:hover {
    background: var(--green-dim);
    border-color: var(--green);
    color: var(--green-light);
    transform: translateY(-3px);
}

.contact-form {
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 40px;
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
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 18px;
    color: var(--text);
    font-size: 15px;
    font-family: var(--font-body);
    transition: all 0.3s;
    resize: vertical;
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
    background: linear-gradient(135deg, var(--green), #064e3b);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
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
