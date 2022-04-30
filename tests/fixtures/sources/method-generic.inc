<?php

use Xylemical\Code\Definition\Method;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return new Method('method', $manager ?? new NameManager(new Language()));
