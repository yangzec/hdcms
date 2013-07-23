<?php if (!defined('HDPHP_PATH')) exit;
return array(
    1 =>
    array(
        'mid' => '131',
        'show_type' => 'input',
        'is_main_table' => '0',
        'title' => '标题',
        'field_name' => 'title1',
        'message' => '',
        'set' =>
        array(
            'size' => '30',
            'default' => '',
            'ispasswd' => '0',
        ),
        'field_type' => 'char',
        'field_size' => '50',
        'css' => '',
        'validation' => '/^.{1,50}$/',
        'required' => 'on',
        'error' => '不能超过50个字符',
        'html' => '<tr>
                <th>标题</th>
                <td><input name=\'title1\' value=\'{FIELD_VALUE}\' size=\'30\'
                 css=\'\'/><span class=\'validation\'></span>
                 </td></tr>',
    ),
    2 =>
    array(
        'mid' => '131',
        'show_type' => 'image',
        'is_main_table' => '0',
        'title' => '缩略图',
        'field_name' => 'thumb',
        'message' => '',
        'set' =>
        array(
            'upload_size' => '5',
            'allow_upload_type' => '*.gif;*.jpg;*.png;*.jpeg',
        ),
        'field_type' => 'char',
        'field_size' => '200',
        'css' => '',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr><th>缩略图</th><td>                <script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;
        hd_uploadify_options.fileSizeLimit  ="5MB";
        hd_uploadify_options.fileTypeExts   ="*.gif;*.jpg;*.png;*.jpeg";
        hd_uploadify_options.queueID        ="hd_uploadify_thumb_queue";
        hd_uploadify_options.showalt        =false;
        hd_uploadify_options.uploadLimit    =1;
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData       ={image : "1", someOtherKey:1,SESSION_NAME:"+SESSION_ID+",upload_dir:"",hdphp_upload_thumb:""};
        hd_uploadify_options.thumb_width          =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;
        hd_uploadify_options.showalt = 0;

        $("#hd_uploadify_thumb").uploadify(hd_uploadify_options);
    });
</script>
<input type="file" name="up" id="hd_uploadify_thumb"/>
<div tool="hd_uploadify_thumb_msg uploadify_upload_msg">
</div>
<div id="hd_uploadify_thumb_queue"></div>
<div class="hd_uploadify_thumb_files uploadify_upload_files" input_file_id ="hd_uploadify_thumb">
    <ul></ul>
    <div style="clear:both;"></div>
</div></td></tr>',
    ),
    3 =>
    array(
        'mid' => '131',
        'show_type' => 'input',
        'is_main_table' => '0',
        'title' => '网站关键字',
        'field_name' => 'keywords',
        'message' => '',
        'set' =>
        array(
            'size' => '30',
            'default' => '',
            'ispasswd' => '0',
        ),
        'field_type' => 'char',
        'field_size' => '45',
        'css' => 'keywords',
        'validation' => '/^.{1,40}$/',
        'required' => 'on',
        'error' => '不能超过40个字符',
        'html' => '<tr>
                <th>网站关键字</th>
                <td><input name=\'keywords\' value=\'{FIELD_VALUE}\' size=\'30\'
                 css=\'keywords\'/><span class=\'validation\'></span>
                 </td></tr>',
    ),
    4 =>
    array(
        'mid' => '131',
        'show_type' => 'textarea',
        'is_main_table' => '0',
        'title' => '内容摘要',
        'field_name' => 'description',
        'message' => '',
        'set' =>
        array(
            'width' => '400',
            'height' => '80',
            'default' => '',
        ),
        'field_type' => 'varchar',
        'css' => 'description',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr>
                <th>内容摘要</th>
                <td><textarea name=\'description\' style="width:400px;height:80px;"
                 css=\'description\'/>{FIELD_VALUE}</textarea><span class=\'validation\'></span>
                 </td></tr>',
    ),
    5 =>
    array(
        'mid' => '131',
        'show_type' => 'input',
        'is_main_table' => '0',
        'title' => '来源',
        'field_name' => 'source',
        'message' => '',
        'set' =>
        array(
            'size' => '30',
            'default' => '',
            'ispasswd' => '0',
        ),
        'field_type' => 'char',
        'field_size' => '50',
        'css' => 'source',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr>
                <th>来源</th>
                <td><input name=\'source\' value=\'{FIELD_VALUE}\' size=\'30\'
                 css=\'source\'/><span class=\'validation\'></span>
                 </td></tr>',
    ),
    6 =>
    array(
        'mid' => '131',
        'show_type' => 'input',
        'is_main_table' => '0',
        'title' => '转向链接',
        'field_name' => 'redirecturl',
        'message' => '',
        'set' =>
        array(
            'size' => '30',
            'default' => '',
            'ispasswd' => '0',
        ),
        'field_type' => 'varchar',
        'field_size' => '255',
        'css' => 'redirecturl',
        'validation' => '/^(http[s]?:)?(\\/{2})?([a-z0-9]+\\.)?[a-z0-9]+(\\.(com|cn|cc|org|net|com.cn))$/i',
        'required' => 'on',
        'error' => '网址输入错误',
        'html' => '<tr>
                <th>转向链接</th>
                <td><input name=\'redirecturl\' value=\'{FIELD_VALUE}\' size=\'30\'
                 css=\'redirecturl\'/><span class=\'validation\'></span>
                 </td></tr>',
    ),
    7 =>
    array(
        'mid' => '131',
        'show_type' => 'select',
        'is_main_table' => '0',
        'title' => '是否允许回复',
        'field_name' => 'allowreply',
        'message' => '',
        'set' =>
        array(
            'type' => 'radio',
            'param' => '允许|1,不允许|2',
            'default' => '1',
        ),
        'field_type' => 'tinyint',
        'css' => 'allowreply',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr>
                <th>是否允许回复</th><td> <input type=\'radio\' name=\'allowreply\' value=\'1\' checked=\'checked\' css=\'allowreply\'/> 允许 <input type=\'radio\' name=\'allowreply\' value=\'2\'  css=\'allowreply\'/> 不允许<span class=\'validation\'></span></td></tr>',
    ),
    8 =>
    array(
        'mid' => '131',
        'show_type' => 'input',
        'is_main_table' => '0',
        'title' => '作者',
        'field_name' => 'author',
        'message' => '',
        'set' =>
        array(
            'size' => '30',
            'default' => '',
            'ispasswd' => '0',
        ),
        'field_type' => 'char',
        'field_size' => '50',
        'css' => 'author',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr>
                <th>作者</th>
                <td><input name=\'author\' value=\'{FIELD_VALUE}\' size=\'30\'
                 css=\'author\'/><span class=\'validation\'></span>
                 </td></tr>',
    ),
    9 =>
    array(
        'mid' => '131',
        'show_type' => 'datetime',
        'is_main_table' => '1',
        'title' => '发表时间',
        'field_name' => 'updatetime',
        'message' => '',
        'field_type' => 'int',
        'set' =>
        array(
            'size' => '30',
            'default' => '',
        ),
        'css' => '',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr><th>发表时间</th>
                <td><input name=\'addtime\' id=\'date_addtime\' value=\'{FIELD_VALUE}\' size=\'30\'
                 css=\'\'/><span class=\'validation\'></span><script>
                        $(function(){
                        var dateFormat = {
                        dateFormat: \'yy-mm-dd\'
                        ,monthNames: [ \'一月\', \'二月\', \'三月\', \'四月\', \'五月\', \'六月\', \'七月\', \'八月\', \'九月\', \'十月\', \'十一月\', \'十二月\' ]
                        ,dayNamesMin: [ \'日\', \'一\', \'二\', \'三\', \'四\', \'五\', \'六\' ]
                        };
                        $(\'#date_addtime\').datepicker(dateFormat);
                        });
                        </script></td></tr>',
    ),
    10 =>
    array(
        'mid' => '131',
        'show_type' => 'select',
        'is_main_table' => '1',
        'title' => '是否生成静态',
        'field_name' => 'ishtml',
        'message' => '',
        'set' =>
        array(
            'type' => 'radio',
            'param' => '生成|1,不生成|2',
            'default' => '1',
        ),
        'field_type' => 'tinyint',
        'css' => 'ishtml',
        'validation' => '',
        'required' => 'on',
        'error' => '',
        'html' => '<tr>
                <th>是否生成静态</th><td> <input type=\'radio\' name=\'ishtml\' value=\'\'  css=\'ishtml\' checked=\'1\'/> 生成 <input type=\'radio\' name=\'ishtml\' value=\'2\'  css=\'ishtml\'/> 不生成<span class=\'validation\'></span></td></tr>',
    ),
    11 =>
    array(
        'mid' => '131',
        'show_type' => 'editor',
        'is_main_table' => '0',
        'title' => '内容',
        'field_name' => 'content',
        'message' => '',
        'set' =>
        array(
            'style' => 'full',
            'default' => '',
            'height' => '200',
        ),
        'field_type' => 'text',
        'css' => '',
        'validation' => '/^.+$/',
        'required' => 'on',
        'error' => '',
        'html' => '<tr><th>内容</th><td><script id="hd_content" name="content" type="text/plain"></script>
    <script type=\'text/javascript\'>
        var ue = UE.getEditor(\'hd_content\',{
        imageUrl:url_method//处理上传脚本
        ,zIndex : 0
        ,autoClearinitialContent:false
        ,initialFrameWidth:"100%" //宽度1000
        ,initialFrameHeight:"200" //宽度1000
        ,autoHeightEnabled:false //是否自动长高,默认true
        ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
        ,initialContent:\'{FIELD_VALUE}\' //初始化编辑器的内容 也可以通过textarea/script给值
    });
        </script><span class=\'validation\'></span></td></tr>',
    ),
);
?>