<?php
return
array
    (
    array
    (
        'menu' => 0, 'name' => 'Home', 'name_cn' => '首页', 'icon' => 'fa fa-home', 'items' => array
        (
            array('id' => 0, 'name' => 'Home', 'name_cn' => '首页', 'router' => 'webIndex'),
        ),
    ),
    array
    (
        'menu' => 10, 'name' => 'User Management', 'name_cn' => '用户管理', 'icon' => 'fa fa-users', 'items' => array
        (
            //    array('id'=>11,'name'=>'Client List','name_cn'=>'用户管理','router'=>'user_list'),
            //    array('id'=>12,'name'=>'Admin List','name_cn'=>'管理员','router'=>'admin_list'),
            //    array('id'=>11,'name'=>'Edit Profile','name_cn'=>'更换个人资料','router'=>'setUserPwd'),
            //    array('id'=>13,'name'=>'Change Password','name_cn'=>'更换密码','router'=>'setUserPwd'),
            array('id' => 13, 'name' => 'Registration', 'name_cn' => '注册', 'router' => 'webMemberRegister'),
        ),
    ),
    array
    (
        'menu' => 20, 'name' => 'My Wallet', 'name_cn' => '钱包管理', 'icon' => 'fa fa-credit-card', 'items' => array
        (
            array('id' => 20, 'name' => 'Wallet History', 'name_cn' => '钱包记录', 'router' => 'webwalletRecord'),
            array('id' => 21, 'name' => 'Wallet Conversion', 'name_cn' => '钱包互转', 'router' => 'webchangeWallet'),
            array('id' => 22, 'name' => 'Wallet Transfer', 'name_cn' => '转分', 'router' => 'webtransfer'),
            //array('id'=>22,'name'=>'User Transfer Record','name_cn'=>'用户转分记录','router'=>'userTransRec'),
        ),
    ),
    array
    (
        'menu' => 30, 'name' => 'My Deposit', 'name_cn' => '充值管理', 'icon' => 'fa fa-usd', 'items' => array
        (
            array('id' => 31, 'name' => 'Deposit Information', 'name_cn' => '充值', 'router' => 'webDeposit'),
            array('id' => 32, 'name' => 'Deposit History', 'name_cn' => '充值记录', 'router' => 'webDepositRecord'),
        ),
    ),
    array
    (
        'menu' => 30, 'name' => 'My Withdrawal', 'name_cn' => '提现管理', 'icon' => 'fa fa-suitcase', 'items' => array
        (
            array('id' => 31, 'name' => 'Withdrawal Confirmation', 'name_cn' => '提现申请', 'router' => 'webWithdraw'),
            array('id' => 32, 'name' => 'Withdrawal History', 'name_cn' => '提现记录', 'router' => 'webWithdrawRecord'),
        ),
    ),
    array
    (
        'menu' => 40, 'name' => 'My Purchase', 'name_cn' => '购买配套与产品', 'icon' => 'fa fa-level-up', 'items' => array
        (
            array('id'=>41,'name'=>'Upgrade Package','name_cn'=>'购买配套','router'=>'webupgradePackage'),
            array('id' => 41, 'name' => 'Repurchase Product', 'name_cn' => '购买产品', 'router' => 'webpurchaseProduct'),
            array('id' => 41, 'name' => 'Repurchase Product History', 'name_cn' => '购买记录', 'router' => 'webpackageRecord'),
        ),
    ),
    array
    (
        'menu' => 40, 'name' => 'Notice Manage', 'name_cn' => '信息管理', 'icon' => 'fa fa-bullhorn', 'items' => array
        (
            array('id' => 41, 'name' => 'Notice', 'name_cn' => '通告', 'router' => 'webNewsList'),
            //         //array('id'=>42,'name'=>'Video Manage','name_cn'=>'视频管理','router'=>'videoList'),
        ),
    ),
    array
    (
        'menu' => 50, 'name' => 'My Network', 'name_cn' => '团队', 'icon' => 'fa fa-users', 'items' => array
        (
            array('id' => 51, 'name' => 'Referral Team', 'name_cn' => '推荐图', 'router' => 'websponsorTeam'),
            array('id' => 51, 'name' => 'Genealogy Tree', 'name_cn' => '安置图', 'router' => 'webnode'),
            //    array('id'=>52,'name'=>'User Transfer Record','name_cn'=>'安置图','router'=>'user_list'),
        ),
    ),

    array
    (
        'menu' => 60, 'name' => 'Customer Service', 'name_cn' => '客服', 'icon' => 'fa fa-ticket', 'items' => array
        (
            array('id' => 61, 'name' => 'Customer Feedback', 'name_cn' => '客服', 'router' => 'webcreateTicket'),
            array('id' => 61, 'name' => 'Notice', 'name_cn' => '通知', 'router' => 'webticketList'),
        ),
    ),
    array
    (
        'menu' => 70, 'name' => 'My Earning Report', 'name_cn' => '奖励记录', 'icon' => 'fa fa-file', 'items' => array
        (
            array('id' => 72, 'name' => 'Referral Bonus', 'name_cn' => 'Referral Bonus', 'router' => 'websponsorBonus'),
            array('id' => 71, 'name' => 'Team Bonus', 'name_cn' => 'Team Bonus', 'router' => 'webmatchingBonus'),
            array('id' => 73, 'name' => 'Matching Team Bonus', 'name_cn' => 'Matching Team Bonus', 'router' => 'webdynamicBonus'),
            array('id' => 73, 'name' => 'Trading PV Bonus', 'name_cn' => 'Trading PV Bonus', 'router' => 'webspecialBonus'),
            array('id' => 72, 'name' => 'Rewards & Redemptions', 'name_cn' => 'Rewards & Redemptions', 'router' => 'webstaticBonus'),
        ),
    ),
    // array
    // (
    //     'menu'=>80,'name'=>'Currency Manage','name_cn'=>'汇率管理','icon'=>'fas fa-clipboard-list','items'=>array
    //     (
    //         array('id'=>81,'name'=>'Country Currency','name_cn'=>'国家汇率','router'=>'countryConfig'),
    //         array('id'=>82,'name'=>'Deposit Bank','name_cn'=>'充值银行','router'=>'bankConfig'),
    //     ),
    // ),
    // array
    // (
    //     'menu'=>90,'name'=>'System Config','name_cn'=>'设置','icon'=>'fas fa-clipboard-list','items'=>array
    //     (
    //         array('id'=>91,'name'=>'Customer Feedback','name_cn'=>'系统设置','router'=>'systemConfig'),
    //     ),

    // )
);
