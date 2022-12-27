<?php

namespace App\Base;

class Helper
{
    public static function buildMenu(array $array, int $parent_id)
    {
        $menu = [];
        foreach ($array as $item) {
            $item = (array) $item;
            if ($item['parent_id'] == $parent_id) {
                $children = self::buildMenu($array, $item['id']);
                if ($children) {
                    $item['children'] = $children;
                }
                $menu[] = $item;
            }
        }

        return $menu;
    }
}
