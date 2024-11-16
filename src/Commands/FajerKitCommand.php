<?php

namespace Iammarjamal\FajerKit\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FajerKitCommand extends Command
{
    public $signature = 'fajerkit:install';

    public function handle(): int
    {
        /* Laravel Composer Install */
        /*
        ** You can use the following function like this:
        ** composerInstall('package_name_in_lower_case', 'composer_package', 'artisan_command_without_php_artisan')
        ** You don't have to edit this function. You can edit the config file before running 'php artisan fajerkit:install'
        */

        // Livewire Installation
        $this->composerInstall('livewire', 'livewire/livewire', 'livewire:publish --config');

        // Volt Installation
        $this->composerInstall('volt', 'livewire/volt', 'volt:install');

        // Laravel Folio Installation
        $this->composerInstall('laravel-folio', 'laravel/folio', 'folio:install');

        // Devdojo Auth Installation
        $this->composerInstall('devdojo-auth', 'devdojo/auth', 'vendor:publish --tag="auth:assets,auth:config,auth:ci,auth:migrations"');

        // CamelUI Installation
        $this->composerInstall('camelui', 'iammarjamal/camelui', 'vendor:publish --tag="camelui-config"');

        // Laravel PWA Installation
        $this->composerInstall('laravel-pwa', 'silviolleite/laravelpwa --prefer-dist', 'vendor:publish --provider="LaravelPWA\Providers\LaravelPWAServiceProvider"');

        // Browser Detect Installation
        $this->composerInstall('browser-detect', 'hisorange/browser-detect', '');

        // Laravel Page Speed Installation
        $this->composerInstall('laravel-page-speed', 'renatomarinho/laravel-page-speed', 'vendor:publish --provider="RenatoMarinho\LaravelPageSpeed\ServiceProvider"');

        // Laravel Horizon Installation
        $this->composerInstall('laravel-horizon', 'laravel/horizon', 'horizon:install');

        // Laravel Pulse Installation
        $this->composerInstall('laravel-pulse', 'laravel/pulse', 'vendor:publish --provider="Laravel\Pulse\PulseServiceProvider"');

        // Laravel Telescope Installation
        $this->composerInstall('laravel-telescope', 'laravel/telescope', 'telescope:install');

        /* Node npm Install */
        /*
        ** You can use the following function for npm packages like this:
        ** composerInstall('package_name_in_lower_case', 'npm_command', 'optional_additional_command')
        ** You don't have to edit this function. You can edit the config file before running 'php artisan fajerkit:install'
        */

        // TailwindCSS Installation
        $this->nodeInstall(
            'tailwindcss',
            'npm install tailwindcss postcss autoprefixer',
            'npx tailwindcss init -p && npm install -D @tailwindcss/forms && npm install -D @tailwindcss/typography && echo \'const colors = require("tailwindcss/colors"); 
        module.exports = {
          darkMode: "class",
          content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
            "./resources/**/*.jsx",
            "./app/**/*.php",
            "./resources/**/*.{php,html,js,jsx,ts,tsx,vue,twig}",
          ],
          theme: {
            // Screens
            screens: {
              sm: "320px",
              md: "768px",
              lg: "1024px",
              xl: "1366px",
            },
            // Extend
            extend: {
              // Colors
              colors: {
                primary: colors.blue,
                secondary: colors.gray,
                success: colors.emerald,
                danger: colors.red,
                warning: colors.amber,
                info: colors.blue,
                light: colors.white,
                dark: colors.black
              },
              // Animations
              keyframes: {
                shimmer: {
                  "100%": { transform: "translateX(100%)" },
                },
              },
            },
          },
          plugins: [
            require("@tailwindcss/forms"),
            require("@tailwindcss/typography"),
          ],
        }\' > tailwind.config.js'
        );

        return self::SUCCESS;
    }

    /**
     * Install a package using Composer and run an optional Artisan command.
     *
     * @param  string  $packageName  The name of the package (in lower case).
     * @param  string  $composerCommand  The composer command to install the package.
     * @param  string  $artisanCommand  Optional artisan command to run after installation.
     */
    private function composerInstall(string $packageName, string $composerCommand, string $artisanCommand = '')
    {
        if (config("fajerkit.laravel.$packageName")) {
            // Run Composer Command
            exec('composer require '.$composerCommand, $output, $returnVar);
            echo implode("\n", $output)."\n";

            // Success or Failure message
            echo $returnVar === 0
                ? "$packageName has been installed successfully."
                : "Failed to install $packageName. Exit Code: $returnVar";

            // Run Artisan Command if installation was successful
            if ($returnVar === 0 && $artisanCommand) {
                exec('php artisan  '.$artisanCommand, $output, $returnVar);
                echo implode("\n", $output)."\n";

                echo $returnVar === 0
                ? "$packageName has been installed successfully."
                : "Failed to artisan $packageName. Exit Code: $returnVar";
            }
        }
    }

    /**
     * Install a Node package via npm.
     *
     * @param  string  $packageName  The name of the package (in lower case).
     * @param  string  $npmCommand  The npm command to install the package.
     * @param  string  $additionalCommand  Optional additional npm commands to run.
     */
    private function nodeInstall(string $packageName, string $npmCommand, string $additionalCommand = '')
    {
        if (config("fajerkit.node.$packageName")) {
            // Run npm command
            exec($npmCommand, $output, $returnVar);
            echo implode("\n", $output)."\n";

            // Success or Failure message
            echo $returnVar === 0
                ? "$packageName has been installed successfully via npm."
                : "Failed to install $packageName via npm. Exit Code: $returnVar";

            // Run additional npm command if provided
            if ($returnVar === 0 && $additionalCommand) {
                exec($additionalCommand, $output, $returnVar);
                echo implode("\n", $output)."\n";
            }
        }
    }
}
