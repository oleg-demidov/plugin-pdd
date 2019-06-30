{**
 * Панель информации
 *}
 
{capture 'content'}
    {$oPeriodInterval = $oPeriod->getRemainInterval()}
    {pluralize text={lang "plugin.pdd.period.day" count=$oPeriodInterval->d} count=$oPeriodInterval->d}
    {pluralize text={lang "plugin.pdd.period.hour" count=$oPeriodInterval->h} count=$oPeriodInterval->h}
    {pluralize text={lang "plugin.pdd.period.min" count=$oPeriodInterval->i} count=$oPeriodInterval->i}
{/capture}

{capture 'title'}
    {if $oPeriod->getIsTest()}
        {$aLang.plugin.pdd.period.block.test_title}

    {else}
        {$aLang.plugin.pdd.period.block.title}
    {/if}

{/capture}

{component 'block'
    title={$smarty.capture.title}
    content={$smarty.capture.content}
}
