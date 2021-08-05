<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailChimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    // public function __construct(protected ApiClient $client, protected string $foo)
    {

    }

    public function subscribe(string $email, string $list = null)
    {
        //null-safe operator. if $list is null, set it equal to right side
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list , [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    //version without apiclient constructor dependency 
    // protected function client()
    // {
    //     return (new ApiClient())->setConfig([
    //         'apiKey' => config('services.mailchimp.key'),
    //         'server' => 'us6'
    //     ]);
    // }

}
