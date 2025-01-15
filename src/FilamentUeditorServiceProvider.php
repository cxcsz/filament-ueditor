<?php

namespace Cxcsz\FilamentUeditor;

use Cxcsz\FilamentUeditor\Commands\FilamentUeditorCommand;
use Cxcsz\FilamentUeditor\Testing\TestsFilamentUeditor;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentUeditorServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-ueditor';

    public static string $viewNamespace = 'filament-ueditor';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('cxcsz/filament-ueditor');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/cxcsz/filament-ueditor'),
        ], 'public');
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-ueditor/{$file->getFilename()}"),
                ], 'filament-ueditor-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentUeditor);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'cxcsz/filament-ueditor';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        //        return [
        //            // AlpineComponent::make('filament-ueditor', __DIR__ . '/../resources/dist/components/filament-ueditor.js'),
        //            Css::make('filament-ueditor-styles', __DIR__ . '/../resources/dist/filament-ueditor.css'),
        //            Js::make('filament-ueditor-scripts', __DIR__ . '/../resources/dist/filament-ueditor.js'),
        //        ];
        return [];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentUeditorCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }
}
