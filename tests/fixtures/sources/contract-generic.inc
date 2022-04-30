<?php

use Xylemical\Code\Definition\Contract;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return new Contract('Test\Code', $manager ?? new NameManager(new Language()));
