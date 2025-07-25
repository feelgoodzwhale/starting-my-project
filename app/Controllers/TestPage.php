<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TestPage extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Test Page - Dependencies & Database Check'
        ];

        // Test database connection
        try {
            $db = \Config\Database::connect();
            $data['db_connected'] = true;
            $data['db_message'] = 'Database connection successful';

            // Get database info
            $data['db_version'] = $db->getVersion();
            $data['db_platform'] = $db->getPlatform();
        } catch (\Exception $e) {
            $data['db_connected'] = false;
            $data['db_message'] = 'Database connection failed: ' . $e->getMessage();
            $data['db_version'] = 'N/A';
            $data['db_platform'] = 'N/A';
        }

        // Project information
        $data['project_info'] = [
            'name' => 'Demo Project',
            'type' => 'Full-Stack Web Application',
            'version' => '1.0.0',
            'description' => 'CodeIgniter 4 backend with modern frontend stack',
            'license' => 'ISC',
            'author' => 'Developer',
            'created' => '2025',
            'repository' => 'starting-my-project'
        ];

        // Frontend dependencies
        $data['frontend_dependencies'] = [
            'tailwindcss' => '^3.4.0',
            'daisyui' => '^4.0.0',
            'alpinejs' => '^3.14.9'
        ];

        // Backend dependencies
        $data['backend_dependencies'] = [
            'php' => '^8.1',
            'codeigniter4/framework' => '^4.6.1'
        ];

        // Development dependencies
        $data['dev_dependencies'] = [
            'fakerphp/faker' => '^1.9',
            'mikey179/vfsstream' => '^1.6',
            'phpunit/phpunit' => '^10.5.16'
        ];

        // NPM Scripts
        $data['npm_scripts'] = [
            'build' => 'tailwindcss -i ./src/input.css -o ./dist/output.css',
            'watch' => 'tailwindcss -i ./src/input.css -o ./dist/output.css --watch',
            'test' => 'echo "Error: no test specified" && exit 1'
        ];

        // Project structure
        $data['project_structure'] = '
demo/
├── app/                          # CodeIgniter 4 Application
│   ├── Config/                   # Configuration files
│   ├── Controllers/              # MVC Controllers
│   │   ├── Home.php
│   │   └── TestPage.php
│   ├── Database/                 # Database migrations & seeds
│   ├── Models/                   # MVC Models
│   ├── Views/                    # MVC Views
│   │   └── test_page.php
│   └── ...
├── public/                       # Web accessible directory
│   ├── dist/                     # Compiled CSS
│   ├── src/                      # Frontend assets
│   └── index.php                 # Entry point
├── src/                          # Source files
│   ├── index.html               # Original frontend demo
│   └── input.css                # Tailwind source
├── dist/                         # Build output
│   └── output.css               # Compiled Tailwind CSS
├── tests/                        # PHPUnit tests
├── writable/                     # Writable directories
│   ├── cache/
│   ├── logs/
│   └── session/
├── vendor/                       # Composer dependencies
├── node_modules/                 # NPM dependencies
├── composer.json                 # PHP dependencies
├── package.json                  # Node.js dependencies
├── tailwind.config.js           # Tailwind configuration
└── spark                        # CodeIgniter CLI tool';

        // Features list
        $data['features'] = [
            'backend' => [
                'CodeIgniter 4 Framework',
                'MVC Architecture',
                'Database Integration',
                'RESTful Routing',
                'CLI Tools (Spark)',
                'Unit Testing with PHPUnit',
                'Error Handling & Logging',
                'Security Features'
            ],
            'frontend' => [
                'Tailwind CSS Framework',
                'DaisyUI Component Library',
                'Alpine.js for Interactivity',
                'Responsive Design',
                'Multiple Theme Support',
                'Font Family Switching',
                'Dark/Light Mode Toggle',
                'Thai Language Support',
                'Custom OKLCH Colors',
                'Smooth Transitions',
                'LocalStorage Persistence'
            ],
            'development' => [
                'Hot Reloading (Tailwind Watch)',
                'Component-based Architecture',
                'Modern Build Tools',
                'Version Control Ready',
                'Development Server',
                'Asset Compilation',
                'Debugging Tools',
                'Code Organization'
            ]
        ];

        // System information
        $data['system_info'] = [
            'php_version' => PHP_VERSION,
            'ci_version' => \CodeIgniter\CodeIgniter::CI_VERSION,
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown',
            'current_url' => current_url(),
            'base_url' => base_url(),
            'environment' => ENVIRONMENT
        ];

        return view('test_page', $data);
    }
}
