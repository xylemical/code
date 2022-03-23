<?php

use Xylemical\Code\Definition\Constant;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\Visibility;

return (new Constant('constant', new Expression('tank')))
  ->setDocumentation(new Documentation('testing'))
  ->setVisibility(Visibility::PROTECTED);
