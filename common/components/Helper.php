<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/10
 * Time: 14:59
 */

namespace common\components;


class Helper
{
    public static function truncate_utf8_string($string, $length, $etc = '...')
    {
        $result = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $strlen = strlen($string);
        for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
        {
            if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
            {
                if ($length < 1.0)
                {
                    break;
                }
                $result .= substr($string, $i, $number);
                $length -= 1.0;
                $i += $number - 1;
            }
            else
            {
                $result .= substr($string, $i, 1);
                $length -= 0.5;
            }
        }
        $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        if ($i < $strlen)
        {
            $result .= $etc;
        }
        return $result;
    }
    public static function subtree($arr,$id=0,$lev=1) {
        $subs = array(); // 子孙数组
        foreach($arr as $v) {
            if($v['parent_id'] == $id) {
                $v['lev'] = $lev;
                $subs[] = $v; // 举例说找到array('id'=>1,'name'=>'安徽','parent'=>0),
                $subs = array_merge($subs,Helper::subtree($arr,$v['id'],$lev+1));
            }
        }
        return $subs;
    }
    public static function subtree1($arr,$id=0,$lev=1) {
        $subs = array(); // 子孙数组
        foreach($arr as $v) {
            if($v['parent_id'] == $id) {
                $v['lev'] = $lev;
                $subs[] = $v; // 举例说找到array('id'=>1,'name'=>'安徽','parent'=>0),
                $subs = array_merge($subs,Helper::subtree($arr,$v['id'],$lev+1));
            }
        }
        return $subs;
    }
}