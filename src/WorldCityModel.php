<?php

class WorldCityModel
{
    public function __construct(
        public int $id,
        public string $city,
        public string $cityAscii,
        public float $lat,
        public float $lng,
        public string $country,
        public string $iso2,
        public string $iso3,
        public string $adminName,
        public string $capital,
        public int $population
    ) {}

    public function getCityWithCountry() {
        return "{$this->city} ({$this->getFlag()} $this->country) ";
    }

    public function getFlag() {
        $iso2 = strtolower($this->iso2);
        return mb_chr(127462 + ord($iso2[0]) - ord('a')) .  mb_chr(127462 + ord($iso2[1]) - ord('a'));
    }
}
