<?php

use Xylemical\Code\Definition\Constant;
use Xylemical\Code\Expression;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return (new Constant('constant', $manager ?? new NameManager(new Language())))
  ->setValue(new Expression('tank'));
