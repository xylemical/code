<?php

use Xylemical\Code\Definition\Constant;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;
use Xylemical\Code\Visibility;

return (new Constant('constant', $manager ?? new NameManager(new Language())))
  ->setValue(new Expression('tank'))
  ->setDocumentation(new Documentation('testing'))
  ->setVisibility(Visibility::PROTECTED);
