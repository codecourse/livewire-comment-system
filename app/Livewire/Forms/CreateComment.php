<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateComment extends Form
{
    #[Validate('required')]
    public string $body = '';
}
