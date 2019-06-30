<?php
/**
 * Таблица БД
 */
$config['$root$']['db']['table']['pdd_pdd_period'] = '___db.table.prefix___pdd_period';

/**
 * Роутинг
 */
$config['$root$']['router']['page']['pdd'] = 'PluginPdd_ActionPdd';

$config['period'] = [
    'test_time' => 60*60*24*2
];

$config['redirect'] = [
    'get_period'  => 'page/get-period',
];

$config['$root$']['block']['pay_test'] = array(
    'action' => array(
        'test' => [
            '{panel}'
        ]
    ),
    'blocks' => array(
        'left' => array(
            'period' => array('priority' => 100,'params' => array('plugin' => 'pdd'))
        )
    ),
    'clear'  => false,
);

return $config;