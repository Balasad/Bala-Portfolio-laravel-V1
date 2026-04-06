<?php

// app/Data/projects.php
// Add this file at: app/Data/projects.php
// Then require/include it or turn into a Service/Config file.
// Easiest: put in config/projects.php and access via config('projects.list')

return [

    [
        'slug'     => 'erp-hris-module',
        'title'    => 'ERP — HRIS Module',
        'category' => 'Enterprise Web Application',
        'summary'  => 'A full-featured Human Resource Information System built inside TeraMed\'s ERP platform — covering employee records, attendance, payroll, and leave management for 200+ staff.',
        'cover'    => 'images/projects/erp-hris-cover.png',
        'year'     => '2024',
        'role'     => 'Full Stack Developer & UI Designer',
        'duration' => '4 months',
        'problem'  => 'TeraMed\'s HR team were managing employee data across three separate spreadsheets and a legacy system with no unified reporting. Leave approvals went through WhatsApp, and payroll calculations were error-prone and manual.',
        'solution' => 'Designed and built a Laravel + Livewire HRIS module integrated into the existing ERP system. Introduced a real-time dashboard for HR managers, automated leave approval workflows, and one-click payroll exports.',
        'approach' => [
            'Audited existing workflows with HR team to map pain points before writing any code',
            'Designed all screens in Figma first — iterated with stakeholders before development',
            'Built Livewire components for real-time search, dynamic filters, and inline editing',
            'Implemented role-based access control (RBAC) for HR, Manager, and Employee roles',
            'Added export to Excel/PDF for payroll and attendance reports',
        ],
        'outcomes' => [
            'Reduced HR admin time by ~60% for monthly payroll processing',
            'Leave approval cycle cut from 2 days to under 2 hours',
            'Zero data-entry errors reported in first 3 months post-launch',
            'Adopted by 200+ employees with no training sessions required',
        ],
        'stack'         => ['Laravel', 'Livewire', 'MySQL', 'Figma', 'Tailwind CSS', 'Alpine.js'],
        'contributions' => [
            'End-to-end UI/UX design in Figma',
            'Laravel backend & Eloquent data modelling',
            'Livewire real-time components',
            'Role-based access control system',
            'Excel/PDF report generation',
        ],
        'gallery' => [
            'images/projects/erp-hris-1.png',
            'images/projects/erp-hris-2.png',
            'images/projects/erp-hris-3.png',
        ],
        'live_url'   => '',
        'figma_url'  => '',
        'github_url' => '',
    ],

    [
        'slug'     => 'crm-system',
        'title'    => 'CRM — Sales Pipeline',
        'category' => 'Enterprise Web Application',
        'summary'  => 'A CRM module for tracking leads, managing client relationships, and visualising the sales pipeline — built as part of TeraMed\'s internal ERP platform.',
        'cover'    => 'images/projects/crm-cover.png',
        'year'     => '2024',
        'role'     => 'Full Stack Developer & UI Designer',
        'duration' => '3 months',
        'problem'  => 'The sales team had no centralised visibility into leads or deal stages. Opportunities were tracked in personal notebooks, causing follow-ups to be missed and revenue to slip through.',
        'solution' => 'Built a Kanban-style CRM pipeline with drag-and-drop deal management, automated follow-up reminders, and a real-time dashboard showing conversion rates and revenue forecasts.',
        'approach' => [
            'Mapped the existing sales process through stakeholder interviews',
            'Designed Kanban pipeline UI in Figma with drag-and-drop interaction prototypes',
            'Implemented Livewire drag-and-drop with persistent state',
            'Added email/SMS notification hooks for follow-up reminders',
            'Built analytics dashboard with Chart.js for deal velocity and win rates',
        ],
        'outcomes' => [
            'Sales follow-up rate improved by 40% in the first month',
            'Pipeline visibility gave management real-time revenue forecasting',
            'Reduced missed leads to near-zero from weekly average of 5–7',
        ],
        'stack'         => ['Laravel', 'Livewire', 'MySQL', 'Chart.js', 'Figma', 'Tailwind CSS'],
        'contributions' => [
            'Full UI/UX design in Figma',
            'Drag-and-drop Kanban implementation',
            'Analytics & reporting dashboard',
            'Email/SMS notification system',
        ],
        'gallery' => [
            'images/projects/crm-1.png',
            'images/projects/crm-2.png',
        ],
        'live_url'   => '',
        'figma_url'  => '',
        'github_url' => '',
    ],

    [
        'slug'     => 'luxury-watch-render',
        'title'    => 'Luxury Watch — 3D Render',
        'category' => 'Blender · 3D Visualisation',
        'summary'  => 'A photorealistic product visualisation of a luxury watch created entirely in Blender using Cycles rendering, procedural materials, and studio lighting.',
        'cover'    => 'images/blender/watch.png',
        'year'     => '2024',
        'role'     => 'Solo 3D Artist',
        'duration' => '2 weeks',
        'problem'  => 'Wanted to push Blender\'s Cycles renderer to its limits for a commercial-grade product shot — replicating the look of a professional studio photograph without any physical setup.',
        'solution' => 'Modelled the watch from reference images, built fully procedural metal and glass materials using the shader node editor, and lit the scene with an HDRI + custom area lights to achieve specular highlights that feel real.',
        'approach' => [
            'Reference gathering: studied luxury watch photography for lighting patterns',
            'Hard-surface modelling with subdivision surface + edge creases',
            'Procedural materials: brushed metal, sapphire crystal glass, leather strap',
            'Three-point lighting rig with HDRI background and fill cards',
            'Post-processing in Blender\'s compositor for colour grading',
        ],
        'outcomes' => [
            'Final render at 4K resolution, 2000 samples — no visible noise',
            'Received 200+ engagements on LinkedIn on first share',
            'Used as portfolio hero image',
        ],
        'stack'         => ['Blender', 'Cycles', 'Shader Nodes', 'HDRI Lighting'],
        'contributions' => [
            'Full 3D modelling from scratch',
            'Procedural material creation',
            'Lighting & rendering',
            'Post-production colour grading',
        ],
        'gallery' => [
            'images/blender/watch.png',
            'images/blender/space.png',
        ],
        'live_url'   => '',
        'figma_url'  => '',
        'github_url' => 'https://github.com/Balasad',
    ],

];