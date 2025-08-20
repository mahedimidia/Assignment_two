<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class Pagination extends Component
{
    public $datas;

    public function __construct(LengthAwarePaginator $datas)
    {
        $this->datas = $datas;
    }

    public function render()
    {
        return view('components.pagination');
    }
}
