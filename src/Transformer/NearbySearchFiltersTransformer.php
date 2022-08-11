<?php

namespace Shiishiji\GooglePlacesSDK\Transformer;

use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;

class NearbySearchFiltersTransformer implements InputTransformerInterface
{
    public function transform(object $input): array
    {
        $transformed = [];
        foreach ($this->getTransformationRules() as $transformationRule) {
            $getterMethodName = $transformationRule->createGetterMethodName();
            $fieldValue = $input->$getterMethodName();
            if (null === $fieldValue) {
                continue;
            }

            $transformed[$transformationRule->queryFieldName] = $fieldValue;
        }

        return $transformed;
    }

    public function supports(object $input): bool
    {
        return NearbySearchFilters::class === $input::class;
    }

    private function getTransformationRules(): array
    {
        return [
            new TransformationRule(objectFieldName: 'keyword', queryFieldName: 'keyword'),
            new TransformationRule(objectFieldName: 'location', queryFieldName: 'location'),
            new TransformationRule(objectFieldName: 'maxPrice', queryFieldName: 'maxprice'),
            new TransformationRule(objectFieldName: 'minPrice', queryFieldName: 'minprice'),
            new TransformationRule(objectFieldName: 'name', queryFieldName: 'name'),
            new TransformationRule(objectFieldName: 'openNow', queryFieldName: 'opennow'),
            new TransformationRule(objectFieldName: 'rankBy', queryFieldName: 'rankby'),
            new TransformationRule(objectFieldName: 'radius', queryFieldName: 'radius'),
            new TransformationRule(objectFieldName: 'type', queryFieldName: 'type'),
            new TransformationRule(objectFieldName: 'language', queryFieldName: 'language'),
        ];
    }
}
