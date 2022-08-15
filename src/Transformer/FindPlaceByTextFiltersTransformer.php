<?php

namespace Shiishiji\GooglePlacesSDK\Transformer;

use Shiishiji\GooglePlacesSDK\DTO\Input\FindPlaceByTextFilters;

class FindPlaceByTextFiltersTransformer extends AbstractTransformer
{
    public function supports(object $input): bool
    {
        return FindPlaceByTextFilters::class === $input::class;
    }

    protected function getTransformationRules(): array
    {
        return [
            new TransformationRule(objectFieldName: 'input', queryFieldName: 'input'),
            new TransformationRule(objectFieldName: 'inputType', queryFieldName: 'inputtype'),
            new TransformationRule(objectFieldName: 'locationBias', queryFieldName: 'locationbias'),
            new TransformationRule(objectFieldName: 'language', queryFieldName: 'language'),
            new TransformationRule(objectFieldName: 'fields', queryFieldName: 'fields'),
        ];
    }
}
