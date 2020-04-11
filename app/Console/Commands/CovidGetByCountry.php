<?php

namespace App\Console\Commands;

use App\Model\CovidStat;
use App\Service\StatServiceInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CovidGetByCountry extends Command
{
    protected $signature = 'covid:getbycountry {country}';
    private $covidStatService;

    public function __construct(StatServiceInterface $statService)
    {
        $this->covidStatService = $statService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $country = $input->getArgument('country');
        $stat = $this->covidStatService->getByCountry($country);

        /** @var CovidStat $data */
        foreach ($stat as $item) {
            $data[] = [
                'id' => $item->id,
                'country_name' => $country,
                'country_id' => $item->country_id,
                'ill' => $item->ill_num,
                'death' => $item->death_num,
                'good' => $item->good_num
            ];
        }
        $this->table(
            ['id', 'Country Name', 'Country Id', 'Illnes', 'Deaths', 'Get well'],
            $data
        );

        return 0;
    }
}








