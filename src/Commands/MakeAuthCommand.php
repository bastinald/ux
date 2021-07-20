<?php

namespace Bastinald\Ux\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Livewire\Commands\ComponentParser;

class MakeAuthCommand extends Command
{
    protected $signature = 'make:auth {--force}';
    private $filesystem;

    public function handle()
    {
        $this->filesystem = new Filesystem;
        $path = ComponentParser::generatePathFromNamespace(config('livewire.class_namespace'));

        if ($this->filesystem->exists($path . '/Auth/Login.php') && !$this->option('force')) {
            $this->warn('Auth exists.');
            $this->warn('Use the <info>--force</info> to overwrite it.');

            return;
        }

        $this->makeStubs();
        $this->determineFontAwesomeVersion();
        $this->executeFinalCommands();

        $this->info('Auth made successfully.');
        $this->info(config('app.url'));
    }

    private function makeStubs()
    {
        $stubs = config('ux.stub_path') . '/auth';

        foreach ($this->filesystem->allFiles($stubs) as $stub) {
            $path = base_path($stub->getRelativePathname());

            $this->filesystem->ensureDirectoryExists(dirname($path));
            $this->filesystem->put($path, $this->filesystem->get($stub));

            $this->warn('File created: <info>' . $stub->getRelativePathname() . '</info>');
        }
    }

    private function determineFontAwesomeVersion()
    {
        Artisan::call('vendor:publish', ['--tag' => 'ux:config'], $this->getOutput());

        $version = $this->choice(
            'Which version of Font Awesome will you use?',
            ['Free', 'Pro (requires global NPM token config)']
        );

        if ($version != 'Free') {
            $files = [base_path('package.json'), config_path('ux.php'), resource_path('scss/app.scss')];

            foreach ($files as $file) {
                $contents = str_replace(
                    ['@fortawesome/fontawesome-free', "'font_awesome_style' => 'solid'", '/scss/solid'],
                    ['@fortawesome/fontawesome-pro', "'font_awesome_style' => 'regular'", '/scss/regular'],
                    $this->filesystem->get($file)
                );

                $this->filesystem->put($file, $contents);
            }
        }
    }

    private function executeFinalCommands()
    {
        Artisan::call('make:amodel', ['class' => 'User', '--force' => true], $this->getOutput());
        Artisan::call('make:crud', ['path' => 'Users', '--force' => true], $this->getOutput());
        Artisan::call('migrate:auto', ['--fresh' => true, '--seed' => true], $this->getOutput());

        exec('npm install');
        exec('npm run dev');
    }
}
