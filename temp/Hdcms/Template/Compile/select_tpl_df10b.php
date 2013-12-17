<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Template/Tpl/Template/css/select_tpl.css"/>
<script>
    $(function () {
        //切换目录
        $(".dir").click(function () {
            var path = $(this).attr("path");
            var input_id = $(this).attr("input_id");
            var url = "http://localhost/hdcms/index.php?a=Template&c=Template&m=select_tpl&path=" + path + "&input_id=" + input_id + "&_=" + Math.random();
            $(".modal-body").load(url);
        })
        //选择文件
        $(".file").click(function () {
            $("#"+input_id).val($(this).attr("path"));
            $('#select_template').modal('hide')
            return false;
        })
    })
    function history() {
        $(".modal-body").load('<?php echo $history;?>');
    }
</script>
<div id="select_tpl">
    <?php if($history){?>
        <a href="javascript:history()" class="back">返回</a>
    <?php }?>
    <table class="table2">
        <thead>
        <tr>
            <td>名称</td>
            <td class="w150">大小</td>
            <td class="w80">修改时间</td>
        </tr>
        </thead>
        <?php $hd["list"]["f"]["total"]=0;if(isset($file) && !empty($file)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($file));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($file,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

            <tr>
                <td>
                    <div>
                        <span class="<?php echo $f['type'];?> type sel_tp" input_id="<?php echo $input_id;?>" path="<?php echo $f['path'];?>"><?php echo $f['name'];?></span>
                        <a href="javascript:;" input_id="<?php echo $input_id;?>" class="<?php echo $f['type'];?>" path="<?php echo $f['path'];?>"><?php echo $f['name'];?></a>
                    </div>
                </td>
                <td><?php echo get_size($f['size']);?></td>
                <td><?php echo date('Y-m-d',$f['filemtime']);?></td>
            </tr>
        <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>