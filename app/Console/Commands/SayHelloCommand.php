<?php

namespace App\Console\Commands;

use App\Trait\SampleTrait;
use Illuminate\Console\Command;

class SayHelloCommand extends Command
{
    use SampleTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sayHello {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say Hello by user by name using a trait';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->info($this->sayHello($name));
    }
}
