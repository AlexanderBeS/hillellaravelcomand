<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.04.2020
 * Time: 22:15
 */

namespace App\Console\Commands;

use App\Model\CovidStat;
use App\Service\StatServiceInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CovidUpdate extends Command
{
    protected $signature = 'covid:update {id}';
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

        print_r($data[0]);



        /*
        $countriesList = $this->covidStatService->getCountries()->pluck('name')->toArray();
        $country = $this->choice('Country name', $countriesList);


        try {
            $this->covidStatService->add($data);
            $this->info('Data saved');
        } catch (\InvalidArgumentException $exception) {
            $this->error('ERROR: '. $exception->getMessage());
        }
        */

        return 0;
    }
}