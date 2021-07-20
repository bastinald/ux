<?php

namespace Bastinald\Ux\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;

class MakeAModelCommand extends Command
{
    protected $signature = 'make:amodel {class} {--force}';
    private $filesystem;
    private $modelParser;
    private $factoryParser;

    public function handle()
    {
        $this->filesystem = new Filesystem;

        $this->modelParser = new ComponentParser(
            'App\\Models',
            config('livewire.view_path'),
            $this->argument('class')
        );

        $this->factoryParser = new ComponentParser(
            'Database\\Factories',
            config('livewire.view_path'),
            $this->argument('class') . 'Factory'
        );

        if ($this->filesystem->exists($this->modelParser->classPath()) && !$this->option('force')) {
            $this->warn('Model exists: <info>' . $this->modelParser->className() . '</info>');
            $this->warn('Use the <info>--force</info> to overwrite it.');

            return;
        }

        $this->makeStubs();

        $this->warn('Model made: <info>' . $this->modelParser->relativeClassPath() . '</info>');
        $this->warn('Factory made: <info>' . $this->factoryPath('relativeClassPath') . '</info>');
    }

    private function makeStubs()
    {
        $stubs = [
            $this->factoryPath('classPath') => config('ux.stub_path') . '/amodel/Factory.php',
            $this->modelParser->classPath() => config('ux.stub_path') . '/amodel/Model.php',
        ];

        $replaces = [
            'DummyFactoryClass' => $this->factoryParser->className(),
            'DummyFactoryNamespace' => $this->factoryParser->classNamespace(),
            'DummyModelClass' => $this->modelParser->className(),
            'DummyModelNamespace' => $this->modelParser->classNamespace(),
        ];

        foreach ($stubs as $path => $stub) {
            $contents = Str::replace(array_keys($replaces), $replaces, $this->filesystem->get($stub));

            $this->filesystem->ensureDirectoryExists(dirname($path));
            $this->filesystem->put($path, $contents);
        }
    }

    private function factoryPath($method)
    {
        return Str::replaceFirst(
            'app/Database/Factories',
            'database/factories',
            $this->factoryParser->$method()
        );
    }
}
