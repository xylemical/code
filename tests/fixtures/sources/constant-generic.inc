<?php

use Xylemical\Code\Definition\Constant;
use Xylemical\Code\Expression;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return (new Constant('constant', $manager ?? new NameManager(new Language())))
  ->setValue(new Expression('tank'));
