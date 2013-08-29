$(function () {
    //不能选择封面栏目
    $("select[name='cid']").change(function () {
        if ($("select[name='cid'] option:selected").attr('cattype') == 2) {
            alert("栏目不能为频道封面，请更改");
        }
    })
    $("form").submit(function () {
        //对form表单验证  对图片上传form不验证
        if (!$(this).attr("target")) {
            //验证标题不能为空
            if (!$("input[name='title']").val()) {
                alert("标题不能为空");
                return false;
            }
            //验证标题不能长度
            if ($(this).val().length > 60) {
                alert("标题不能超过60个字");
                return false;
            }
            //不能选择封面栏目
            if ($("select[name='cid'] option:selected").attr('cattype') == 2) {
                alert("栏目不能为频道封面，请更改");
                return false;
            }
            //验证内容
            if (window.UE && $("#content").length > 0 && !UE.getEditor('content').getContent()) {
                alert("内容不能为空");
                return false;
            }
            //验证自定义字段
            $("input[onblur]").trigger("blur");
            if ($("input[validation='0']").length > 0) {
                return false;
            }
            return true;
        }
    })
})