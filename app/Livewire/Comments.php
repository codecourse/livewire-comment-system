<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Comments extends Component
{
    public Model $model;

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->model->comments
        ]);
    }
}
