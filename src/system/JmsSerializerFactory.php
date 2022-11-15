<?php

namespace Dst\system;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\SerializerBuilder;

final class JmsSerializerFactory
{
    /**
     * @var ArrayTransformerInterface|null
     */
    private $serializer;

    /**
     * @return ArrayTransformerInterface
     */
    public function create(): ArrayTransformerInterface
    {
        if ($this->serializer === null) {
            $this->init();
        }

        return $this->serializer;
    }

    /**
     * @return void
     */
    private function init(): void
    {
        $builder = SerializerBuilder::create();
        $this->serializer = $builder->build();
    }
}