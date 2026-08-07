<?php
/**
 * Contact form endpoint stub.
 * The live site posts to sendmessage.php (server-side mail handler).
 * Replace this with your mailer credentials / SMTP config to enable submissions.
 */
header('Content-Type: text/html; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed';
    exit;
}
// Preserve UX: acknowledge receipt without sending mail until configured
http_response_code(200);
echo '<!DOCTYPE html><html><head><meta http-equiv="refresh" content="3;url=contact.html"><title>Message Received</title></head><body style="font-family:sans-serif;padding:2rem;"><h1>Thank you</h1><p>Your message was received locally. Configure SMTP in sendmessage.php to deliver email like production.</p><p><a href="contact.html">Return to Contact</a></p></body></html>';
