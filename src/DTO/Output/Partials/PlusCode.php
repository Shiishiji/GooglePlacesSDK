<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

class PlusCode
{
    public readonly string $globalCode;
    public readonly ?string $compoundCode;

    public function __construct(
        string $globalCode,
        ?string $compoundCode,
    ) {
        $this->globalCode = $globalCode;
        $this->compoundCode = $compoundCode;
    }
}
