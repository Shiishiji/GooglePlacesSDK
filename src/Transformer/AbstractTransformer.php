<?php

namespace Shiishiji\GooglePlacesSDK\Transformer;

abstract class AbstractTransformer implements InputTransformerInterface
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

    abstract protected function getTransformationRules(): array;
}
