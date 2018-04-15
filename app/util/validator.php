<?php

class Validator {
    private $_data;

    private $_errors;

    public function __construct($data) {
        $this->_errors = [];
        $this->_data = $data;
    }

    public function email($key, $message = '') {

        if ($this->hasError($key)) {
            return;
        }

        if (!filter_var($this->_data[$key], FILTER_VALIDATE_EMAIL)) {
            $this->setError($key, $message);
        }

    }

    public function getErrors() {
        return $this->_errors;
    }

    public function hasError($key) {
        return isset($this->_errors[$key]);
    }

    public function required($key, $message = '') {

        if ($this->hasError($key)) {
            return;
        }

        if (!isset($this->_data[$key]) || !$this->_data[$key]) {
            $this->setError($key, $message);
        }

    }

    public function setError($key, $message) {
        $this->_errors[$key] = $message;
    }

}
