<?php
return 
[
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => 
                    [
                        //We're using authManager for our RBAC implementation
                        'authManager' => 
                        [
                            'class' => 'yii\rbac\PhpManager',
                            'itemFile' => '@console/data/items.php', //Default path to items.php | NEW CONFIGURATIONS
                            'assignmentFile' => '@console/data/assignments.php', //Default path to assignments.php | NEW CONFIGURATIONS
                            'ruleFile' => '@console/data/rules.php', //Default path to rules.php | NEW CONFIGURATIONS
                        ],
                        'cache' => 
                        [
                            'class' => 'yii\caching\FileCache',
                        ],
                    ],
    'modules' => 
                    [
                        //We're using dektrium's yii2-user for our login and registration systems instead of framework's built-in.
                        'user' => 
                        [
                            'class' => 'dektrium\user\Module',
                            'enableUnconfirmedLogin' => true,
                            'admins' => ['admin'], #The list of user which will allowed to access the Backend Admin Panel to manage users.

                            // you will configure your module inside this file
                            // or if need different configuration for frontend and backend you may
                            // configure in needed configs
                        ],
       

                    ],
];
