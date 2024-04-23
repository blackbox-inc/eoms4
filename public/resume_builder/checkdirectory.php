<?php

$directoryPath = 'upload1/';

if (is_dir($directoryPath)) {
    echo "The directory exists.";
} else {
    echo "The directory does not exist.";
}

?>