<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><div class="site_pic">
    <ul>
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

            <li class="upload_thumb" style="width:88px;" input_type="<?php echo $_SESSION['input_type'];?>" elem_id="<?php echo $_SESSION['elem_id'];?>">
                <img src="http://localhost/hdcms/<?php echo $f['path'];?>" path="<?php echo $f['path'];?>" width="88" height="78"/>
            </li>
        <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </ul>
</div>
        <div class="page1">
            <?php echo $page;?>
        </div>
