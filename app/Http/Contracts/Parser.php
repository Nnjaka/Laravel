<?php

namespace App\Http\Contracts;

interface Parser
{
    /**
     * @param string $url
     * @return Parser
     */
    public function setUrl(string $url): self;

    /**
     * @return array
     */
    public function getNews(): array;
}
