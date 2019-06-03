<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
  'server_url' => getenv("SERVER_URL") ? getenv("SERVER_URL") : 'http://' . getenv('HTTP_HOST'),
];
