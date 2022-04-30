<?php

use Xylemical\Code\Definition\Property;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

return new Property('property', $manager ?? new NameManager(new Language()));
