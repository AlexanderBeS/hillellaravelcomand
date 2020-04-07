<?php


namespace App\Console\Commands;


use App\Model\CovidStat;
use App\Service\StatServiceInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CovidList extends Command
{
    private $covidStatService;

    protected $signature = 'covid:list';

    public function __construct(StatServiceInterface $statService)
    {
        $this->covidStatService = $statService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stat = $this->covidStatService->list();

        $data = [];

        /** @var CovidStat $data */
        foreach ($stat as $item) {
            $data[] = [
                'country_name' => $item->country->name,
                'ill' => $item->ill_num,
                'death' => $item->death_num,
                'good' => $item->good_num
            ];
        }

        $this->table(
            ['Country Name', 'Illnes', 'Deaths', 'Get well'],
            $data
        );

        return 0;
    }

}
