<?php

namespace Core\Bootstrap;

interface Bootable {
    public function boot(): bool;
}