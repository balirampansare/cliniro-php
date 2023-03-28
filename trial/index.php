<?php
    $command = escapeshellcmd('python3 news.py');
    $output = shell_exec($command);
    echo $output;
    echo"hello";
?>