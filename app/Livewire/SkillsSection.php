<?php

namespace App\Livewire;

use Livewire\Component;

class SkillsSection extends Component
{
    public array $skillCategories = [];

    public function mount(): void
    {
        $this->skillCategories = [
            [
                'title' => 'Frontend',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>',
                'skills' => [
                    ['name' => 'HTML5', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 .621.504 1.125 1.125 1.125H4.5a3.75 3.75 0 0 1-3.75-3.75V5.25A2.625 2.625 0 0 1 3 2.625H5.625Zm0 9.75h3.75a2.625 2.625 0 0 1 2.625 2.625v1.875a2.625 2.625 0 0 1-2.625 2.625H5.625a2.625 2.625 0 0 1-2.625-2.625V11.25Zm9-3.75h2.625a2.625 2.625 0 0 1 2.625 2.625v1.875a2.625 2.625 0 0 1-2.625 2.625H9.75a2.625 2.625 0 0 1-2.625-2.625V8.625Z" clip-rule="evenodd" /></svg>'],
                    ['name' => 'CSS3', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 0 1 1.125-1.125h17.625c.621 0 1.125.504 1.125 1.125v1.875a2.625 2.625 0 0 1-2.625 2.625H9.75a2.625 2.625 0 0 1-2.625-2.625V6.75Zm4.875 9.75a.75.75 0 0 0 0 1.5h9a.75.75 0 0 0 0-1.5h-9Z" clip-rule="evenodd" /></svg>'],
                    ['name' => 'JavaScript', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M3 5.25a.75.75 0 0 0-.75.75v15a5.25 5.25 0 0 0 5.25 15h9a5.25 5.25 0 0 0 5.25-5.25V6.5a.75.75 0 0 0-.75-.75h-2.25a.75.75 0 0 1 0-1.5H17.5A2.25 2.25 0 0 1 15 2.25H3.75A2.25 2.25 0 0 1 1.5 4.5v.75H3Zm4.125 1.5a.75.75 0 0 1 .75-.75h.75v.75h-.75a.75.75 0 0 1 0-1.5H8.25a.75.75 0 0 1 0 1.5H8.25Zm.75 3h.75v.75H13.5v-.75Zm0 3h.75v.75H13.5v-.75Zm-1.5-3a.75.75 0 0 1 .75-.75h.75v.75h-.75a.75.75 0 0 1 0-1.5H12a.75.75 0 0 1 0 1.5H12Zm1.5 0h.75v.75H13.5v-.75Zm2.25-1.5h-2.25a.75.75 0 0 0 0 1.5h2.25a.75.75 0 0 0 0-1.5H14.25Zm1.5 0v.75h-.75a.75.75 0 0 1 0-1.5h2.25a.75.75 0 0 1 .75.75v.75Zm-.75 3h.75v.75H15v-.75Zm-1.5 0h.75v.75H13.5v-.75Zm3-1.5h.75v.75H16.5v-.75Zm0 3h.75v.75H16.5v-.75Zm0 3h.75v.75H16.5v-.75Zm1.5-9h.75v.75H18v-.75Zm-3 6h.75v.75H15v-.75Z" clip-rule="evenodd" /></svg>'],
                    ['name' => 'Alpine.js', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" /></svg>'],
                    ['name' => 'Livewire', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>'],
                    ['name' => 'Tailwind', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" /></svg>'],
                ],
            ],
            [
                'title' => 'Backend',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1-.9-8.95 4.5 4.5 0 0 1 7.35-5.65L12.75 6a4.5 4.5 0 0 1 9 0v.75" /></svg>',
                'skills' => [
                    ['name' => 'Laravel', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1-.9-8.95 4.5 4.5 0 0 1 7.35-5.65L12.75 6a4.5 4.5 0 0 1 9 0v.75" /></svg>'],
                    ['name' => 'PHP', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.44 8.44 0 0 1 0-1.5l.58-1.58a6.57 6.57 0 0 0-1.77-2.64L1.47 6.15A8.44 8.44 0 0 0 0 10.5c0 4.68 3.82 8.5 8.5 8.5h.5a5.9 5.9 0 0 0 3.07-1.07l2.26 2.26a8.44 8.44 0 0 0 5.56-5.56l-2.43-2.43a6.57 6.57 0 0 0-2.64-1.77L18.03 7.42c-1.37.78-3.13.78-4.5 0L12.15 6.03a4.84 4.84 0 0 0-1.29-.87l-1.66-1.66a4.84 4.84 0 0 0-1.62.58ZM8 11a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm10.06.42a1.5 1.5 0 0 0-2.12 0l-1.5 1.5a1.5 1.5 0 0 0 .35 2.3l.88.29a1.5 1.5 0 0 0 1.79-.96l.29-.88a1.5 1.5 0 0 0-.71-2.15Z" /></svg>'],
                    ['name' => 'MySQL', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" /></svg>'],
                    ['name' => 'REST API', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" /></svg>'],
                    ['name' => 'GraphQL', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" /></svg>'],
                    ['name' => 'Docker', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25 1.313c-1.125.876-2.5.876-3.625 0L12.5 8.813c-1.125.876-2.5.876-3.625 0L6.5 7.5M6 21v-1.5c0-1.125.438-2.25 1.25-3.125L12 12m6 9c0 1.125-.438 2.25-1.25 3.125L12 18m0 0-4.75 3.75c-1.125.876-2.5.876-3.625 0L.5 21m17-6.75h.375c.621 0 1.125.504 1.125 1.125v2.625c0 .621-.504 1.125-1.125 1.125H17.5m1.5-10.5h.375c.621 0 1.125.504 1.125 1.125v2.625c0 .621-.504 1.125-1.125 1.125H17.5" /></svg>'],
                ],
            ],
            [
                'title' => 'Design',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>',
                'skills' => [
                    ['name' => 'Figma', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>'],
                    ['name' => 'Illustrator', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>'],
                    ['name' => 'Photoshop', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>'],
                    ['name' => 'Blender', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" /></svg>'],
                    ['name' => 'After Effects', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m7.5 8.25 3 3m-3-3 3 3m-6-3a9 9 0 1 1 18 0 9 9 0 0 1-18 0Z" /></svg>'],
                    ['name' => 'Premiere Pro', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>'],
                ],
            ],
            [
                'title' => 'Tools',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>',
                'skills' => [
                    ['name' => 'Git', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>'],
                    ['name' => 'VS Code', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>'],
                    ['name' => 'Vite', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>'],
                    ['name' => 'npm', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l-3 3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /></svg>'],
                    ['name' => 'Postman', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" /></svg>'],
                    ['name' => 'Linux', 'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>'],
                ],
            ],
        ];
    }

    public array $techBadges = [
        'Laravel', 'PHP', 'MySQL', 'JavaScript', 'Alpine.js', 
        'Livewire', 'Tailwind', 'Figma', 'Git', 'Docker', 
        'REST API', 'Blender'
    ];

    public function render(): \Illuminate\View\View
    {
        return view('livewire.skills-section');
    }
}
