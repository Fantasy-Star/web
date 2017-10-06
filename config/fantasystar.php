<?php

return [

    'replies_perpage'         => 200,
    'actived_time_for_update' => 'actived_time_for_update',
    'actived_time_data'       => 'actived_time_data',

    'notice_category_id'      => env('NOTICE_CATEGORY_ID')?:1,
    'activity_category_id'       => env('ACTIVITY_CATEGORY_ID')?:2,
    'qa_category_id'         => env('QA_CATEGORY_ID')?:3,
    'share_category_id'       => env('SHARE_CATEGORY_ID')?:4,
    'tutorial_category_id'       => env('TUTORIAL_CATEGORY_ID')?:5,
    'simple_category_id'       => env('HUNT_CATEGORY_ID')?:6,

    'wiki_topic_id'          => env('WIKI_TOPIC_ID') ?:1,
    'admin_board_cid'        => env('ADMIN_BOARD_CID') ?:0,

    'notify_delay'           => 180,
];
