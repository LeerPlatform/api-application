<?php

function subdomain(string $subdomain): string
{
    return vsprintf('%s.%s', [
        $subdomain,
        parse_url(config('app.url'), PHP_URL_HOST)
    ]);
}
