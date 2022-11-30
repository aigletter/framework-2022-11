<?php

namespace Learning\Core\Interfaces;

interface RouteInterface
{
    public function route(): callable;

    public function setNamespace(string $namespace);
}