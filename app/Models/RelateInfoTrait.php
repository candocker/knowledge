<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

trait RelateInfoTrait
{
    public function countryInfo()
    {
        return $this->hasOne(Country::class, 'code', 'country_code');
    }

    public function figureInfo()
    {
        return $this->hasOne(Figure::class, 'code', 'figure_code');
    }
}
