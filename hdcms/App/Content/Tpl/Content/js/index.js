//显示左侧栏目列表
$(function () {
    //点击+图标，添加文章
    $("span.file").live("click", function () {
        window.open($(this).find("a").attr("href"));
    })
    //收缩
    $("div.hitarea,span.folder").live("click", function () {
        var _hidden = $(this).siblings("ul:hidden").length;
        if (_hidden) {
            $(this).parent("li").removeClass("c_close").addClass("open");
        } else {
            $(this).parent("li").removeClass("open").addClass("c_close");
        }
        return false;
    })
    //展开
    $("li.cat_tree_top").live("click", function () {
        var open_obj = $("li.collapsable[class*='open']");
        var close_obj = $("li.collapsable[class*='c_close']");
        open_obj.each(function () {
            $(this).removeClass("open").addClass("c_close");
        })
        close_obj.each(function () {
            $(this).removeClass("c_close").addClass("open");
        })
    })
    function set_category_tree(d) {
        var h = "";
        for (var i in d) {
            var _span_class = d[i].cattype == 2 ? "folder" : "file";
            var _li_class = d[i].children ? " class='collapsable open'" : "";
            var _li_class = d[i]._end && !d[i].children && d[i].level != 1 ? " class='last'" : _li_class;
            h += '<li' + _li_class + '>';
            if (d[i].children) {
                h += '<div class="hitarea collapsable-hitarea"></div>';
            }
            //栏目url
            var cat_url =  _span_class=="file"?APP + "&c=Content&m=content&status=1&cid=" + d[i].cid:"javascript:;";
            var add_con_url = APP + "&c=Content&m=add&cid=" + d[i].cid;
            if (_span_class == 'file') {
                h += '<em class="c_base">';
            }
            h += '<span class="' + _span_class + '"><a href="' + add_con_url + '" target="_blank">' + d[i].text + '</a></span>';
            h += '<a href="' + cat_url + '">' + d[i].text + '</a>';
            if (_span_class == 'file') {
                h += '</em>';
            }
            //含有子栏目
            if (d[i].children) {
                h += "<ul>";
                h += set_category_tree(d[i]['children']);
                h += "</ul>";
            }
            h += "</li>";
        }
        return h;
    }

    $.ajax(
        {
            url: CONTROL + "&m=ajax_category_tree",
            dataType: "JSON",
            cache: false,
            success: function (data) {
                var h = "<li><a href='javascript:window.location.reload(true);' target='_self'>刷新栏目列表</a></li><li class='cat_tree_top'><div class='tree_top'></div>";
                h += "<a href='javascript:;'>展开收缩</a></li>";
                h += set_category_tree(data);
                $("#browser").html(h);
            }
        })
    $("#browser").treeview()
    //li点击时
    $("em.c_base").live("click", function () {
        $("em.c_base").removeClass("active");
        $(this).addClass("active");
    })
})

//content显示区
function alter_content() {
    var _h = $(window).height() - 30;
    var _w = $(window).width() - 185;
    $("div.con").css({top:0,left:185,right:10,height: _h, width: _w});
}
$(function () {
    alter_content();
    $(top).resize(function () {
        alter_content();
    })
})