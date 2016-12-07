<?php

namespace Dawehner\Bluehornet\MethodResponses;

class CouldNotAuthenticateError extends ResponseBase {

  /**
   * The response code.
   *
   * @var int
   */
  protected $responseCode;

  /**
   * The response text.
   *
   * @var string
   */
  protected $responseText;

  /**
   * Creates a new CouldNotAuthenticateError instance.
   *
   * @param int $responseCode
   *   The response code.
   * @param string $responseText
   *   The response text.
   */
  public function __construct($responseCode, $responseText) {
    $this->responseCode = $responseCode;
    $this->responseText = $responseText;
  }

  /**
   * Returns the response code.
   *
   * - 445: Count not authenticate
   *
   * @return int
   */
  public function getResponseCode() {
    return $this->responseCode;
  }

  /**
   * Returns the response text.
   *
   * @return string
   */
  public function getResponseText() {
    return $this->responseText;
  }

}
