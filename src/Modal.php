<?php

namespace GildedRose;

class Modal
{
    const AGED = 'Aged Brie';
    const PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    public static function conditionsTest($name, $quality, $condition, $sell_in = null)
    {
        if ($condition === 1) {
            if (($name !== self::AGED || $name !== self::PASSES || $name !== self::SULFURAS) && $quality > 0) {
                return true;
            }
        } elseif ($condition === 2) {
            if ($quality < 50 && ($name === self::PASSES || $name === self::AGED) && $sell_in < 11 && $sell_in > 5) {
                return true;
            }
        } elseif ($condition === 3) {
            if ($quality < 50 && ($name === self::PASSES || $name === self::AGED) && $sell_in < 6) {
                return true;
            }
        }
    }
}
