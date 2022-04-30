<?php

use Xylemical\Code\Definition\Structure;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return new Structure('Test\Code', $manager ?? new NameManager(new Language()));
