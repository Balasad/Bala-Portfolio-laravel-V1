<div
    x-data="{
        type: @entangle('enquiryType').live,
        types: [
            { value: 'job',       label: 'Job Opportunity', sub: 'Full-time / Part-time',
              icon: '<svg width=&quot;22&quot; height=&quot;22&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;1.8&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><rect x=&quot;2&quot; y=&quot;7&quot; width=&quot;20&quot; height=&quot;14&quot; rx=&quot;2&quot;/><path d=&quot;M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16&quot;/></svg>' },
            { value: 'project',   label: 'Project',         sub: 'Collaboration',
              icon: '<svg width=&quot;22&quot; height=&quot;22&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;1.8&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><polygon points=&quot;12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2&quot;/></svg>' },
            { value: 'freelance', label: 'Freelance',       sub: 'Contract work',
              icon: '<svg width=&quot;22&quot; height=&quot;22&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;1.8&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;10&quot;/><path d=&quot;M12 8v4l3 3&quot;/></svg>' },
            { value: 'other',     label: 'Other',           sub: 'Say hello!',
              icon: '<svg width=&quot;22&quot; height=&quot;22&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;1.8&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><path d=&quot;M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z&quot;/></svg>' },
        ]
    }"
>

{{-- Honeypot --}}
<div aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;">
    <label for="cf-hp">Leave this empty</label>
    <input type="text" id="cf-hp" wire:model="honeypot" tabindex="-1" autocomplete="off">
</div>

{{-- Alerts --}}
<div aria-live="polite" aria-atomic="true">
    @if ($successMessage)
        <div role="status" class="cf-alert cf-alert--success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><polyline points="20 6 9 17 4 12"/></svg>
            <span>{{ $successMessage }}</span>
        </div>
    @endif
    @if ($errorMessage)
        <div role="alert" class="cf-alert cf-alert--error">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span>{{ $errorMessage }}</span>
        </div>
    @endif
</div>

<form wire:submit="submit" novalidate class="cf-form">

    {{-- ── Enquiry Type — Alpine handles instant visual, entangle syncs to Livewire ── --}}
    <div class="cf-enquiry-types">
        <p class="cf-section-label">I'm reaching out about…</p>
        <div class="cf-type-grid">
            <template x-for="t in types" :key="t.value">
                <button
                    type="button"
                    @click="type = t.value"
                    :class="type === t.value ? 'cf-type-card cf-type-card--active' : 'cf-type-card'"
                    :aria-pressed="type === t.value ? 'true' : 'false'"
                >
                    <span class="cf-type-icon" x-html="t.icon"></span>
                    <span class="cf-type-label" x-text="t.label"></span>
                    <span class="cf-type-sub" x-text="t.sub"></span>
                </button>
            </template>
        </div>
    </div>

    {{-- ── Name + Email ── --}}
    <div class="cf-row">
        <div class="cf-group">
            <label for="cf-name" class="cf-label">Full Name <span class="cf-req">*</span></label>
            <input wire:model="name" type="text" id="cf-name" placeholder="John Doe"
                   autocomplete="name" aria-required="true"
                   class="cf-input @error('name') cf-input--err @enderror">
            @error('name')<span role="alert" class="cf-errmsg">{{ $message }}</span>@enderror
        </div>
        <div class="cf-group">
            <label for="cf-email" class="cf-label">Email <span class="cf-req">*</span></label>
            <input wire:model="email" type="email" id="cf-email" placeholder="john@company.com"
                   autocomplete="email" aria-required="true"
                   class="cf-input @error('email') cf-input--err @enderror">
            @error('email')<span role="alert" class="cf-errmsg">{{ $message }}</span>@enderror
        </div>
    </div>

    {{-- ── Phone + Company ── --}}
    <div class="cf-row">
        <div class="cf-group">
            <label for="cf-phone" class="cf-label">Phone <span class="cf-optional">(optional)</span></label>
            <input wire:model="phone" type="tel" id="cf-phone" placeholder="+91 98765 43210"
                   autocomplete="tel" class="cf-input">
        </div>
        <div class="cf-group">
            <label for="cf-company" class="cf-label">Company <span class="cf-optional">(optional)</span></label>
            <input wire:model="company" type="text" id="cf-company" placeholder="Acme Inc." class="cf-input">
        </div>
    </div>

    {{-- ── Role + Budget — labels update instantly via Alpine ── --}}
    <div class="cf-row">
        <div class="cf-group">
            <label for="cf-jobtitle" class="cf-label">
                <span x-text="type === 'job' ? 'Role / Position' : type === 'freelance' ? 'Project Type' : 'Job Title'"></span>
                <span class="cf-optional">(optional)</span>
            </label>
            <input wire:model="jobTitle" type="text" id="cf-jobtitle"
                   :placeholder="type === 'job' ? 'UI/UX Designer, Laravel Dev…' : 'e.g. Web App, Mobile App…'"
                   class="cf-input">
        </div>
        <div class="cf-group">
            <label for="cf-budget" class="cf-label">
                <span x-text="type === 'job' ? 'Expected Salary' : 'Project Budget'"></span>
                <span class="cf-optional">(optional)</span>
            </label>
            <input wire:model="budget" type="text" id="cf-budget"
                   :placeholder="type === 'job' ? 'e.g. ₹8–12 LPA' : 'e.g. ₹50,000+'"
                   class="cf-input">
        </div>
    </div>

    {{-- ── Message — placeholder updates via Alpine ── --}}
    <div class="cf-group">
        <label for="cf-message" class="cf-label">
            <span x-text="type === 'job' ? 'Tell me about the role & company' : type === 'project' ? 'Describe your project' : type === 'freelance' ? 'What do you need help with?' : 'Your message'"></span>
            <span class="cf-req">*</span>
        </label>
        <textarea wire:model="message" id="cf-message" rows="5" aria-required="true"
                  :placeholder="type === 'job'
                      ? 'Share the role, tech stack, team size, work mode (remote/hybrid/on-site)…'
                      : 'Describe your project, timeline, and goals…'"
                  class="cf-input cf-input--textarea @error('message') cf-input--err @enderror"></textarea>
        @error('message')<span role="alert" class="cf-errmsg">{{ $message }}</span>@enderror
    </div>

    {{-- ── Submit — label updates via Alpine ── --}}
    <button type="submit" wire:loading.attr="disabled" class="cf-submit">
        <span wire:loading.remove wire:target="submit" class="cf-submit-inner">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            <span x-text="type === 'job' ? 'Send Job Enquiry' : type === 'freelance' ? 'Discuss Freelance Work' : 'Send Message'"></span>
        </span>
        <span wire:loading wire:target="submit" class="cf-submit-inner" aria-label="Sending…">
            <span class="cf-spinner"></span> Sending…
        </span>
    </button>

</form>
</div>

<style>
.cf-alert {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 16px 20px; border-radius: 14px;
    font-size: 14px; font-weight: 500; margin-bottom: 20px; line-height: 1.5;
}
.cf-alert--success { background: rgba(34,197,94,0.12); border: 1px solid rgba(34,197,94,0.4); color: #4ade80; }
.cf-alert--error   { background: rgba(239,68,68,0.10); border: 1px solid rgba(239,68,68,0.4); color: #f87171; }

.cf-enquiry-types { margin-bottom: 20px; }
.cf-section-label {
    font-size: 11px; font-weight: 700; color: var(--text-muted);
    text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px;
}
.cf-type-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 10px; }

.cf-type-card {
    display: flex; flex-direction: column; align-items: center; gap: 5px;
    padding: 14px 8px; border-radius: 14px;
    border: 1.5px solid var(--border); background: var(--surface);
    cursor: pointer; transition: all 0.18s ease; text-align: center;
    /* override any global button styles */
    font-family: var(--font-body); color: var(--text);
}
.cf-type-card:hover {
    border-color: var(--green);
    background: var(--green-dim);
    transform: translateY(-2px);
}
.cf-type-card--active {
    border-color: var(--green) !important;
    background: var(--green-dim) !important;
    box-shadow: 0 0 0 3px var(--green-dim);
    transform: translateY(-2px);
}
.cf-type-icon { color: var(--text-muted); transition: color 0.18s; line-height: 1; }
.cf-type-card:hover .cf-type-icon,
.cf-type-card--active .cf-type-icon { color: var(--green); }
.cf-type-label { font-size: 12px; font-weight: 700; color: var(--text); line-height: 1.2; }
.cf-type-sub   { font-size: 10px; color: var(--text-muted); }

.cf-form   { display: flex; flex-direction: column; gap: 16px; }
.cf-row    { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.cf-group  { display: flex; flex-direction: column; gap: 6px; }
.cf-label  { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
.cf-req      { color: var(--green); }
.cf-optional { font-weight: 400; text-transform: none; letter-spacing: 0; opacity: 0.7; }

.cf-input {
    width: 100%; background: var(--surface);
    border: 1.5px solid var(--border); border-radius: 12px;
    padding: 12px 16px; color: var(--text); font-size: 14px;
    font-family: var(--font-body); transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
}
.cf-input::placeholder { color: var(--text-muted); opacity: 0.55; }
.cf-input:focus { outline: none; border-color: var(--green); box-shadow: 0 0 0 3px var(--green-dim); }
.cf-input--textarea { resize: vertical; min-height: 120px; line-height: 1.6; }
.cf-input--err { border-color: #ef4444 !important; }
.cf-input--err:focus { box-shadow: 0 0 0 3px rgba(239,68,68,0.15); }
.cf-errmsg { font-size: 11px; color: #f87171; }

.cf-submit {
    width: 100%; padding: 15px 32px; font-family: var(--font-display);
    font-size: 15px; font-weight: 700; letter-spacing: 0.5px;
    border-radius: 30px; background: linear-gradient(135deg, var(--green), var(--green-light));
    color: #fff; border: none; cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s, opacity 0.2s;
    display: flex; align-items: center; justify-content: center; margin-top: 4px;
}
body:not(.dark-mode) .cf-submit { background: linear-gradient(135deg, var(--green), #be185d); }
.cf-submit:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 8px 40px var(--green-glow); }
.cf-submit:disabled { opacity: 0.6; cursor: not-allowed; }
.cf-submit-inner { display: flex; align-items: center; gap: 10px; }
.cf-spinner {
    width: 17px; height: 17px; flex-shrink: 0;
    border: 2px solid rgba(255,255,255,0.3); border-top-color: #fff;
    border-radius: 50%; animation: cf-spin 0.7s linear infinite;
}
@keyframes cf-spin { to { transform: rotate(360deg); } }

@media (max-width: 600px) {
    .cf-type-grid { grid-template-columns: repeat(2,1fr); }
    .cf-row { grid-template-columns: 1fr; }
}
</style>