<?php
$dst = 'file://users.txt';

echo $dst, file_exists($dst) ? ' exists' : ' does not exist', "\n";
echo $dst, is_readable($dst) ? ' is readable' : ' is NOT readable', "\n";
echo $dst, is_writable($dst) ? ' is writable' : ' is NOT writable', "\n";
$fh = fopen($dst, 'w');
if ( !$fh ) {
    echo ' last error: ';
    var_dump(error_get_last());
}


?>
