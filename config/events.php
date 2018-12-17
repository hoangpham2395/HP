<?php
return [
    getConstant('EVENT_CONTROLLER_TYPE') => [
        'before_render' => 'BeforeRender',
        'after_render' => 'AfterRender',
        'before_render_json' => 'BeforeRenderJson',
        'after_render_json' => 'AfterRenderJson',
        'before_render_xml' => 'BeforeRenderXml',
        'after_render_xml' => 'AfterRenderXml',
        'before_redirect' => 'BeforeRedirect',
        'after_redirect' => 'AfterRedirect',
    ],
    getConstant('EVENT_MODEL_TYPE') => [
        'before_save' => 'saving',
        'after_save' => 'saved',
    ]
];