//班级学生级联操作
$(function () {
    $("[name='rid']").change(function () {
        var rid = $(this).val();
        var userObj = $("#userSelect");//用户列表
        if (userObj.length > 0) {
            userObj.remove();
        }
        if (rid == "")return;
        var roleObj = $(this);

        $.post(CONTROL + "&m=getStudyList", {rid: rid}, function (data) {
            if (data == null) {
                roleObj.after("&nbsp;&nbsp;<b id='userSelect'>没有学生</b>");
            } else {
                var html = "<select name='username' id='userSelect'>";
                for (var i in data) {
                    html += "<option value='" + data[i].username + "'>" + data[i].username + "</option>";
                }
                html += "</select>";
                roleObj.after("&nbsp;" + html);
            }
        }, "json")
    })
})
//验证学生字段
$(function () {
    $("form").submit(function () {
        if ($("[name='username']").length == 0) {
//            alert("请选择学生");
//            return false;
        }
    })
})