<?php
$targetPath = 'C:\xampp\htdocs\public_html_temporary_down\resume_builder\upload';
$linkPath = 'C:\Users\Supremo\Desktop\v4\eoms4\public';

// Create symlink
$success = symlink($targetPath, $linkPath);

// Check if symlink creation was successful
if ($success) {
    echo 'Symlink created successfully!';
} else {
    echo 'Failed to create symlink.';
}
?>