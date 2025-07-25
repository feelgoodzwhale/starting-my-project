<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- Tailwind CSS -->
    <link href="<?= base_url('dist/output.css') ?>" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="<?= base_url('node_modules/alpinejs/dist/cdn.min.js') ?>"></script>

    <style>
        body {
            font-family: "Sarabun", sans-serif;
        }

        .font-transition {
            transition: font-family 0.3s ease;
        }
    </style>
</head>

<body class="min-h-screen bg-base-100 font-transition">
    <!-- Navbar -->
    <div class="navbar bg-base-200 shadow-lg">
        <div class="flex-1">
            <h1 class="text-2xl font-bold px-4">CodeIgniter 4 + Frontend Stack Test</h1>
        </div>
        <div class="flex-none gap-4">
            <!-- Theme Switcher -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Theme</span>
                </label>
                <select class="select select-bordered theme-controller w-full">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                    <option value="cupcake">Cupcake</option>
                    <option value="corporate">Corporate</option>
                    <option value="synthwave">Synthwave</option>
                    <option value="cyberpunk">Cyberpunk</option>
                </select>
            </div>

            <!-- Font Switcher -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Font</span>
                </label>
                <select class="select select-bordered font-controller w-full">
                    <option value="sarabun" class="font-sarabun">Sarabun</option>
                    <option value="prompt" class="font-prompt">Prompt</option>
                </select>
            </div>

            <!-- Light/Dark Mode Toggle -->
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text mr-2">Mode</span>
                    <input type="checkbox" class="toggle mode-toggle" />
                </label>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <!-- Database Connection Status -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 1.79 4 4 4h8c0 2.21 1.79 4 4 4V7c0-2.21-1.79-4-4-4H8c-2.21 0-4 1.79-4 4z" />
                    </svg>
                    Database Connection
                </h2>

                <div class="alert <?= $db_connected ? 'alert-success' : 'alert-error' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $db_connected ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z' ?>" />
                    </svg>
                    <span><?= $db_message ?></span>
                </div>

                <?php if ($db_connected): ?>
                    <div class="stats shadow mt-4">
                        <div class="stat">
                            <div class="stat-title">Database Platform</div>
                            <div class="stat-value text-primary"><?= $db_platform ?></div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Version</div>
                            <div class="stat-value text-secondary"><?= $db_version ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Dependencies -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Project Dependencies
                </h2>

                <div class="grid md:grid-cols-3 gap-4">
                    <!-- Frontend Dependencies -->
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-primary">Frontend</h3>
                        <div class="overflow-x-auto">
                            <table class="table table-zebra table-compact">
                                <thead>
                                    <tr>
                                        <th>Package</th>
                                        <th>Version</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($frontend_dependencies as $package => $version): ?>
                                        <tr>
                                            <td class="font-semibold"><?= $package ?></td>
                                            <td><span class="badge badge-primary badge-sm"><?= $version ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Backend Dependencies -->
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-secondary">Backend</h3>
                        <div class="overflow-x-auto">
                            <table class="table table-zebra table-compact">
                                <thead>
                                    <tr>
                                        <th>Package</th>
                                        <th>Version</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($backend_dependencies as $package => $version): ?>
                                        <tr>
                                            <td class="font-semibold"><?= $package ?></td>
                                            <td><span class="badge badge-secondary badge-sm"><?= $version ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Development Dependencies -->
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-accent">Development</h3>
                        <div class="overflow-x-auto">
                            <table class="table table-zebra table-compact">
                                <thead>
                                    <tr>
                                        <th>Package</th>
                                        <th>Version</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dev_dependencies as $package => $version): ?>
                                        <tr>
                                            <td class="font-semibold"><?= $package ?></td>
                                            <td><span class="badge badge-accent badge-sm"><?= $version ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Information -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Project Information
                </h2>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Project Details -->
                    <div>
                        <h3 class="font-bold text-lg mb-3">Project Details</h3>
                        <div class="space-y-2">
                            <?php foreach ($project_info as $key => $value): ?>
                                <div class="flex justify-between">
                                    <span class="font-semibold capitalize"><?= str_replace('_', ' ', $key) ?>:</span>
                                    <span><?= $value ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- System Information -->
                    <div>
                        <h3 class="font-bold text-lg mb-3">System Information</h3>
                        <div class="space-y-2">
                            <?php foreach ($system_info as $key => $value): ?>
                                <div class="flex justify-between">
                                    <span class="font-semibold capitalize"><?= str_replace('_', ' ', $key) ?>:</span>
                                    <span class="text-sm"><?= $value ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Structure -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Project Structure
                </h2>

                <div class="mockup-code">
                    <pre><code><?= htmlspecialchars($project_structure) ?></code></pre>
                </div>
            </div>
        </div>

        <!-- NPM Scripts -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Available Scripts
                </h2>

                <div class="grid gap-3">
                    <?php foreach ($npm_scripts as $script => $command): ?>
                        <div class="bg-base-200 p-4 rounded-lg">
                            <div class="flex justify-between items-start">
                                <div>
                                    <code class="text-primary font-bold">npm run <?= $script ?></code>
                                    <p class="text-sm mt-1 text-base-content/70"><?= $command ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                    Project Features
                </h2>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Backend Features -->
                    <div>
                        <h3 class="font-bold text-lg mb-3 text-primary">Backend Features</h3>
                        <ul class="space-y-2">
                            <?php foreach ($features['backend'] as $feature): ?>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-success mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <?= $feature ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Frontend Features -->
                    <div>
                        <h3 class="font-bold text-lg mb-3 text-secondary">Frontend Features</h3>
                        <ul class="space-y-2">
                            <?php foreach ($features['frontend'] as $feature): ?>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-success mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <?= $feature ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Development Features -->
                    <div>
                        <h3 class="font-bold text-lg mb-3 text-accent">Development Features</h3>
                        <ul class="space-y-2">
                            <?php foreach ($features['development'] as $feature): ?>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-success mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <?= $feature ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Theme & Font Testing -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Theme Colors -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Theme Colors</h2>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-primary p-4 text-primary-content rounded">Primary</div>
                        <div class="bg-secondary p-4 text-secondary-content rounded">Secondary</div>
                        <div class="bg-accent p-4 text-accent-content rounded">Accent</div>
                        <div class="bg-neutral p-4 text-neutral-content rounded">Neutral</div>
                        <div class="bg-info p-4 text-info-content rounded">Info</div>
                        <div class="bg-success p-4 text-success-content rounded">Success</div>
                        <div class="bg-warning p-4 text-warning-content rounded">Warning</div>
                        <div class="bg-error p-4 text-error-content rounded">Error</div>
                    </div>
                </div>
            </div>

            <!-- DaisyUI Components -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">DaisyUI Components</h2>
                    <div class="space-y-3">
                        <button class="btn btn-primary">Primary Button</button>
                        <input type="text" placeholder="Input field" class="input input-bordered w-full" />
                        <div class="flex gap-2">
                            <div class="badge badge-primary">Primary</div>
                            <div class="badge badge-secondary">Secondary</div>
                            <div class="badge badge-accent">Accent</div>
                        </div>
                        <progress class="progress progress-primary w-full" value="70" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alpine.js Testing -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Alpine.js Interactive Components
                </h2>

                <!-- Counter -->
                <div x-data="{ count: 0 }" class="mb-6">
                    <h3 class="text-lg font-bold mb-2">Counter Test</h3>
                    <div class="text-center mb-4">
                        <span class="text-4xl font-bold text-primary" x-text="count">0</span>
                    </div>
                    <div class="flex justify-center gap-2">
                        <button class="btn btn-primary" x-on:click="count++">+</button>
                        <button class="btn btn-secondary" x-on:click="count--">-</button>
                        <button class="btn btn-accent" x-on:click="count = 0">Reset</button>
                    </div>
                </div>

                <!-- Toggle Content -->
                <div x-data="{ show: false }" class="mb-6">
                    <h3 class="text-lg font-bold mb-2">Toggle Test</h3>
                    <button class="btn btn-outline" x-on:click="show = !show">
                        <span x-text="show ? 'Hide' : 'Show'">Show</span> Content
                    </button>
                    <div x-show="show" x-transition class="mt-4 p-4 bg-base-200 rounded-lg">
                        <p>✅ This content is controlled by Alpine.js!</p>
                        <p>The toggle functionality demonstrates Alpine.js reactivity.</p>
                    </div>
                </div>

                <!-- Form Handling -->
                <div x-data="{ name: '', email: '', message: '' }">
                    <h3 class="text-lg font-bold mb-2">Form Test</h3>
                    <div class="grid gap-4">
                        <input x-model="name" type="text" placeholder="Name" class="input input-bordered" />
                        <input x-model="email" type="email" placeholder="Email" class="input input-bordered" />
                        <div class="bg-base-200 p-4 rounded">
                            <strong>Live Preview:</strong><br>
                            Name: <span x-text="name || 'Not entered'"></span><br>
                            Email: <span x-text="email || 'Not entered'"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Font & Settings Display -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title">Current Settings</h2>
                <div class="stats stats-vertical lg:stats-horizontal shadow">
                    <div class="stat">
                        <div class="stat-title">Theme</div>
                        <div class="stat-value text-primary current-theme">light</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Font Family</div>
                        <div class="stat-value text-secondary current-font">sarabun</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Mode</div>
                        <div class="stat-value text-accent current-mode">light</div>
                    </div>
                </div>

                <!-- Font Sample -->
                <div class="mt-6">
                    <h3 class="text-lg font-bold mb-2">Font Sample</h3>
                    <div class="space-y-2">
                        <p class="text-lg">ตัวอย่างภาษาไทย - Thai Language Sample</p>
                        <p>การเดินทางขากลับคงจะเหงาน่าดู ผมไม่รู้ทำไมผมถึงคิดถึงเธอ</p>
                        <p class="text-sm">The quick brown fox jumps over the lazy dog - 0123456789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Theme and font controller
        const themeController = document.querySelector('.theme-controller');
        const fontController = document.querySelector('.font-controller');
        const modeToggle = document.querySelector('.mode-toggle');
        const currentThemeDisplay = document.querySelector('.current-theme');
        const currentFontDisplay = document.querySelector('.current-font');
        const currentModeDisplay = document.querySelector('.current-mode');

        // Load saved preferences
        const savedTheme = localStorage.getItem('theme') || 'light';
        const savedFont = localStorage.getItem('font') || 'sarabun';
        const savedMode = localStorage.getItem('mode') || 'light';

        // Apply saved preferences
        document.documentElement.setAttribute('data-theme', savedTheme);
        document.body.classList.add(`font-${savedFont}`);
        themeController.value = savedTheme;
        fontController.value = savedFont;
        modeToggle.checked = savedMode === 'dark';

        // Update displays
        currentThemeDisplay.textContent = savedTheme;
        currentFontDisplay.textContent = savedFont;
        currentModeDisplay.textContent = savedMode;

        // Event listeners
        themeController.addEventListener('change', function() {
            const theme = this.value;
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            currentThemeDisplay.textContent = theme;
        });

        fontController.addEventListener('change', function() {
            const font = this.value;
            document.body.classList.remove('font-sarabun', 'font-prompt');
            document.body.classList.add(`font-${font}`);
            localStorage.setItem('font', font);
            currentFontDisplay.textContent = font;
        });

        modeToggle.addEventListener('change', function() {
            const mode = this.checked ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', mode);
            localStorage.setItem('mode', mode);
            currentModeDisplay.textContent = mode;
            themeController.value = mode;
            currentThemeDisplay.textContent = mode;
        });

        // Smooth transitions
        document.body.style.transition = 'background-color 0.3s ease, color 0.3s ease';
    </script>
</body>

</html>