$(function(){
	// 顶部二级菜单
	$('#top_dark_box #top_dark #menu>li').hover(function(){
		$(this).find('.top_menu').addClass('cur');
		$(this).find('.second').show();
	},function(){
		$(this).find('.top_menu').removeClass('cur');
		$(this).find('.second').hide();
	})

	// 搜索框焦点效果
	$('#top_dark_box #top_dark .search_box .keyword').focus(function(){
		default_keyword = $(this).val();
		$(this).val('');
	})
	$('#top_dark_box #top_dark .search_box .keyword').blur(function(){
		$(this).val(default_keyword);
	})

	// 用户登录
	$('#top_dark_box #top_dark .top_login').click(function(){
		$('#top_dark_box #top_dark .login_hide_box').toggle();
	})

	// 中间区域活跃读者效果
	$('#main .center .head_portrait li').hover(function(){
		$(this).find('.hide_box').show();
		$('#main .center .head_portrait li').stop();
		$(this).css('z-index','5').fadeTo(0,1).siblings('li').css('z-index','0').fadeTo(400,0.5);
	},function(){
		$(this).find('.hide_box').hide();
		$(this).siblings('li').fadeTo(0,1);
	})

	// 内容页留言列表隔行变色
	$('#page_main .left .msg_list li:odd').css('background','#FDFDFD');
	$('#page_main .left .msg_list li>.reply_box .reply_box:even').css('background','#fff');

})
