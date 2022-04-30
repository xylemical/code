<?php

use Xylemical\Code\Definition\Constant;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\Visibility;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return (new Constant('constant', $manager ?? new NameManager(new Language())))
  ->setValue(new Expression('tank'))
  ->setDocumentation(new Documentation('testing'))
  ->setVisibility(Visibility::PROTECTED);
