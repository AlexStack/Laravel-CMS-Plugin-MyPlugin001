<?php

use AlexStack\LaravelCms\Models\LaravelCmsSetting;
use Illuminate\Database\Migrations\Migration;

class UpdatePluginSettingsTable extends Migration
{
    private $config;
    private $table_name;

    public function __construct()
    {
        $this->config     = include base_path('config/laravel-cms.php');
        $this->table_name = $this->config['table_name']['settings'];
    }

    /**
     * Run the migrations.
     */
    public function up()
    {
        $setting_data = [
            'category'        => 'plugin',
            'param_name'      => 'page-tab-myplugin001',
            'input_attribute' => '{"rows":10,"required":"required"}',
            'enabled'         => 1,
            'sort_value'      => 20,
            'abstract'        => 'Semi-finished plugin for your own use. Add your Laravel controller into the CMS. <a href="https://github.com/AlexStack/Laravel-CMS-Plugin-Example-001" target="_blank"><i class="fas fa-link mr-1"></i>Tutorial</a>',
            'param_value'     => '{
    "plugin_name": "My Plugin 001",
    "tab_name": "<i class=\'fas fa-kaaba mr-1\'></i>__(myplugin)",  
    "real_update": "yes",
    "blade_template_dir": "your-laravel-project/resources/views/vendor/laravel-cms/plugins/page-tab-myplugin001",
    "php_controller_dir": "your-laravel-project/app/LaravelCms/Plugins/MyPlugin001",
    "blade_file": "myplugin001",
    "php_class": "App\\\\LaravelCms\\\\Plugins\\\\MyPlugin001\\\\Controllers\\\\MyPlugin001Controller"
}',
        ];
        LaravelCmsSetting::UpdateOrCreate(
            ['category'=>'plugin', 'param_name' => 'page-tab-myplugin001'],
            $setting_data
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        LaravelCmsSetting::where('param_name', 'page-tab-myplugin001')->where('category', 'plugin')->delete();
    }
}
