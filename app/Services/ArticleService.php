<?php


namespace App\Services;


use Illuminate\Support\Facades\Log;

class ArticleService
{
    public function getHtmlMessage($jsonEncode)
    {
        $html = '';
//        log::debug((array)$jsonEncode->messages);
        foreach ($jsonEncode->messages() as $messages)
        {
            foreach ($messages as $message)
            {
                $html.= <<<HTML
            <p class="alert alert-danger">$message</p>
HTML;
            }
        }

        return $html;
    }
}
