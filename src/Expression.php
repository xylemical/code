<?php

namespace Xylemical\Code;

/**
 * Provides a generic expression that simplifies to content.
 */
class Expression implements ExpressionInterface {

  /**
   * The expression contents.
   *
   * @var string
   */
  protected string $contents;

  /**
   * Expression constructor.
   *
   * @param string $contents
   *   The expression contents.
   */
  public function __construct(string $contents = '') {
    $this->contents = $contents;
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
    return $this->contents === '';
  }

  /**
   * {@inheritdoc}
   */
  public function getContents(): string {
    return $this->contents;
  }

}
