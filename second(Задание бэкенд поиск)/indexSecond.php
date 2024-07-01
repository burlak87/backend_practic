<?php
$data = [
    'category1' => [
        'price' => 10000,
        'name' => 'A'
    ],
    'category2' => [
        'price' => 15000,
        'name' => 'B'
    ],
    'category3' => [
        'price' => 5000,
        'name' => 'C'
    ],
    'category4' => [
        'price' => 10000,
        'name' => 'D'
    ],
    'category5' => [
        'price' => 25000,
        'name' => 'B'
    ],
    'category6' => [
        'price' => 15000,
        'name' => 'B'
    ],
    'category7' => [
        'price' => 10000,
        'name' => 'A'
    ]
];
function searchItems($data, $searchParams) {
    $results = [];
    $foundItems = [];
    foreach ($data as $item) {
        if (isset($searchParams['price']) && $item['price'] == $searchParams['price'] && !in_array($item, $foundItems)) {
            $results[] = $item;
            $foundItems[] = $item;
        }
        if (isset($searchParams['name']) && $item['name'] == $searchParams['name'] && !in_array($item, $foundItems)) {
            $results[] = $item;
            $foundItems[] = $item;
        }
    }
    return $results;
}
// тест функции
$searchParams = array('price' => 10000, 'name' => 'B');
$results = searchItems($data, $searchParams);
echo '<br/>';
echo '<pre>'; 
print_r($results);;
echo '</pre>';
