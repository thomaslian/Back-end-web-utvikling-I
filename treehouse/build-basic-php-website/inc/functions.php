<?php
function get_item_php($id, $item)
{
    $output = "<li><a href='#'><img src='"
        . $item["img"] . "' alt='"
        . $item["title"] . "'/>"
        . "<p>View details</p>"
        . "</a></li>";
    return $output;
}

function array_category($catalog, $category)
{
    $output = array();

    foreach ($catalog as $id => $item) {
        if ($category == null || strtolower($category) == strtolower($item["category"])) {
            $sort = $item["title"];
            $sort = ltrim($sort, "The ");
            $sort = ltrim($sort, "A ");
            $sort = ltrim($sort, "An ");
            $output[$id] = $sort;
        }
    }
    asort($output);


    return array_keys($output);
}