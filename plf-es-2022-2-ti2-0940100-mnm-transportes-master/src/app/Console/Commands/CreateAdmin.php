<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Admin::factory()->create();

        echo "USUARIO CRIADO COM SUCESSO".PHP_EOL;
        echo "usuario: admin".PHP_EOL;
        echo "senha: admin@123".PHP_EOL;

        return Command::SUCCESS;
    }
}
