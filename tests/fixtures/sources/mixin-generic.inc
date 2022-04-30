<?php

use Xylemical\Code\Definition\Mixin;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return new Mixin('Test\Code', $manager ?? new NameManager(new Language()));
