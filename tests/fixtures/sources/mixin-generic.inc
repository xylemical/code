<?php

use Xylemical\Code\Definition\Mixin;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return new Mixin('Test\Code', $manager ?? new NameManager(new Language()));
