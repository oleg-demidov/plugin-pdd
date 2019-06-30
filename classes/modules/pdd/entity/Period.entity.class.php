<?php

class PluginPdd_ModulePdd_EntityPeriod extends EntityORM
{
    
    protected $aRelations = array(
    );
    
    protected $aValidateRules = [
        
    ];   
    
    public function getPeriodInterval() {
        return $this->getDateEnd()->diff($this->getDateCreate(), true);
    }
    
    public function getRemainInterval() {
        return $this->getDateEnd()->diff(new DateTime, true);
    }
    
    public function getDateEnd() {
        $oDateInterval = new DateInterval('PT'.$this->getPeriod().'S');
        return $this->getDateCreate()->add($oDateInterval);
    }
    
    public function isFinished() {
        return new DateTime > $this->getDateEnd();
        
    }
        
    public function getDateCreate() {
        return new DateTime(parent::getDateCreate());
    }
}