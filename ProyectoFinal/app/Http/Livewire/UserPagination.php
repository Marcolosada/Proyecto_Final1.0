<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Profesores;
use App\Models\Semestres;
use App\Models\Consejos;
use App\Models\Descripcionprofes;

use App\Models\User;

class UserPagination extends Component

{

    use WithPagination;

    /**

     * Write code on Method

     *

     * @return response()

     */ public function render()

    {
        return view('livewire.user-pagination');
    }
}
