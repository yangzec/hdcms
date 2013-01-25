<?php
if(!defined("PATH_HD"))exit('No direct script access allowed');
/**
 * Copyright              [HD框架] (C)2011-2012 houdunwang ，Inc.
 * Encoding               UTF-8
 * @author                向军
 * Link                   http://www.houdunwang.com
 * E-mail                 houdunwangxj@gmail.com
 */
/**
 * 本文件为语言包测试文件，在视图页面中通过{$hd.language.title}即可调用
 * 可以创建任意多个语言文件
 * 具体使用哪一个语言包可以能过C("language","zh")这种方式设计或者直接修改配置文件
 * 如果存在应用组，且应用组目录common/language中存在与应用language目录同名的语言包
 * 则应用的语言包优先级高于应用组common中的语言包
 */
return array(
    "title"=>"后盾多语言测试",
);
?>