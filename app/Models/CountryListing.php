<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class CountryListing extends AbstractModel
{
    use SoftDeletes;
    protected $table = 'country_listing';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function countryInfo()
    {
        return $this->hasOne(Country::class, 'code', 'country_code');
    }

    public function catalogInfo()
    {
        return $this->hasOne(CountryCatalog::class, 'code', 'catalog_code');
    }
}
