<?php declare(strict_types=1);

class Request {
    public function __construct(
        private array $get,
        private array $post,
    ) {}

    public static function fromGlobals(array $get, array $post): self {
        return new self($get, $post);
    }

    public function get(string $name, ?string $default = null): ?string {
        return $this->get[$name]?? $default;
    }

    public function post(string $name, ?string $default = null): ?string {
        return $this->post[$name]?? $default;
    }
}