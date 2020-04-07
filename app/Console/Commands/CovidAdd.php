<?php


namespace App\Console\Commands;

use App\Service\StatServiceInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CovidAdd extends Command
{
    protected $signature = 'covid:add {ill} {death} {good}';

    /** @var StatServiceInterface $covidStatService */
    private $covidStatService;

    public function __construct(StatServiceInterface $statService)
    {
        $this->covidStatService = $statService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $countriesList = $this->covidStatService->getCountries()->pluck('name')->toArray();
        $country = $this->choice('Country name', $countriesList);

        $ill = $input->getArgument('ill');
        $death = $input->getArgument('death');
        $good = $input->getArgument('good');

        $data = compact('ill', 'death', 'good');
        $data['country_name'] = $country;

        try {
            $this->covidStatService->add($data);
            $this->info('Data saved');
        } catch (\InvalidArgumentException $exception) {
            $this->error('ERROR: '. $exception->getMessage());
        }

        return 0;
    }
}
