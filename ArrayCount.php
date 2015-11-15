<?php


$numbers=array(1,2,array(4,5,3,1,4,5,array(1,2,3,5,55,4,array(array(1)))),4,5,6,5,4,1,2,40);

function array_count($numbers,$number)
{
    $sum=0;
    while (current($numbers)) {
        if (current($numbers)==$number)
        {
            $sum+=$number;
        }

        elseif(is_array(current($numbers)))
        {
            $sum+=array_count(current($numbers),$number);
        }
        next($numbers); 
    }
    return $sum;
}

echo array_count($numbers,1);




?>
