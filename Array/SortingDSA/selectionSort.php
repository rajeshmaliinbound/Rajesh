<?php
function selectionSort($arr) {
    $n = count($arr);
    
    // Traverse through all array elements
    for ($i = 0; $i < $n - 1; $i++) {
        // Find the minimum element in unsorted array
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        
        // Swap the found minimum element with the first element
        if ($minIndex != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $temp;
        }
    }
    return $arr;
}

// Example usage
$arr = [64, 25, 12, 22, 11];
$sortedArr = selectionSort($arr);
echo "<pre>";
print_r($sortedArr);
?>