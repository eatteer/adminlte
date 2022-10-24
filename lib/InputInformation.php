<?php
class InputInformation
{
  static function generateInformation(array $viewData, string $formName, string $inputName)
  {
    $value = $viewData[$formName]["values"][$inputName];
    $error = $viewData[$formName]["errors"][$inputName];
    $errorClass = $error ? "is-invalid" : null;
    return [$value, $error, $errorClass];
  }
}
