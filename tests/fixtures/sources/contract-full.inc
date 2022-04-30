<?php

use Xylemical\Code\Definition\Contract;
use Xylemical\Code\Documentation;
use Xylemical\Code\Visibility;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return (new Contract('Test\\Code', $manager ?? new NameManager(new Language())))
  ->setDocumentation(new Documentation('test'))
  ->addElements([
    include 'constant-full.inc',
    include 'method-full.inc',
  ]);
