<?php

namespace App\View\Components\Filament\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatingStar extends Field
{
    protected string $view = 'components.filament.forms.components.rating-star';

    protected int|Closure $stars = 5;

    public function stars(int|Closure $stars): static
    {
        $this->stars = $stars;
        return $this;
    }

    public function getStars(): int
    {
        return $this->evaluate($this->stars);
    }
}
