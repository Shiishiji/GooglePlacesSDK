<?php

namespace Shiishiji\GooglePlacesSDK\Transformer;

use Shiishiji\GooglePlacesSDK\Exception\TransformationNotPossibleException;

class TransformerContext implements InputTransformerInterface
{
    /**
     * @param iterable<InputTransformerInterface> $inputTransformers
     */
    public function __construct(
        private readonly iterable $inputTransformers,
    ) {
    }

    /**
     * @throws TransformationNotPossibleException
     */
    public function transform(object $input): array
    {
        foreach ($this->inputTransformers as $inputTransformer) {
            if ($inputTransformer->supports($input)) {
                return $inputTransformer->transform($input);
            }
        }

        throw new TransformationNotPossibleException(sprintf('None of registered transformers can transform object of class %s.', $input::class));
    }

    public function supports(object $input): bool
    {
        return true;
    }
}
