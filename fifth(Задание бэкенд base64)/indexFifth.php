<?php
$data_json = '{
    "call": {
        "product_name": {
            "tradeble": "true",
            "name": "main_window"
        },
        "image_name": "sun1",
        "image": {
            "link": "https://product_web",
            "base64": "data:image/jpeg;base64,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"
        }
    }
}';

$arr = json_decode($data_json, true);
if(isset($arr["call"])) {
    $product = $arr["call"]["product_name"]; 
    if(isset($product["tradeble"]) && $product["tradeble"] == "true") {
        $data = [
            "image_name" => $arr["call"]["image_name"],
            "link" => $arr["call"]["image"]["link"],
            "file_path" => "/" . base64_decode($arr["call"]["image"]["base64"]) . "/" . $arr["call"]["image_name"] . ".jpeg",
            "name" => $product["name"]
        ];
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    } else {
        echo "tradeble = false";
    }
};

// $arr = json_decode($arr_json, true);
// switch (true) {
//     case (isset($arr["call"])):
//         $product = $arr["call"]["product_name"];
//         if((isset($arr["call"]["product_name"]["tradeble"])) && ($arr["call"]["product_name"]["tradeble"] == 'true')) {
//             global $arr;
//             $data = [
//                 "image_name" => $arr["call"]["image_name"],
//                 "link" => $arr["call"]["image"]["link"],
//                 "file_path" => "/" . base64_decode($arr["call"]["image"]["link"]) . "/" . $arr["call"]["image_name"] . "/" . ".jpeg",
//                 "name" => $arr["call"]["product_name"]["name"]
//             ];
//             print_r($data);
//         } else {
//             echo "tradeble = false";
//         }
//     break;
// }