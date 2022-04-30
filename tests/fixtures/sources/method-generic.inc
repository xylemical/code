<?php

use Xylemical\Code\Definition\Method;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return new Method('method', $manager ?? new NameManager(new Language()));
