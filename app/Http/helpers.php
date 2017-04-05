<?php

if(!function_exists('responseJson')) {
    function responseJson($status, $msg, $data = array()){
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ));
    }
}

if(!function_exists('fileUrl')) {
    function fileUrl($url)
    {
        if (!empty($url)) {
            $url = Config::get('app.url') . '/' . $url;
            return $url;
        }
        return Config::get('app.url');
    }
}

if(!function_exists('configUrl')) {
    function configUrl()
    {
        return Config::get('app.url');
    }
}

if(!function_exists('getFiletype')) {
    /**
     *  返回文件后缀名，如‘.php’
     *
     * @access  public
     * @param
     *
     * @return  string      文件后缀名
     */
    function getFiletype($path)
    {
        $pos = strrpos($path, '.');
        if ($pos !== false) {
            return substr($path, $pos);
        } else {
            return '';
        }
    }
}

if(!function_exists('makeDir')) {
    /**
     * 判断文件夹是否存，不存在则创建
     * @param $folder
     * @return bool
     */
    function makeDir($folder)
    {
        $reval = false;
        if (!file_exists($folder)) {
            @umask(0);
            preg_match_all('/([^\/]*)\/?/i', $folder, $atmp);
            $base = ($atmp[0][0] == '/') ? '/' : '';
            foreach ($atmp[1] AS $val) {
                if ('' != $val) {
                    $base .= $val;
                    if ('..' == $val || '.' == $val) {
                        $base .= '/';
                        continue;
                    }
                } else {
                    continue;
                }
                $base .= '/';
                if (!file_exists($base)) {
                    if (@mkdir(rtrim($base, '/'), 0777)) {
                        @chmod($base, 0777);
                        $reval = true;
                    }
                }
            }
        } else {
            $reval = is_dir($folder);
        }
        clearstatcache();
        return $reval;
    }
}

if(!function_exists('delEmpty')) {
    /**
     * 过滤数组空值
     * @param $v
     * @return bool
     */
    function delEmpty($v)
    {
        if ($v == '') {
            return false;
        }
        return true;
    }
}

if(!function_exists('getCurrentControllerName')) {
    /**
     * 获取当前控制器名
     *
     * @return string
     */
    function getCurrentControllerName()
    {
        return getCurrentAction()['controller'];
    }
}

if(!function_exists('getCurrentMethodName')) {
    /**
     * 获取当前方法名
     *
     * @return string
     */
    function getCurrentMethodName()
    {
        return getCurrentAction()['method'];
    }
}

if(!function_exists('getCurrentAction')) {
    /**
     * 获取当前控制器与方法
     *
     * @return array
     */
    function getCurrentAction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);

        return ['controller' => $class, 'method' => $method];
    }
}

if(!function_exists('shortName')) {
    /**
     * 截取字符串
     * @param $str
     * @param int $len
     * @return string
     */
    function shortName($str, $len = 60)
    {
        if(mb_strlen($str, 'utf8') > $len)
            return mb_substr($str, 0, $len, 'utf8').'...';
        return $str;
    }
}

if(!function_exists('selectShow')) {

    /**
     * 输出select选项
     * @param $arr
     * @param $status
     * @return string
     */
    function selectShow($arr, $status = 0)
    {
        $html = '';
        foreach ($arr as $k => $v) {
            if ($status == $k) {
                $html .= '<option value="'.$k.'" selected> '.$v.' </option>';
            } else {
                $html .= '<option value="'.$k.'"> '.$v.' </option>';
            }
        }
        return $html;
    }
}
