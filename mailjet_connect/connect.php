<?php
require 'vendor/autoload.php';

use \Mailjet\Resources;

function sendEmail($apiKey, $apiSecret, $fromEmail, $fromName, $toEmail, $toName, $subject, $textContent, $htmlContent)
{
    $mj = new \Mailjet\Client($apiKey, $apiSecret, true, ['version' => 'v3.1']);

    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $fromEmail,
                    'Name' => $fromName
                ],
                'To' => [
                    [
                        'Email' => $toEmail,
                        'Name' => $toName
                    ]
                ],
                'Subject' => $subject,
                'TextPart' => $textContent,
                'HTMLPart' => $htmlContent
            ]
        ]
    ];

    $response = $mj->post(Resources::$Email, ['body' => $body]);

    if ($response->success()) {
        return "Email sent successfully!";
    } else {
        return "Error: " . $response->getStatus() . " - " . $response->getReasonPhrase();
    }
}

$apiKey = '***********';
$apiSecret = '***********';
$fromEmail = 'iks@iks.com';
$fromName = 'NOM';
$toEmail = 'destinataire@iks.com';
$toName = 'Nom du Destinataire';
$subject = 'Sujet de l\'email';
$textContent = 'Contenu';
$htmlContent = '<h1>Contenu en HTML</h1>';

echo sendEmail($apiKey, $apiSecret, $fromEmail, $fromName, $toEmail, $toName, $subject, $textContent, $htmlContent);
