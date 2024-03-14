<?php
class Request
{

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
                    $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS,$checkArr && FILTER_REQUIRE_ARRAY);
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
}
