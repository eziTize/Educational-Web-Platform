<?php
namespace App\Models\TraitsAttributes;

use Illuminate\Support\Str;

trait ProfileExtraAttributes{

    /**
     * Get the teachers's average price without decimals.
     *
     * @param  string  $value
     * @return string
     */
    public function getAveragePriceAttribute($value)
    {
        $price = intval($value);
        return $price;
    }

    /**
     * Get the teachers's average price
     *
     * @param  string  $value
     * @return string
     */
    public function getAveragePriceOriginalAttribute()
    {
        return $this->attributes['average_price'];
    }
}