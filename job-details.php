<?php
/**
 * Serves cached job detail pages to match live URLs: job-details.php?job_id=N
 */
$id = isset($_GET['job_id']) ? preg_replace('/[^0-9]/', '', (string)$_GET['job_id']) : '';
$file = __DIR__ . DIRECTORY_SEPARATOR . 'job-details-cache' . DIRECTORY_SEPARATOR . 'job-' . $id . '.html';

if ($id !== '' && is_file($file)) {
    header('Content-Type: text/html; charset=utf-8');
    readfile($file);
    exit;
}

http_response_code(404);
header('Content-Type: text/html; charset=utf-8');
echo '<!DOCTYPE html><html><head><title>Job Not Found</title></head><body><h1>Job not found</h1><p><a href="job-list.php">Back to jobs</a></p></body></html>';
