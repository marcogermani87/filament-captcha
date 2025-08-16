<?php

use Filament\Support\Enums\ActionSize;

return [

    // optional, default is 5
    // 'length' => 4,

    // optional, default is 'abcdefghijklmnpqrstuvwxyz123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    // 'charset' => '123456789',

    'width' => 180,

    'height' => 50,

    'background_color' => [255, 255, 255],

    'refresh_button' => [
        'icon' => 'heroicon-o-arrow-path',
        'size' => ActionSize::Medium,
    ],

];
