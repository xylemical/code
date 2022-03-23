<?php

use Xylemical\Code\Definition\Contract;
use Xylemical\Code\Documentation;
use Xylemical\Code\Visibility;

return (new Contract('Test\\Code'))
  ->setVisibility(Visibility::PROTECTED)
  ->setDocumentation(new Documentation('test'))
  ->addConstants([
    include 'constant-full.inc',
  ])
  ->addMethods([
    include 'method-full.inc',
  ]);
