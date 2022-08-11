<?php

namespace Shiishiji\GooglePlacesSDK\Transformer;

class TransformationRule
{
    public function __construct(
        public readonly string $objectFieldName,
        public readonly string $queryFieldName,
    ) {
    }

    public function createGetterMethodName(): string
    {
        return sprintf('get%s', ucfirst($this->objectFieldName));
    }
}
