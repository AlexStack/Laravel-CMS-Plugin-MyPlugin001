<div class="row mb-5 pb-5">
    <div class="col-md-12 p-3">
        {{-- Display variable from the CMS settings --}}
        <h1>{{ $helper->s("plugin.page-tab-myplugin001.plugin_name") }}</h1>

        {{-- Display variable from the plugin controller --}}
        <div class="text-primary">{{$plugins['myplugin001']['title']}}</div>

        <div class="text-success">This is a semi-finished plugin, you can change the blade template & Laravel
            controller to fit your own
            usage.
            <a href="https://www.laravelcms.tech/Laravel-Create-your-own-plugin.html" target="_blank"
                class="text-primary">Tutorial</a>
        </div>

        {{-- Display variable from the CMS settings --}}
        <i class="fas fa-solar-panel mr-1"></i>Blade Template Directory: <a
            href="{{config('laravel-cms.admin_route')}}/plugins/system-file?path=resources/views/vendor/laravel-cms/plugins/page-tab-myplugin001"
            class="text-info system-file"
            target="_blank">{{ $helper->s("plugin.page-tab-myplugin001.blade_template_dir") }}</a>
        <br />
        <i class="fab fa-php mr-1"></i>PHP Controller Directory : <a
            href="{{config('laravel-cms.admin_route')}}/plugins/system-file?path=app/LaravelCms/Plugins/MyPlugin001"
            class="text-info system-file"
            target="_blank">{{ $helper->s("plugin.page-tab-myplugin001.php_controller_dir") }}</a>
    </div>

    @if ( $helper->s("plugin.page-tab-myplugin001.real_update") == 'yes') <div class="col-md-12 p-3">
        <div class="alert alert-info" role="alert">
            Below is an example form to add some extra content to your Sub Content field. Try add some thing to the
            Extra Sub Content input and submit
        </div>
    </div>
    @endif

    {{-- Example of use multi-language label of a input --}}
    <div class="col-md">
        @include($helper->bladePath('includes.form-input','b'), ['name' =>
        "extra_sub_content", 'type'=>'text', 'label'=>$helper->t('extra,sub_content')])
    </div>

    {{-- Display variable from the plugin controller --}}
    <div class="col-md">
        @include($helper->bladePath('includes.form-input','b'), ['name' =>
        "translate_to_language", 'type'=>'select', 'options'=>$plugins['myplugin001']['languages']])
    </div>

</div>

{{-- Example of use jQuery with a variable --}}
<script>
    $('.input-translate_to_language').val('{{$plugins['myplugin001']['backend_language']}}');

    @if ( !$helper->s("plugin.system-file.blade_file") )
        $('.system-file').click(function(e){
            e.preventDefault();
            alert("Please install the System File Explorer plugin first");
        });
    @endif
</script>
