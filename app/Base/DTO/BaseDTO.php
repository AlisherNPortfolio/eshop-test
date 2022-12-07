<?php

namespace App\Base\DTO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BaseDTO
{
    public $request;

    public $data;

    public function __construct(Request $request)
    {
        App::bind(Request::class, BaseDTO::class);
        $this->request = $request;
        $this->data = $request->all();
    }

    public function getArray(): array
    {
        return (array) new $this($this->request);
    }
}
