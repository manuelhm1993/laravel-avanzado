<?php

namespace App\Utilities;

use App\Http\Controllers\Admin\CategoryController;

class Admin 
{
    public static array $resources = [
        'resources' => [
            'categorias' => CategoryController::class,
        ],
        'options' => [],
    ];
}