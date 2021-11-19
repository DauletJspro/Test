<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    CONST CONDN1 = 1;
    CONST CONDN2 = 2;
    CONST CONDN3 = 3;
    /**
     * @var Item[]
     */
    private  $items ;

    public function __construct(array $items)
    {
        $this->items = $items;
    }


    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if (Modal::conditionsTest($item->name, $item->quality, self::CONDN1)) {
                $item->quality -= 1;
            } elseif(Modal::conditionsTest($item->name, $item->quality, self::CONDN2, $item->sell_in)) {
                $item->quality += 2;
            } elseif(Modal::conditionsTest($item->name, $item->quality, self::CONDN3, $item->sell_in)) {
                $item->quality += 3;
            } elseif($item->name != Modal::SULFURAS && $item->quality < 50) {
                $item->quality += 1;
            }
            if($item->name != Modal::SULFURAS){ $item->sell_in -= 1; }
            if ($item->sell_in < 0 && Modal::conditionsTest($item->name, $item->quality, self::CONDN1)) {
                $item->quality -= 1;
            }
            elseif ($item->sell_in < 0){
                    $item->quality < 50 ? $item->quality += 1 :$item->quality = 0;
            }
        }
    }

}
