<?php

namespace App\Http\Contracts;

interface Parser
{
    /**
     * @return array
     */
    public function saveNews(string $url);
}
