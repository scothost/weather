<?php

/*
Fill out a form:
    - POST to PHP
    - Sanitize
    - Validate
    - Return Data
    - Write to DB
*/

require 'Form/Val.php';

class Form
{
    // The immediately posted item
    private $_currentItem = null;

    // Stores the posted data
    private $_postData = array();
    
    // Stores a validator object
    private $_val;

    // Holds the current forms errors
    private $_error;

    public function __construct()
    {
        $this->_val = new Val();
    }
    
    /**
     * post - This is to run $_POST
     */
    public function post($field)
    {
        //sets the internal array of postData to whatever the POST is
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }

    /**
     * fetch - Return the posted data
     * @param $fieldname mixed
     * @return mixed string or array
     */
    public function fetch($fieldName = false) 
    {
        if ($fieldName)
        {
            if (isset($this->_postData[$fieldName]))
                return $this->_postData[$fieldName];
            else 
                return false;
        } else {
            return $this->_postData;    
        }
        
    }
    
    /**
     * val - This is to validate the form
     * 
     */
    public function val($typeOfValidator, $arg = null)
    {
        // This is passing in the value of the field that we are posting to the type of validator
        if ($arg == null) {
            $error = $this->_val->{$typeOfValidator}( $this->_postData[ $this->_currentItem ] );
        } else {
            $error = $this->_val->{$typeOfValidator}( $this->_postData[ $this->_currentItem ] , $arg);
        }

        // error is null if there is no error
        if ($error) {
            $this->_error[ $this->_currentItem ] = $error;
        }

        return $this;
    }

    public function submit()
    {
        if (empty($this->_error)) {
            return true;
        } else {
            $str = '';
            foreach ($this->_error as $key => $value){
                $str .= $key . ' => ' . $value . "\n";
            }
            throw new Exception($str);
        }

    }
}