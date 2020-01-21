<?php

namespace App\LaravelCms\Plugins\MyPlugin001\Controllers;

use AlexStack\LaravelCms\Helpers\LaravelCmsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * This is a page-tab plugin example of Amila Larave CMS
 * You can edit it for fit your own needs
 */
class MyPlugin001Controller extends Controller
{
    private $user = null;
    private $helper;

    private $langs = ['en'=>'English', 'zh'=>'Chinese', 'es'=>'Spanish', 'ar'=>'Arabic', 'ja'=>'Japanese', 'hi'=>'Hindi', 'pt'=>'Portuguese', 'fr'=>'French', 'ru'=>'Russian', 'de'=>'German', 'ko'=>'Korean', 'it'=>'Italian', 'la'=>'Latin'];

    /**
     * No need to change it
     */
    public function __construct()
    {
        $this->helper = new LaravelCmsHelper();
    }

    /**
     * No need to change it
     */
    public function checkUser()
    {
        if (! $this->user) {
            $this->user = $this->helper->hasPermission();
        }
    }

    /**
     * Pass data to the plugin blade template which display the create new page form
     */
    public function create($form_data, $page, $plugin_settings)
    {
        $data['title'] = 'You can define some variables in method create() in MyPlugin001Controller.php';

        $data['backend_language'] = $this->helper->s('template.backend_language');

        $data['languages'] = $this->langs;


        return $data;
    }

    /**
     * Pass data to the plugin blade template which display the edit page form
     */
    public function edit($id, $page, $plugin_settings)
    {
        $data['title'] = 'You can define some variables in method edit() in MyPlugin001Controller.php';

        $data['backend_language'] = $this->helper->s('template.backend_language');

        $data['languages'] = $this->langs;


        return $data;
    }

    /**
     * Here we use the same update() method when add a new page
     */
    public function store($form_data, $page, $plugin_settings)
    {
        return $this->update($form_data, $page, $plugin_settings);
    }

    /**
     * Below is an example for how to use $form_data, $page, $plugin_settings
     * And update the sub_content
     */
    public function update($form_data, $page, $plugin_settings)
    {
        if ('' == trim($form_data['extra_sub_content'])) {
            return false;
        }
        if ('yes' == strtolower($plugin_settings['real_update'])) {
            $new_sub_content = $page->sub_content . $this->handleContent($form_data);
        
            // $this->helper->debug($form_data);
 
            $page->update(['sub_content' => $new_sub_content]);
        }
    }


    // public function destroy(Request $request, $id)
    // {
    //     //
    // }


    /*
     * Other methods.
     */
    public function handleContent($form_data)
    {
        return '<hr/>I want to translate below content to <b>' . $this->langs[$form_data['translate_to_language']] . '</b><hr/><div class="text-success">' . $form_data['extra_sub_content'] . '</div><hr/>From MyPlugin001<hr/>You can change above text via edit the method handleContent() in the MyPlugin001Controller.php';
    }
}
