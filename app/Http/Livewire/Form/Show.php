<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['fetchMovie' => 'fetch'];
    private $api_source = 'https://api.themoviedb.org/3';

    public $poster_path = null, $original_title = null, $title = null, $original_language = null, $overview = null, $release_date = null, $status = null, $genres = [];

    /**
     * It fetches the movie data from the API and stores it in the object
     *
     * @param movie_id The ID of the movie you want to fetch.
     */
    public function fetch($movie_id)
    {
        $response = Http::get("$this->api_source/movie/$movie_id", [
            'api_key' => '1309fcf57f67583d2fd1a6f02786fbe6',
        ]);
        $data = $response->object();

        $this->poster_path = ($data->poster_path ? "https://image.tmdb.org/t/p/w200/$data->poster_path" : '/No-image-available.png');
        $this->original_title = $data->original_title;
        $this->title = $data->title;
        $this->overview = $data->overview;
        $this->status = str_replace(' ', '_', strtolower($data->status));
    }

    public function render()
    {
        return view('livewire.form.show');
    }
}
