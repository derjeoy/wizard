@extends('layouts.default')
@section('title', $project->name)
@section('container-style', 'container-fluid')
@section('content')

<div class="row marketing wz-main-container-full">
        <form class="w-100" method="POST" id="wz-doc-edit-form"
              action="{{ $newPage ? wzRoute('project:doc:new:show', ['id' => $project->id]) : wzRoute('project:doc:edit:show', ['id' => $project->id, 'page_id' => $pageItem->id]) }}">

            @include('components.doc-edit', ['project' => $project, 'pageItem' => $pageItem ?? null, 'navigator' => $navigator])
            <div class="row">
                <input type="hidden" name="type" value="markdown"/>
                <div class="col" style="padding-left: 0; padding-right: 0;">
                    <div id="ueditor" class="wz-markdown-style-fix">
                        <textarea style="display:none;" name="content">{{ $pageItem->content ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- 加载编辑器的容器 -->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script id="container" name="content" type="text/plain">这里写你的初始化内容</script>
    <!-- 配置文件 -->

    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.js"></script>
    
@endsection
@push('stylesheet')
    <!-- <link href="{{ cdn_resource('/assets/vendor/editor-md/css/editormd.min.css') }}" rel="stylesheet"/> -->
@endpush

@push('script')
    
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    
        // //对编辑器的操作最好在编辑器ready之后再做
        // ue.ready(function() {
        //     //设置编辑器的内容
        //     ue.setContent('hello');
        //     // //获取html内容，返回: <p>hello</p>
        //     // var html = ue.getContent();
        //     // //获取纯文本内容，返回: hello
        //     // var txt = ue.getContentTxt();
        // });

        //$.global.markdownEditor = ue;

        $.global.getEditorContent = function () {
            try {
                console.log(ue.getContent());
                return ue.getContent();
            } catch (e) {
            }

            return '';
        };

    </script>
@endpush


    
