<?php
namespace App\Controller;

class Foo
{
    protected string $foo;

    protected int $bar;

    public function getFoo(): string
    {
        return $this->foo;
    }

    public function setFoo(string $foo): void
    {
        $this->foo = $foo;
    }

    public function getBar(): int
    {
        return $this->bar;
    }

    public function setBar(int $bar): void
    {
        $this->bar = $bar;
    }

    public function pvo(): void {
        echo $this->foo; // vuln CrossSiteScripting
    }
}