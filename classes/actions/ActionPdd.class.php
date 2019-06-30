<?php
/*
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Oleg Demidov 
 *
 */

/**
 * Экшен обработки ajax запросов
 * Ответ отдает в JSON фомате
 *
 * @package actions
 * @since 1.0
 */
class PluginPdd_ActionPdd extends ActionPlugin{
    
    public $oUserCurrent;

    public function Init() {
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }
    
    protected function RegisterEvent() {
        $this->AddEventPreg( '/^get-test-period$/i', 'EventGetTestPeriod');
        $this->AddEventPreg( '/^get-period$/i', 'EventGetPeriod');
    }
    
    
    public function EventGetTestPeriod(){
        if(!$this->oUserCurrent ){
            return $this->EventNotFound();
        }
        
        if($oPeriod = $this->PluginPdd_Pdd_GetPeriodByFilter([
                'user_id' => $this->oUserCurrent->getId(),
                'is_test' => true
            ])){
            return Router::ActionError($this->Lang_Get('plugin.pdd.notice.error_already_test'));
        }
        
        $oPeriod = Engine::GetEntity(PluginPdd_ModulePdd_EntityPeriod::class);
        $oPeriod->setIsTest(1);
        $oPeriod->setEnable(1);
        $oPeriod->setPeriod(Config::Get('plugin.pdd.period.test_time'));
        $oPeriod->setUserId($this->oUserCurrent->getId());
        
        if($oPeriod->Save()){
            $this->Message_AddNotice($this->Lang_Get('plugin.pdd.notice.new_test_period'), null, true);
        } else {
            $this->Message_AddNotice($this->Lang_Get('common.error'), null, true);
        }
        
        Router::LocationAction('test/pdd');       
        
    }
    
    public function EventGetPeriod($param) {
        
    }
    
    public function EventShutdown() {
    }


}