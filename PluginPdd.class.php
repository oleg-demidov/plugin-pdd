<?php
/**
 * 
 * @author Oleg Demidov
 *
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginPdd extends Plugin
{
    
    
    public function Init()
    {
//        $this->Lang_AddLangJs([
//            'plugin.wiki.markitup.punkt'
//        ]);
//        
        $this->Component_Add('pdd:period');

//        $this->Viewer_AppendScript(Plugin::GetTemplatePath('like'). '/assets/js/init.js');
    }

    public function Activate()
    {
        
        return true;
    }

    public function Deactivate()
    {
        
        return true;
    }
    
    public function Remove()
    {
        
        return true;
    }
}