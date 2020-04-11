<?php

namespace App\Console\Commands;

use App\Model\CovidStat;
use App\Service\StatServiceInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CovidGet extends Command
{
    protected $signature = 'covid:get {id}';
    private $covidStatService;

    public function __construct(StatServiceInterface $statService)
    {
        $this->covidStatService = $statService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $stat = $this->covidStatService->get($id);

        $data[] = [
            'country_name' => $stat->country->name,
            'ill' => $stat->ill_num,
            'death' => $stat->death_num,
            'good' => $stat->good_num
        ];

        $this->table(
            ['Country Name', 'Illnes', 'Deaths', 'Get well'],
            $data
        );

        return 0;
    }
}








