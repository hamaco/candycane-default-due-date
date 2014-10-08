<?php

$pluginContainer = ClassRegistry::getObject('PluginContainer');
$pluginContainer->installed('cc_default_due_date','0.1.0');

App::uses('CakeEventManager', 'Event');
CakeEventManager::instance()->attach(function($event) {
    if ($event->subject->name !== 'Issues' || $event->subject->view !== 'add') {
        return;
    }
    $event->subject->request->data['Issue']['due_date'] = date('Y-m-d', strtotime('+7 days'));
}, 'View.beforeRender');
