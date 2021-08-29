<?php

namespace Support;

use CyrildeWit\EloquentViewable\Visitor;

class CustomVisitor extends Visitor
{
    protected int $id;
    protected string $ip;
    protected bool $hasDoNotTrackHeader;
    protected bool $isCrawler;

    public function id(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    // /**
    //  * Get the visitor's IP address.
    //  *
    //  * @return string|null
    //  */
    // public function ip(): string
    // {
    //     return $this->ip;
    // }

    public function setIp(string $ip)
    {
        $this->ip = $ip;
    }

    public function hasDoNotTrackHeader(): bool
    {
        return $this->hasDoNotTrackHeader;
    }

    public function setHasDoNotTrackHeader(bool $hasDoNotTrackHeader)
    {
        $this->hasDoNotTrackHeader = $hasDoNotTrackHeader;
    }

    public function isCrawler(): bool
    {
        return $this->isCrawler;
    }

    public function setIsCrawler(bool $isCrawler)
    {
        $this->isCrawler = $isCrawler;
    }
}
