#!/bin/bash

echo "🚀 Installing Livewire, Blade UI Kit, and configuring Alpine.js..."

echo "📦 Installing Composer dependencies..."
composer require livewire/livewire blade-ui-kit/blade-ui-kit

echo "🔧 Publishing Livewire config..."
php artisan livewire:publish --config

echo "🔧 Publishing Blade UI Kit assets..."
php artisan vendor:publish --tag=blade-ui-kit-assets --force

echo "✅ Setup complete!"
echo ""
echo "Next steps:"
echo "1. Add @livewireStyles to your layout (before </head>)"
echo "2. Add @livewireScripts before </body>"
echo "3. Use <x-buk-*> components in your views"
echo "4. Use @livewire('component-name') to include components"
