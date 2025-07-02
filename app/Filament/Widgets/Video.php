<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class Video extends Widget
{
    protected static string $view = 'filament.widgets.video';
    protected int | string | array $columnSpan = 'full';
}
