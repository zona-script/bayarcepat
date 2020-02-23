<?php

namespace App\Telegram;

use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBuilder
{
    protected $botToken;
    protected $chatID = '-278723797';
    protected $text = 'text belum di setting.';

    public function __construct()
    {
        return $this;
    }

    public static function make($botToken = '')
    {
        return new TelegramBuilder();
    }

    public function sendTelegram($message)
    {
        $url = "https://api.telegram.org/bot" . $this->botToken . "/sendMessage?chat_id=" . $this->chatID;
        $url = $url . "&text=" . urlencode($message);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    private function telegram(): Api
    {
        if (blank($this->botToken)) {
            try {
                return new Api(config('telegram.bots.common.token'));
            } catch (TelegramSDKException $e) {
            }
        }

        try {
            return new Api($this->botToken);
        } catch (TelegramSDKException $e) {
        }
    }

    public function setChatID($chatID)
    {
        $this->chatID = $chatID;

        return $this;
    }

    public function setBotToken($botToken)
    {
        $this->botToken = $botToken;

        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function sendMessage()
    {
//        return Telegram::sendMessage([
//            'chat_id' => $this->chatID,
//            'parse_mode' => 'HTML',
//            'text' => $this->text
//        ]);

        return $this->telegram()->sendMessage([
            'chat_id' => $this->chatID,
            'text' => $this->text
        ]);
    }
}
