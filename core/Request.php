<?php
class Request
{
    private $__rules = [], $__messages = [];
    public $errors = [];
    public function getMethod()
    {

        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isPost()
    {
        if ($this->getMethod() == 'post') {
            return true;
        }

        return false;
    }

    public function isGet()
    {
        if ($this->getMethod() == 'get') {
            return true;
        }

        return false;
    }
    public function getField()
    {
        $dataFields = [];
        if ($this->isGet()) {
            //xử lý lấy dữ liệu với get
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    $checkArr = is_array($value);
                    $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, $checkArr && FILTER_REQUIRE_ARRAY);
                }
            }
        }
        if ($this->isPost()) {
            //xử lý lấy dữ liệu với get

            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    $checkArr = is_array($value);
                    $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, $checkArr && FILTER_REQUIRE_ARRAY);
                }
            }
        }

        return $dataFields;
    }

    //set rules
    public function rules($rules = [])
    {
        $this->__rules = $rules;
    }
    //set message
    public function messages($messages = [])
    {
        $this->__messages = $messages;
    }

    //run validate
    public function validate()
    {
        $this->__rules = array_filter($this->__rules);
        $checkValidation = true;
        if (!empty($this->__rules)) {
            $dataFields = $this->getField();
            foreach ($this->__rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);

                foreach ($ruleItemArr as $rules) {
                    $ruleName = null;
                    $ruleValue = null;

                    $rulesArr = explode(':', $rules);
                    $ruleName = reset($rulesArr);
                    if (count($rulesArr) > 1) {
                        $ruleValue = end($rulesArr);
                    } else {
                    }
                    if ($ruleName == 'required') {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setError($fieldName, $ruleName);
                            $checkValidation = false;
                        }
                    }
                    if ($ruleName == 'min') {
                        if (strlen(trim($dataFields[$fieldName])) < $ruleValue) {
                            $this->setError($fieldName, $ruleName);
                            $checkValidation = false;

                        }
                    }
                }
                //   echo '<pre>';
                //   print_r($ruleItemArr);
                //   echo '</pre>';
            }
        }
        return $checkValidation;
    }

    //get errors
    public function error($fieldName='')
    {
        if(!empty($this->errors)) {
            if(empty($fieldName)){
               $errorsArr = [] ;
                foreach($this ->errors as $key=>$error){
                    $errorsArr[$key] = reset($error);
               }
               return $errorsArr ;
            }
            return reset($this->errors[$fieldName]);
        }

        return false;
    }

    //set error 
    public function setError($fieldName, $ruleName)
    {
        $this->errors[$fieldName][$ruleName] = $this->__messages[$fieldName . '.' . $ruleName];
    }
}
