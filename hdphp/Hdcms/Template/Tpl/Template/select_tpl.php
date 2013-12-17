<css file="__CONTROL_TPL__/css/select_tpl.css"/>
<script>
    $(function () {
        //切换目录
        $(".dir").click(function () {
            var path = $(this).attr("path");
            var input_id = $(this).attr("input_id");
            var url = "__METH__&path=" + path + "&input_id=" + input_id + "&_=" + Math.random();
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
        $(".modal-body").load('{$history}');
    }
</script>
<div id="select_tpl">
    <if value="$history">
        <a href="javascript:history()" class="back">返回</a>
    </if>
    <table class="table2">
        <thead>
        <tr>
            <td>名称</td>
            <td class="w150">大小</td>
            <td class="w80">修改时间</td>
        </tr>
        </thead>
        <list from="$file" name="f">
            <tr>
                <td>
                    <div>
                        <span class="{$f.type} type sel_tp" input_id="{$input_id}" path="{$f.path}">{$f.name}</span>
                        <a href="javascript:;" input_id="{$input_id}" class="{$f.type}" path="{$f.path}">{$f.name}</a>
                    </div>
                </td>
                <td>{$f.size|get_size}</td>
                <td>{$f.filemtime|date:"Y-m-d",@@}</td>
            </tr>
        </list>
    </table>
</div>