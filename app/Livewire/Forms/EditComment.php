<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditComment extends Form
{
    #[Validate('required')]
    public string $body = '';
}
