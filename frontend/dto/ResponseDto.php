<?php

namespace frontend\dto;

use JsonSerializable;

class ResponseDto implements JsonSerializable
{
    /**
     * @var string
     */
    private $status = 'ok';

    /**
     * @var mixed[]
     */
    private $data = [];

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return ResponseDto
     */
    public function setStatus(string $status): ResponseDto
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param mixed[] $data
     *
     * @return ResponseDto
     */
    public function setData(array $data): ResponseDto
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'status' => $this->getStatus(),
            'data' => $this->getData(),
        ];
    }
}