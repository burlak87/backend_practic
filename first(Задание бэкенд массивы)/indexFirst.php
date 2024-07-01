<?php
$data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ],
    ]
];
$botCounts = [];
foreach ($data['category'] as $category) {
    $botCounts[] = $category['views']['bot_count'];
}
$botCountsMax = max($botCounts);
print_r($botCountsMax);
echo '<br/>';
$botCountsMin = min($botCounts);
print_r($botCountsMin);
echo '<br/>';
$sortedData = [];
usort($data['category'], function($a, $b) {
    return $a['priority'] - $b['priority'];
});
foreach ($data['category'] as $category) {
    $sortedData[] = $category['views'];
};
foreach ($sortedData as $views) {
    print_r("user_count: " . $views["user_count"] . " , " . "bot_count: " . $views["bot_count"]);
    echo '<br/>';
};