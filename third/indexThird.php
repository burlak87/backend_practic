<?php
$data = 5;
toReturn();
function toReturn() {
    global $data;
    if (gettype($data) === "integer") {
        switch ($data) {
            case $data < 7:
                low_quantity();
                break;
            case $data > 40:
                high_quantity();
                break;
            case $data == 10:
                medium_quantity();
                break;
        };
        return $data;
    }
}
function low_quantity() {
    global $data;
    $data = $data - $data * 0.5;
};
function high_quantity() {
    global $data;
    $data = $data * 0.5;
};
function medium_quantity() {
    global $data;
    $data = $data * 0;
};
function count_unique_results($num_one, $num_two)
{
    $results = [];
    for ($i = min($num_one, $num_two); $i <= max($num_one, $num_two); $i++) {
        global $data;
        $data = $i;
        $result = toReturn();
        if (!in_array($result, $results)) {
            $results[] = $result;
        }
    }
    return count($results);
}

echo "Уникальные результаты для интервала от 1 до 15: " . count_unique_results(1, 15) . "<br>";
echo "Уникальные результаты для интервала от 3 до 55: " . count_unique_results(3, 55) . "<br>";
echo "Уникальные результаты для интервала от 9 до 43: " . count_unique_results(9, 43) . "<br>";