<?php

$stringinput = "
* Hello # This is a comment
This will be in a paragraph , *this* will be bold.
This is also a paragraph, * _this_ is underlined.
# another comment
This will be italic /Jovan/ .
# comment
Not a *comment* .
";


function parseString($String){



    $arr=explode("\n",$String);
    $sentence="";
    foreach ($arr as $word) {
        if (strlen(trim($word))>0) {
            if ((strpos($word, "*") === 0) && (strpos($word, " ") === 1)) {
                $word = str_replace("* ", "", $word);

                if (strpos($word,"#")!==false) {
                    $word = str_replace("#", "<!--", $word);
                    $word = "<h1> $word </h1>";
                    $word = str_replace("</h1>", "--!> </h1>", $word);
                    $sentence .= $word;
                }
                else{
                    $sentence .= "<h1> $word </h1>";
                }


            } else {
                if (strpos($word,"#")!==false) {
                    $word = str_replace("#", "<!--", $word);
                    $word = "<p> $word </p>";
                    $word = str_replace("</p>", "--!> </p>", $word);
                    $sentence .= $word;
                }
                else{
                    $sentence .= "<p> $word </p>";
                }
            }
            $sentence .="\n";
        }
    }
    $arr=explode(" ",$sentence);
    $words="";


    foreach ($arr as $word) {

        if ((strpos($word, "*") === 0) && (strrpos($word, "*") === strlen($word) - 1) && (strlen($word)>1)) {
            $word = str_replace("*", "", $word);
            $words .= " <b>$word</b> ";
        }
        elseif ((strpos($word, "/") === 0) && (strrpos($word, "/") === strlen($word) - 1) && (strlen($word)>1)) {
            $word = str_replace("/", "", $word);
            $words .= " <i>$word</i> ";
        }
        elseif ((strpos($word, "_") === 0) && (strrpos($word, "_") === strlen($word) - 1) && (strlen($word)>1)) {
            $word = str_replace("_", "", $word);
            $words .= " <u>$word</u> ";
        }

        else{
            $words.=" $word ";
        }

    }


    return $words;

}

echo (parseString($stringinput));

?>
