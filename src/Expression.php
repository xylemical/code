<?php

namespace Xylemical\Code;

/**
 * Provides a generic expression that simplifies to content.
 */
class Expression implements ExpressionInterface {

  /**
   * The expression code representation.
   *
   * @var \Xylemical\Code\Code
   */
  protected Code $code;

  /**
   * Expression constructor.
   *
   * @param string $contents
   *   The expression contents.
   * @param string $language
   *   The expression language.
   */
  public function __construct(string $contents = '', string $language = 'php') {
    $this->code = new Code($language, $contents);
  }

  /**
   * Create an Expression.
   *
   * @param string $contents
   *   The expression contents.
   *
   * @return \Xylemical\Code\Expression
   *   The expression.
   */
  public static function create(string $contents = ''): Expression {
    return new Expression($contents);
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty(): bool {
    return $this->code->getContents() === '';
  }

  /**
   * {@inheritdoc}
   */
  public function getCode(): Code {
    return $this->code;
  }

}
