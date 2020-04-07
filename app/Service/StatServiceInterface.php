<?php


namespace App\Service;


use App\Model\Countries;
use App\Model\CovidStat;
use Illuminate\Database\Eloquent\Collection;

interface StatServiceInterface
{
    public function add(array $data): void;
    public function list(): Collection;
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
    public function get(int $id): ?CovidStat;
    public function getByCountry(string $country): ?Collection;

    public function getCountries(): Collection;
}
