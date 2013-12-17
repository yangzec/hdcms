<?php
/**
 * 属性flag
 * Class FlagModel
 * @author hdxj
 */
class FlagModel extends CommonModel
{
    public $table = "flag";

    //删除属性
    public function del_flag($fid)
    {
        if ($this->table("content_flag")->where("fid=$fid")->del()) {
            return $this->del($fid);
        }
    }

}
