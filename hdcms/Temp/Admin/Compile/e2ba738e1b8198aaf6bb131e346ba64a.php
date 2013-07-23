<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>水印设置</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
</head>
<body>
<div class="right_content">
<form action="<?php echo U(update_water);?>" method="post" enctype="multipart/form-data">
    <div class="nav">
        <table class="table">
            <tr>
                <th class="w200">上传图片加水印</th>
                <td>
                    <input type="radio" class="radio" name="water_on" <?php if(C("water_on")==1){?>checked='checked'<?php }?> value="1"/> 开启
                    <input type="radio" class="radio" name="water_on" <?php if(C("water_on")==0){?>checked='checked'<?php }?> value="0"/> 关闭
                </td>
            </tr>
            <tr>
                <th>水印类型</th>
                <td>
                    <input type="radio" class="radio" name="water_type" <?php if(C("water_type")==1){?>checked='checked'<?php }?> value="1"/> 文字
                    <input type="radio" class="radio" name="water_type" <?php if(C("water_type")==2){?>checked='checked'<?php }?> value="2"/> 图片
                </td>
            </tr>
            <tr>
                <th>水印文字</th>
                <td>
                    <input type="text" class="w300" class="radio" name="water_text" value="<?php echo C("water_text");?>"/>
                </td>
            </tr>
            <tr>
                <th>水印文字颜色</th>
                <td>
                    <input type="text" class="w100" class="radio" name="water_text_color" value="<?php echo C("water_text_color");?>"/>
                </td>
            </tr>
            <tr>
                <th>水印文字大小</th>
                <td>
                    <input type="text" class="w100" class="radio" name="water_text_size" value="<?php echo C("water_text_size");?>"/>
                </td>
            </tr>
            <tr>
                <th>水印尺寸</th>
                <td>
                    宽: <input type="text" class="w60" name="water_img_width" value="<?php echo C("water_img_width");?>"/>
                    高: <input type="text" class="w60" name="water_img_height" value="<?php echo C("water_img_height");?>"/>
                </td>
            </tr>
            <tr>
                <th>水印图片</th>
                <td>
                    <img src="http://localhost/hdcms/<?php echo C("water_img");?>"/>
                </td>
            </tr>
            <tr>
                <th>上传水印图片</th>
                <td>
                    <input type="file" name="water_img"/>
                </td>
            </tr>
            <tr>
                <th>水印图片透明度</th>
                <td>
                    <input type="text" class="w100" class="radio" name="water_pct" value="<?php echo C("water_pct");?>"/>
                </td>
            </tr>
            <tr>
                <th>水印位置</th>
                <td>
                    <table class="table" style="width:500px;">
                        <tr>
                            <td>
                                <input type="radio" name="water_pos" class="radio" <?php if(C("water_pos")==0){?>checked='checked'<?php }?> value="0"> 随机位置
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px;">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="1" <?php if(C("water_pos")==1){?>checked='checked'<?php }?> > 顶部居左
                                        </td>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="2" <?php if(C("water_pos")==2){?>checked='checked'<?php }?> > 顶部居中
                                        </td>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="3" <?php if(C("water_pos")==3){?>checked='checked'<?php }?> > 顶部居右
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="4" <?php if(C("water_pos")==4){?>checked='checked'<?php }?> > 左边居中
                                        </td>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="5" <?php if(C("water_pos")==5){?>checked='checked'<?php }?> > 图片中央
                                        </td>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="6" <?php if(C("water_pos")==6){?>checked='checked'<?php }?> > 右边居中
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="7" <?php if(C("water_pos")==7){?>checked='checked'<?php }?> > 底部居左
                                        </td>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="8" <?php if(C("water_pos")==8){?>checked='checked'<?php }?> > 底部居中
                                        </td>
                                        <td>
                                            <input type="radio" class="radio" name="water_pos" value="9" <?php if(C("water_pos")==9){?>checked='checked'<?php }?> > 底部居右
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
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