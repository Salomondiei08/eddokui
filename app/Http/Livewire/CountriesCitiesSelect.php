<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class CountriesCitiesSelect extends Component
{
    public $country_id; // L'identifiant du pays
    public $city_id; // L'identifiant de la ville
    public $cities; // la collection de villes

    public function mount() {
        // On affecte une collection vide
        $this->cities = collect();
    }

    // Quand $country_id change, on charge les $cities de $country_id
    public function updatedCountryId ($newValue) {
        $this->cities = City::where("country_id", $newValue)->orderBy("name")->get();
    }

    public function render()
    {
        // On récupère les pays
        $countries = Country::select("id", "name")->get();

        // On retourne la vue avec les pays
        return view('livewire.countries-cities-select', [
            'countries' => $countries
        ]);
    }
}
