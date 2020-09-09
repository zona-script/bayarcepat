<?php


namespace App\Services\SocialMediaMarketing;


class Order extends SocialMediaMarketing
{
    protected function data()
    {
        $headers = [];
        $url = '';
        $data = [
            'api_id' => '',
            'api_key' => '',
            'id' => ''
        ];

        $this->request($headers, $url, $data);
    }
}
