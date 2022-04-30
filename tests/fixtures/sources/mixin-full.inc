<?php

use Xylemical\Code\Definition\Mixin;
use Xylemical\Code\Documentation;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return (new Mixin('Test\\Code', $manager ?? new NameManager(new Language())))
  ->setDocumentation(new Documentation('test'))
  ->addElements([
    include 'constant-full.inc',
    include 'method-full.inc',
    include 'property-full.inc',
  ])
  ->addMixins([
    include 'mixin-generic.inc',
  ]);
