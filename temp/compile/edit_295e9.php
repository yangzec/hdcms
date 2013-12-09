<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>网站配置</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Config&m=edit&_=0.10989398251472016&_0.4247987619939779';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Hdcms';
		CONTROL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Config';
		METH = 'http://localhost/hdcms/index.php?a=Hdcms&c=Config&m=edit';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Config';
		STATIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Config/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Config/css/css.css"/>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post">
    <div class="wrap">
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">站点配置</a></li>
                <li lab="upload"><a href="#">上传设置</a></li>
                <li lab="member"><a href="#">会员设置</a></li>
                <li lab="content"><a href="#">内容相关</a></li>
                <li lab="water"><a href="#">水印设置</a></li>
                <li lab="safe"><a href="#">安全配置</a></li>
                <li lab="grand"><a href="#">高级配置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        <tr>
                            <th class="w150"><?php echo $field[1]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[1]['id'];?>" value="<?php echo $field[1]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[2]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[2]['id'];?>" value="<?php echo $field[2]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[3]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[3]['id'];?>" value="<?php echo $field[3]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[4]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[4]['id'];?>" value="<?php echo $field[4]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[5]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[5]['id'];?>" value="<?php echo $field[5]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[6]['title'];?></th>
                            <td>
                                <textarea class="w400 h80" name="c<?php echo $field[6]['id'];?>"><?php echo $field[6]['value'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[8]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[8]['id'];?>" value="<?php echo $field[8]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[10]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[10]['id'];?>" value="1" <?php if($field[10]['value']==1){?>checked="checked"<?php }?>/> 开</label>
                                <label><input type="radio" name="c<?php echo $field[10]['id'];?>" value="0" <?php if($field[10]['value']==0){?>checked="checked"<?php }?>/> 关</label>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[150]['title'];?></th>
                            <td>
                                <textarea name="c<?php echo $field[150]['id'];?>" class="w400 h80"><?php echo $field[150]['value'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[127]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[127]['id'];?>" value="<?php echo $field[127]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[114]['title'];?></th>
                            <td>
                                <select name="c<?php echo $field[114]['id'];?>">
                                    <?php $hd["list"]["t"]["total"]=0;if(isset($template) && !empty($template)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($template));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($template,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                                    <option value="<?php echo $t;?>" <?php if($t==$field[114]['value']){?>selected='selected'<?php }?>><?php echo $t;?></option>
                                    <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                        <tr>
                            <th class="w150"><?php echo $field[16]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[16]['id'];?>" value="<?php echo $field[16]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[18]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[18]['id'];?>" value="<?php echo $field[18]['value'];?>" class="w250"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[19]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[19]['id'];?>" value="<?php echo $field[19]['value']/1024;?>" class="w250"/>
                                <span class="message"> 单位:KB</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                        <tr>
                            <th class="w150"><?php echo $field[149]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[149]['id'];?>" value="1" <?php if($field[149]['value']==1){?>checked="checked"<?php }?>/> 开启</label>
                                <label><input type="radio" name="c<?php echo $field[149]['id'];?>" value="0" <?php if($field[149]['value']==0){?>checked="checked"<?php }?>/> 关闭</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[115]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[115]['id'];?>" value="1" <?php if($field[115]['value']==1){?>checked="checked"<?php }?>/> 审核</label>
                                <label><input type="radio" name="c<?php echo $field[115]['id'];?>" value="0" <?php if($field[115]['value']==0){?>checked="checked"<?php }?>/> 不审核</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[116]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[116]['id'];?>" value="1" <?php if($field[116]['value']==1){?>checked="checked"<?php }?>/> 显示</label>
                                <label><input type="radio" name="c<?php echo $field[116]['id'];?>" value="0" <?php if($field[116]['value']==0){?>checked="checked"<?php }?>/> 不显示</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[119]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[119]['id'];?>" value="1" <?php if($field[119]['value']==1){?>checked="checked"<?php }?>/> 是</label>
                                <label><input type="radio" name="c<?php echo $field[119]['id'];?>" value="0" <?php if($field[119]['value']==0){?>checked="checked"<?php }?>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[147]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[147]['id'];?>" value="1" <?php if($field[147]['value']==0){?>checked="checked"<?php }?>/> 是</label>
                                <label><input type="radio" name="c<?php echo $field[147]['id'];?>" value="0" <?php if($field[147]['value']==1){?>checked="checked"<?php }?>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[120]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[120]['id'];?>" value="<?php echo $field[120]['value'];?>" class="w150"/>
                                <span class="message">分钟 (0为不限制)</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[121]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[121]['id'];?>" value="<?php echo $field[121]['value'];?>" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[137]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[137]['id'];?>" value="0" <?php if($field[137]['value']==0){?>checked="checked"<?php }?>/> 是</label>
                                <label><input type="radio" name="c<?php echo $field[137]['id'];?>" value="1" <?php if($field[137]['value']==1){?>checked="checked"<?php }?>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">会员头像尺寸</th>
                            <td>
                                <label>宽度: <input type="text" name="c<?php echo $field[138]['id'];?>" value="<?php echo $field[138]['value'];?>" class="w30"/></label>&nbsp;&nbsp;&nbsp;
                                <label>高度: <input type="text" name="c<?php echo $field[139]['id'];?>" value="<?php echo $field[139]['value'];?>" class="w30"/></label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">新注册会员初始组</th>
                            <td>
                                <select name="c<?php echo $field[148]['id'];?>">
                                    <?php $hd["list"]["g"]["total"]=0;if(isset($group) && !empty($group)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($group));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($group,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

                                    <option value="<?php echo $g['gid'];?>" <?php if($field[148]['value']==$g['gid']){?>selected="selected"<?php }?>><?php echo $g['gname'];?></option>
                                    <?php $hd["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                        <tr>
                            <th><?php echo $field[134]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[134]['id'];?>" value="1" <?php if($field[134]['value']==1){?>checked="checked"<?php }?>/> 直接删除</label>
                                <label><input type="radio" name="c<?php echo $field[134]['id'];?>" value="2" <?php if($field[134]['value']==0){?>checked="checked"<?php }?>/> 放入回收站</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[142]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[142]['id'];?>" value="1" <?php if($field[142]['value']==1){?>checked="checked"<?php }?>/> 是</label>
                                <label><input type="radio" name="c<?php echo $field[142]['id'];?>" value="0" <?php if($field[142]['value']==0){?>checked="checked"<?php }?>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[143]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[143]['id'];?>" value="1" <?php if($field[143]['value']==1){?>checked="checked"<?php }?>/> 是</label>
                                <label><input type="radio" name="c<?php echo $field[143]['id'];?>" value="0" <?php if($field[143]['value']==0){?>checked="checked"<?php }?>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[144]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[144]['id'];?>" value="1" <?php if($field[144]['value']==1){?>checked="checked"<?php }?>/> 是</label>
                                <label><input type="radio" name="c<?php echo $field[144]['id'];?>" value="0" <?php if($field[144]['value']==0){?>checked="checked"<?php }?>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">上传图片超过此值进行缩放</th>
                            <td>
                                <label>宽度: <input type="text" name="c<?php echo $field[145]['id'];?>" value="<?php echo $field[145]['value'];?>" class="w30"/> px</label>&nbsp;&nbsp;&nbsp;
                                <label>高度: <input type="text" name="c<?php echo $field[146]['id'];?>" value="<?php echo $field[146]['value'];?>" class="w30"/> px</label>
                            </td>
                        </tr>
                    </table>
                 </div>
                <div id="water">
                    <table class="table1">
                        <tr>
                            <th><?php echo $field[20]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[20]['id'];?>" value="1" <?php if($field[20]['value']==1){?>checked="checked"<?php }?>/> 开</label>
                                <label><input type="radio" name="c<?php echo $field[20]['id'];?>" value="0" <?php if($field[20]['value']==0){?>checked="checked"<?php }?>/> 关</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[129]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[129]['id'];?>" value="<?php echo $field[129]['value'];?>" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[130]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[130]['id'];?>" value="<?php echo $field[130]['value'];?>" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[131]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[131]['id'];?>" value="<?php echo $field[131]['value'];?>" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[132]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[132]['id'];?>" value="<?php echo $field[132]['value'];?>" class="w150"/> %
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[133]['title'];?></th>
                            <td>
                                <table class="w300 table3">
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="1" <?php if($field[133]['value']==1){?>checked="checked"<?php }?>/> 左上</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="2" <?php if($field[133]['value']==2){?>checked="checked"<?php }?>/> 上中</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="3" <?php if($field[133]['value']==3){?>checked="checked"<?php }?>/> 上右</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="4" <?php if($field[133]['value']==4){?>checked="checked"<?php }?>/> 中左</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="5" <?php if($field[133]['value']==5){?>checked="checked"<?php }?>/> 中间</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="6" <?php if($field[133]['value']==6){?>checked="checked"<?php }?>/> 中右</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="7" <?php if($field[133]['value']==7){?>checked="checked"<?php }?>/> 下左</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="8" <?php if($field[133]['value']==8){?>checked="checked"<?php }?>/> 下中</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c<?php echo $field[133]['id'];?>" value="9" <?php if($field[133]['value']==9){?>checked="checked"<?php }?>/> 下右</label>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>


                <div id="safe">
                    <table class="table1">

                        <tr>
                            <th class="w150"><?php echo $field[15]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[15]['id'];?>" value="<?php echo $field[15]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $field[123]['title'];?></th>
                            <td>
                                <label><input type="radio" name="c<?php echo $field[123]['id'];?>" value="1" <?php if($field[123]['value']==1){?>checked="checked"<?php }?>/> 开</label>
                                <label><input type="radio" name="c<?php echo $field[123]['id'];?>" value="0" <?php if($field[123]['value']==0){?>checked="checked"<?php }?>/> 关</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[124]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[124]['id'];?>" value="<?php echo $field[124]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[125]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[125]['id'];?>" value="<?php echo $field[125]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[126]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[126]['id'];?>" value="<?php echo $field[126]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                    </table>
                </div>

                <div id="grand">
                    <table class="table1">
                        <tr>
                            <th class="w150"><?php echo $field[9]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[9]['id'];?>" value="<?php echo $field[9]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[122]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[122]['id'];?>" value="<?php echo $field[122]['value'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150"><?php echo $field[136]['title'];?></th>
                            <td>
                                <input type="text" name="c<?php echo $field[136]['id'];?>" value="<?php echo $field[136]['value'];?>" class="w200"/>
                                <span class="message"> 单位:KB</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">图片超过这个尺寸进行缩放</th>
                            <td>
                                <label>宽度: <input type="text" name="c<?php echo $field[140]['id'];?>" value="<?php echo $field[140]['value'];?>" class="w30"/></label>&nbsp;&nbsp;&nbsp;
                                <label>高度: <input type="text" name="c<?php echo $field[141]['id'];?>" value="<?php echo $field[141]['value'];?>" class="w30"/></label>
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
    </div>
</form>
</body>
</html>