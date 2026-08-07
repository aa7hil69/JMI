<?php
/**
 * Serves cached job application forms: job-submit.php?job_id=N
 */
$id = isset($_GET['job_id']) ? preg_replace('/[^0-9]/', '', (string)$_GET['job_id']) : '';
$file = __DIR__ . DIRECTORY_SEPARATOR . 'job-submit-cache' . DIRECTORY_SEPARATOR . 'job-' . $id . '.html';

if ($id !== '' && is_file($file)) {
    header('Content-Type: text/html; charset=utf-8');
    readfile($file);
    exit;
}

// Fallback to generic resume submit page if present
$fallback = __DIR__ . DIRECTORY_SEPARATOR . 'job-submit-rd.php';
if (is_file($fallback)) {
    header('Content-Type: text/html; charset=utf-8');
    readfile($fallback);
    exit;
}

http_response_code(404);
echo '<!DOCTYPE html><html><head><title>Not Found</title></head><body><h1>Application form not found</h1><p><a href="job-list.php">Back to jobs</a></p></body></html>';
