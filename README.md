# Code Object Model

Simple class, interface and trait object modelling.

## Install

The recommended way to install this library is [through composer](http://getcomposer.org).

```sh
composer require xylemical/code
```

## Usage

Creating a class representation:

```php
<?php

use Xylemical\Code\Expression;
use Xylemical\Code\Definition\Method;
use Xylemical\Code\Definition\Property;
use Xylemical\Code\Definition\Structure;
use Xylemical\Code\Definition\Contract;

$class = Structure::create('Xylemical\\Code\\Representation')
  ->addContract(Contract::create('Xylemical\\Code\\RepresentationInterface'))
  ->addProperty(Property::create('rep'))
  ->addMethod(Method::create('show')->setBody(Expression::create('return $this;')));
```

The model definition is equivalent to:

```php
<?php
namespace Xylemical\Code;

class Representation {

  public $rep;

  public function show() {
    return $this;
  }

}
```

## License

MIT, see LICENSE.