<?php

namespace App\Livewire;

use App\Models\Spotify;
use Livewire\Component;

class SideComponent extends Component
{
    public $title;
    public $description;
    public $date;
    public $rating = 5.0;
    public $authors;
    public $id;

    public function mount()
    {
        $spotify_last = Spotify::latest()->first();
        $this->title = $spotify_last->title;
        $this->description = $this->wordClamp($spotify_last->description, 20);
        $this->date = $spotify_last->published_at->format('d M Y');
        $this->rating = 5.0;
        $this->authors = "";
        $this->id = $spotify_last->id;
    }

    public function render()
    {
        return view('livewire.side-component');
    }

    private function wordClamp($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            return substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}