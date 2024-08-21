<?php

namespace App\Domain\Parse\DTO;

class ParseData
{
    /** @var string */
    private string $parse_type_name;

    /** @var string|null */
    private ?string $keyword;

    /**
     * @param string $parse_type_name
     * @param string|null $keyword
     */
    public function __construct(string $parse_type_name, ?string $keyword)
    {
        $this->parse_type_name = $parse_type_name;
        $this->keyword = $keyword;
    }

    public function getParseTypeName(): string
    {
        return $this->parse_type_name;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }
}
