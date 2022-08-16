<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class MovieApi extends Component
{
    public $query='Matrix', $items=[];
    private $api_source = 'https://api.themoviedb.org/3';

    public function render()
    {
        $this->search();
        return view('livewire.movie-api');
    }

    /**
     * It makes a GET request to the API endpoint `/search/movie` with the query parameters `api_key` and `query` and then
     * sets the `items` property to the results of the request
     */
    public function search() {
        $response = Http::get("$this->api_source/search/movie", [
            'api_key' => '1309fcf57f67583d2fd1a6f02786fbe6',
            'query' => $this->query,
        ]);
        $this->items = $response->object()->results;
    }
}
