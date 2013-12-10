<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>生成内容页静态</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=batch_content&_0.5982863173146501';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Html';
		CONTROL = 'http://localhost/hdcms/index.php?a=Html&c=Html';
		METH = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=batch_content';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Html/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Html/Tpl/Html';
		STATIC = 'http://localhost/hdcms/hdcms/App/Html/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Html/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Html/Tpl/Html/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Html/Tpl/Html/css/css.css"/>
</head>
<body>
<form method="post" action="http://localhost/hdcms/index.php?a=Html&c=Html&m=batch_content">
    <div class="wrap">
        <div class="table_title">温馨提示</div>
        <div class="help">
            1 只有栏目选择生成静态页面时，右侧“栏目范围”才会出现对应栏目。<br/>
            2 如果生成失败，请将每轮更新条数设置小些
        </div>
        <div class="table_title">规则设置</div>
        <table class="table2">
            <tr>
                <td class="w200">按照模型更新</td>
                <td class="w300">选择栏目范围</td>
                <td>选择操作内容</td>
            </tr>
            <tr>
                <td class="w200" rowspan="5">
                    <select name="mid" id="mid" style="height: 200px;width: 99%" size="2">
                        <option value="0" selected="selected">不限模型</option>
                        <?php $hd["list"]["m"]["total"]=0;if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($model,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

                            <option value="<?php echo $m['mid'];?>"><?php echo $m['model_name'];?></option>
                        <?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
                <td class="w300" rowspan="5">
                    <select name="cid[]" id="cid" style="height: 200px;width: 99%" title="按住“Ctrl”或“Shift”键可以多选，按住“Ctrl”可取消选择"  multiple="multiple">
                        <option value="0" selected="selected">不限栏目</option>
                        <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <option value="<?php echo $c['cid'];?>"
                            <?php echo $c['opt'];?>><?php echo $c['catname'];?></option>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
                <td>
                    <font color="red">
                        每轮更新
                        <input class="input" type="text" size="4" value="10" id="row" name="step_row">
                        条信息
                    </font></td>
                </td>
            </tr>
            <tr>
                <td> 更新所有信息 <input type="button" value="开始更新" class="btn3" onclick="form_submit('all')"/></td>
            </tr>
            <tr style="display: none;">
                <td>
                    更新最新发布的 <input class="input" type="text" size="4" value="100" name="total_row"> 条信息
                    <input type="button" value="开始更新" class="btn3" onclick="form_submit('new')"/>
                </td>
            </tr>
            <tr style="display: none;">
                <td>更新发布时间从
                    <input class="w80" type="text" id="start_time"  name="start_time"> 到
                    <input class="w80" type="text" id="end_time" name="end_time"> 的信息
                    <input type="button" value="开始更新" class="btn3" onclick="form_submit('time')"/>
                    <script>
                        $('#start_time').calendar({format: 'yyyy/MM/dd'});
                        $('#end_time').calendar({format: 'yyyy/MM/dd'});
                    </script>
                </td>
            </tr>
            <tr style="display: none;">
                <td>更新ID从 <input class="input" type="text" size="4" name="start_id"> 到
                    <input class="input" type="text" size="4" name="end_id"> 的信息
                    <input type="button" value="开始更新" class="btn3" onclick="form_submit('id')"/></td>
            </tr>
        </table>
    </div>
</form>