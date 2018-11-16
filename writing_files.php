<?php

$files = "example.txt";

if ($handle = fopen($files,'w')) {
    fwrite($handle, "I love PHP");
    fclose($handle);
}else {
    echo "The application was not able to write on the file";
}


?>