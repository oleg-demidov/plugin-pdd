<?php

/**
 * Description of PluginTest_BlockPanel
 *
 * @author oleg
 */
class PluginPdd_BlockPeriod extends Block {
    
    public function Exec() {
        
        if(!$oUserCurrent = $this->User_GetUserCurrent()){
            return;
        }  
        
        $oPeriod = $this->PluginPdd_Pdd_GetPeriodByFilter([
            'user_id' => $oUserCurrent->getId()
        ]);
        
        if(!$oPeriod){
            return;
        }
        
        $this->Viewer_Assign('oPeriod', $oPeriod);
        
        return $this->SetTemplate("component@pdd:period.block-period");       
    }
}
