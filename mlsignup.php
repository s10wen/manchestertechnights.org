<?php

include 'config.php';

ini_set('display_errors', 'false');

header('Content-Type: application/json');

function verifyCsrf()
{
    return !empty($_COOKIE['csrftoken'])
        && !empty($_POST['csrftoken'])
        && ($_COOKIE['csrftoken'] == $_POST['csrftoken']);
}

function verifyEmail()
{
    return isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) !== false;
}

function addSubscriber($email)
{
    $request = curl_init();
    curl_setopt_array($request, [
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode([
            'apikey' => MAILCHIMP_API_KEY,
            'id' => '7b9695c17f',
            'email' => ['email' => $email],
            'merge_vars' => [
                'optin_ip' => $_SERVER['REMOTE_ADDR']
            ]
        ]),
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 5,
        CURLOPT_URL => 'https://us9.api.mailchimp.com/2.0/lists/subscribe.json',
    ]);

    $result = curl_exec($request);

    if ($result === false || curl_getinfo($request, CURLINFO_HTTP_CODE) !== 200) {
        error_log("CURL error from MailChimp: " . curl_error($request));
        error_log($result);
        curl_close($request);
        return false;
    } else {
        curl_close($request);
        return true;
    }
}

if (verifyCsrf() && verifyEmail()) {
    echo json_encode(['success' => addSubscriber($_POST['email'])]);
} else {
    echo json_encode(['success' => false]);
}
