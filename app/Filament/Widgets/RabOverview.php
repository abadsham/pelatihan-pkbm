<?php

namespace App\Filament\Widgets;

use App\Models\Rab;
use Filament\Widgets\Widget;

class RabOverview extends Widget
{
    protected static string $view = 'filament.widgets.rab-overview';
    protected int | string | array $columnSpan = 'full';

    public function getRabs()
    {
        return Rab::all();
    }
}
