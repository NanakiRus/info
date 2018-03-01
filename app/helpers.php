<?php
function nestedToString($category, $delimiter, $i = 1)
{
    $result = [];

    if (count($category) > 0) {
        foreach ($category as $entry) {
            $result[] = ' ' . str_repeat($delimiter, $i) . $entry->name;

            if ($entry->subcategory) {
                $result[] = nestedToString($entry->subcategory, $delimiter, $i + 1);
            }
        }
    }

    return implode($result);
}