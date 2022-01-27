<?php

$arr = [1, 3, 5, 4, 5, 7];

$result = minmax($arr);

print_r($result);

echo '<br>';


$matrix = [ [1, 2, 3, 2, 7],
            [4, 5, 6, 8, 1],
            [7, 8, 9, 4, 5]
            ];

$matrix_result = is_one_to_nine($matrix);


print_r($matrix_result);
echo '<br>';

$strings = [
    ["Hello", "world"],
    ["Brad", "came", "to", "dinner", "with", "us"],
    ["He", "loves", "tacos"]
];

$format = ["LEFT", "RIGHT", "LEFT"];

$limit = 16;

$format_strings = get_format_str($strings, $format, $limit);

print_r($format_strings);


function minmax($arr) {
    for ($i = 1; $i < count($arr) - 1; $i++) {
        if ($arr[$i-1] > $arr[$i] &&  $arr[$i] < $arr[$i+1]) {
            $j = 1;
        } elseif ($arr[$i-1] < $arr[$i] &&  $arr[$i] > $arr[$i+1]) {
            $j = 1;
        } else {
            $j = 0;
        }
        $result[] = $j;
    }
    return $result;
}

function is_one_to_nine($matrix) {

        for ($j = 0; $j < count($matrix[0]) - 2 ; $j++) {
            $numb = [];
            for ($i = 0; $i<3; $i++) {
                for ($k = 0; $k < 3; $k++) {
                    if (!$numb) {
                        $numb = [$matrix[0][$j]];
                    } elseif(!in_array($matrix[$i][$j+$k], $numb)) {
                        $numb[] = $matrix[$i][$j+$k];
                    }
                }
            }
            if (count($numb) == 9) {
                $result[] = 'true';
            } else {
                $result[] = 'false';
            }
        }
    return $result;
}

function get_format_str($strings, $format, $limit) {
    $result[0] = str_repeat("*", $limit+2);

    for ($i=0; $i < count($strings); $i++) {
        $stringline = [];
        $string = $strings[$i][0];
        if (count($strings[$i]) != 1) {
            for ($j = 1; $j < count($strings[$i]); $j++) {
                if ((strlen($string) + strlen($strings[$i][$j]) + 1) <= $limit) {
                    $string .= " " . $strings[$i][$j];
                } else {
                    $stringline[] = $string;
                    $string = $strings[$i][$j];
                }
            }
            $stringline[] = $string;
        } else {
            $stringline[] = $string;
        }

        foreach ($stringline as $value) {
            $space = str_repeat("&nbsp;",$limit - strlen($value));
            if ($format[$i] == "LEFT") {
                $value = "*" . $value . $space . "*";
            } elseif ($format[$i] == "RIGHT") {
                $value = "*" . $space . $value . "*";
            }
                $result[] = $value;
        }
    }

    $result[] = $result[0];
    return $result;

}

