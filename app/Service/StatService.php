<?php


namespace App\Service;


use App\Model\Countries;
use App\Model\CovidStat;
use Illuminate\Database\Eloquent\Collection;

class StatService implements StatServiceInterface
{
    public function add(array $data): void
    {
        /** @var Countries $country */
        $country = $this->getCountryByName($data['country_name']);
        if (!$country) {
            throw new \InvalidArgumentException('Country does not exists');
        }

        $stat = new CovidStat();
        $stat->ill_num = $data['ill'];
        $stat->death_num = $data['death'];
        $stat->good_num = $data['good'];
        $stat->country()->associate($country);
        $stat->save();
    }

    private function getCountryByName(string $name): Countries
    {
        return Countries::where('name', '=', $name)->first();
    }

    public function getCountries(): Collection
    {
        return Countries::all(['name']);
    }

    public function list(): Collection
    {
        return CovidStat::all();
    }

    public function update(int $id, array $data): void
    {
        /** @var Countries $country */
        $country = $this->getCountryByName($data['country_name']);
        if (!$country) {
            throw new \InvalidArgumentException('Country does not exists');
        }

        $stat = $this->get($id);
        $stat->ill_num = $data['ill'];
        $stat->death_num = $data['death'];
        $stat->good_num = $data['good'];
        $stat->country()->associate($country);

        $stat->save();
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    public function get(int $id): ?CovidStat
    {
        return CovidStat::find($id);
    }

    public function getByCountry(string $country): ?Collection
    {
        // TODO: Implement getByCountry() method.
    }

}
