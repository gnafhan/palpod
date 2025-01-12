<?php

namespace App\Livewire;

use Livewire\Component;

class SideComponent extends Component
{
    public $title;
    public $description;
    public $date;
    public $rating = 5.0;
    public $authors;

    public function mount($title = null, $description = null, $date = null, $authors = null)
    {
        $this->title = $title ?? 'Inpirasi mahasiswa juara: Cerita sukses di Samsung Solve for Tomorrow';
        $this->description = $description ?? 'Ceritanya deskripsi, Lorem ipsum dolor sit amet consectetur. Vitae ac neque mauris et donec accumsan amet pretium. Rhoncus nunc ornare malesuada sit sit et facilisi platea id.';
        $this->date = $date ?? '20 Dec 2024';
        $this->authors = $authors ?? 'Ghanosaur, Papank, Arga Speed';
    }

    public function render()
    {
        return view('livewire.side-component');
    }
}