<?php

namespace App\Console\Commands;

use App\Services\ExpertService;
use Illuminate\Console\Command;

class GetCarData extends Command
{
    private ExpertService $expertService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-car-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(ExpertService $expertService)
    {
        parent::__construct();
        $this->expertService = $expertService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = $this->expertService->getAutoStock();
    }
}
