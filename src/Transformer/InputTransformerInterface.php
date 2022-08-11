<?php

namespace Shiishiji\GooglePlacesSDK\Transformer;

interface InputTransformerInterface
{
    public function transform(object $input): array;

    public function supports(object $input): bool;
}
