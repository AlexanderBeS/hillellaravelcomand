<?php

namespace App\Console\Commands;

use App\Model\CovidStat;
use App\Service\StatServiceInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CovidDelete extends Command
{
    protected $signature = 'covid:delete {id}';
    private $covidStatService;

    public function __construct(StatServiceInterface $statService)
    {
        $this->covidStatService = $statService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        try {
            $this->covidStatService->delete($id);
            $this->info('Data deleted');
        } catch (\InvalidArgumentException $exception) {
            $this->error('ERROR: '. $exception->getMessage());
        }

        return 0;
    }
}








