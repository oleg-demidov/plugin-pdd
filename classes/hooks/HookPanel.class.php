<?php


class PluginPdd_HookPanel extends Hook{
    public function RegisterHook()
    {
        /**
         * Хук на отображение админки
         */
        
        $this->AddHook('action_event_test_before', 'RedirectIfNoPeriod');
        
    }

    /**
     * Добавляем в главное меню админки свой раздел с подпунктами
     */
    public function RedirectIfNoPeriod()
    { 
        if(!$oUser = $this->User_GetUserCurrent()){  
            return;            
        }
        
        $oPeriod = $this->PluginPdd_Pdd_GetPeriodByUserId($oUser->getId());
        
        if(!$oPeriod){
            Router::LocationAction(Config::Get('plugin.pdd.redirect.get_period'));
        }
        
        if($oPeriod->isFinished()){
            Router::LocationAction(Config::Get('plugin.pdd.redirect.get_period'));
        }
       
    }
}
