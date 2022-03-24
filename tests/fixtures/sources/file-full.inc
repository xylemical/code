<?php

use Xylemical\Code\Definition\File;

return (new File('test'))
  ->addImports([
    include 'import-generic.inc',
  ])
  ->addStructures([
    include 'mixin-full.inc',
  ]);
