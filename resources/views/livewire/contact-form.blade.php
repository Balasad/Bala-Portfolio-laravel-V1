<form wire:submit="submit" class="space-y-6">
    @if ($successMessage)
        <div class="p-4 rounded-lg bg-green-500/20 border border-green-500 text-green-400">
            {{ $successMessage }}
        </div>
    @endif

    <div>
        <label for="name" class="block text-sm font-medium mb-2" style="color: var(--text-muted)">Name</label>
        <input 
            wire:model="name" 
            type="text" 
            id="name" 
            placeholder="Your name"
            class="w-full px-4 py-2 rounded-lg border transition-colors"
            style="background: var(--surface); border-color: var(--border); color: var(--text)"
        />
        @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium mb-2" style="color: var(--text-muted)">Email</label>
        <input 
            wire:model="email" 
            type="email" 
            id="email" 
            placeholder="your@email.com"
            class="w-full px-4 py-2 rounded-lg border transition-colors"
            style="background: var(--surface); border-color: var(--border); color: var(--text)"
        />
        @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="message" class="block text-sm font-medium mb-2" style="color: var(--text-muted)">Message</label>
        <textarea 
            wire:model="message" 
            id="message" 
            rows="5" 
            placeholder="Your message..."
            class="w-full px-4 py-2 rounded-lg border transition-colors resize-none"
            style="background: var(--surface); border-color: var(--border); color: var(--text)"
        ></textarea>
        @error('message') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>

    <button 
        type="submit" 
        :disabled="$isSubmitting"
        wire:loading.attr="disabled"
        class="px-6 py-2 rounded-lg font-medium transition-all disabled:opacity-50"
        style="background: var(--green); color: white"
    >
        <span wire:loading.remove wire:target="submit">Send Message</span>
        <span wire:loading wire:target="submit">Sending...</span>
    </button>
</form>
