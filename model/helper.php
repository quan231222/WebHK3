<?php
    function get_url($url = '')
    {
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
        $app_path = explode('/', $uri);
        return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $app_path[1] . '/' . $url;
    }

    function redirect($url)
    {
        header("Location:{$url}");
        exit();
    }

    function input_value($inputname, $filter = FILTER_DEFAULT,$option=FILTER_SANITIZE_STRING)
    {
        $value = filter_input(INPUT_POST, $inputname, $filter, $option);
        if ($value === null) {
            $value = filter_input(INPUT_GET, $inputname, $filter, $option);
        }
        return $value;
    }

    function is_submit($hidden)
    {
        return (!empty(input_value('action')) && input_value('action') == $hidden);
    }
?>
