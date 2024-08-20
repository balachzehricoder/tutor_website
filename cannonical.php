<?php
function getProtocol() {
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
}

function getCurrentDomain() {
    return $_SERVER['HTTP_HOST'];
}

function getPathWithoutQueryString() {
    $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2); // Split the URI and query string
    return $requestUri[0]; // Return the part before the query string
}

function getCanonicalURL() {
    return getProtocol() . getCurrentDomain() . getPathWithoutQueryString();
}

function echoCanonicalLink() {
    echo '<link rel="canonical" href="' . getCanonicalURL() . '" />' . "\n";
}
?>