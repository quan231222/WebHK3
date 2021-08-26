<?php
    $dsn = 'mysql:host=localhost;dbname=test';
    $username = "root";
    $password = "";
    $con = null;
    
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

    function input_value($inputname, $filter = FILTER_DEFAULT, $option = FILTER_SANITIZE_STRING)
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

    function db_connect()
    {
        global $dsn,$username,$password, $con;
        try {
            if (is_null($con)) {
                $con = new PDO($dsn, $username, $password);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                //echo "Ket noi thanh cong";               
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include_once '../errors/database_error.php';
        }
    }

    function db_disconnect()
    {
        global $con;
        if (!is_null($con)) {
            $con = null;
        }
    }
    
    function db_execute($sql = '', $params = [])
    {
        global $con;
        if (!is_null($con)) {
            $result = $con->prepare($sql);
            $result->execute($params);
            if ($result->rowCount() > 0) {
                $result->closeCursor();
                return true;
            }
        }
        return false;
    }

    function db_get_list($sql = '')
    {
        global $con;
        if (!is_null($con)) {
            $result = $con->prepare($sql);
            $result->execute();
            if ($result->rowCount() > 0) {
                $rows = $result->fetchAll();
                $result->closeCursor();
                return $rows;
            }
        }
        return false;
    }

    function db_get_list_condition($sql = '', $params = [])
    {
        global $con;
        if (!is_null($con)) {
            $result = $con->prepare($sql);
            $result->execute($params);
            if ($result->rowCount() > 0) {
                $rows = $result->fetchAll();
                $result->closeCursor();
                return $rows;
            }
        }
        return false;
    }

    function db_get_row($sql = '', $params = [])
    {
        global $con;
        if (!is_null($con)) {
            $result = $con->prepare($sql);
            $result->execute($params);
            if ($result->rowCount() > 0) {
                $row = $result->fetch();
                $result->closeCursor();
                return $row;
            }
        }
        return false;
    }

?>
