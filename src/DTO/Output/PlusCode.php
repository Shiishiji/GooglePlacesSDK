<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class PlusCode
{
    public readonly string $compoundCode;
    public readonly string $globalCode;

    public function __construct(string $compoundCode, string $globalCode)
    {
        $this->compoundCode = $compoundCode;
        $this->globalCode = $globalCode;
    }
}
