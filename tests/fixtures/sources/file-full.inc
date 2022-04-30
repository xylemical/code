<?php

use Xylemical\Code\Definition\File;

$file = (new File('test'));
$manager = $file->getNameManager();
return $file->addStructures([
    include 'mixin-full.inc',
    include 'structure-full.inc',
    include 'contract-full.inc',
  ]);
