<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>welcome</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
</head>
<body>
<div class="right_content">
    <form action="<?php echo U(update_form);?>" method="post">
        <div class="nav">
            <div class="tab">
                <ul class="tab_menu">
                    <li lab="site"><a href="#site">站点配置</a></li>
                    <li lab="base"><a href="#base">基本设置</a></li>
                    <li lab="upload"><a href="#upload">上传配置</a></li>
                </ul>
                <div class="tab_content">
                    <div id="site" class="con">
                        <table class="table table-hover">
                            <tr class="header">
                                <th width="200">配置说明</th>
                                <td width="300">配置值</td>
                                <td class="info">模板调用</td>
                            </tr>
                            <?php if(isset($site) && !empty($site)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($site));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($site,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                <tr>
                                    <th width="200"><?php echo $c['info'];?></th>
                                    <td width="300">
                                        <?php echo form_view($c);?>
                                    </td>
                                    <td class="info">
                                        <?php echo "{\$hd.".$c['name']."}";?>
                                    </td>
                                </tr>
                            <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </table>
                    </div>
                    <div id="base" class="con">
                        <table class="table">
                            <tr class="header">
                                <th width="200">配置说明</th>
                                <td width="300">配置值</td>
                                <td class="info">模板调用</td>
                            </tr>
                            <?php if(isset($base) && !empty($base)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($base));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($base,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                <tr>
                                    <th width="200"><?php echo $c['info'];?></th>
                                    <td width="300">
                                        <input type="text" name="<?php echo $c['name'];?>" value="<?php echo $c['value'];?>" class="w250"/>
                                    </td>
                                    <td class="info">
                                        <?php echo "{\$hd.".$c['name']."}";?>
                                    </td>
                                </tr>
                            <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </table>
                    </div>
                    <div id="upload" class="con">
                        <table class="table">
                            <tr class="header">
                                <th width="200">配置说明</th>
                                <td width="300">配置值</td>
                                <td class="info">模板调用</td>
                            </tr>
                            <?php if(isset($upload) && !empty($upload)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($upload));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($upload,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                <tr>
                                    <th width="200"><?php echo $c['info'];?></th>
                                    <td width="300">
                                        <?php echo form_view($c);?>
                                    </td>
                                    <td class="info">
                                        <?php echo "{\$hd.".$c['name']."}";?>
                                    </td>
                                </tr>
                            <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!---------提交修改----------->
        <div class="send">
            <input type="submit" value="修改配置" class="btn"/>
        </div>
    </form>
    <!---------提交修改----------->
</div>
</body>
</html>