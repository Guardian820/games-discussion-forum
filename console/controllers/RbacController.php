<?php 
namespace console\controllers; 
use Yii; 
use yii\console\Controller; 
//use common\rbac\UserRoleRule; 
use common\rbac\ThreadStarterRule; 
use common\rbac\PostCreatorRule; 

class RbacController extends Controller 
{     
	public function actionInit()     
	{         
    	$auth = \Yii::$app->authManager;

        // Remove previous rbac.php files under console/data each time this file is executed
    	$auth->removeAll(); 
     
        // CREATE PERMISSIONS		
    	// Permission to create users
    	$createUsers = $auth->createPermission('createUsers');
        $createUsers->description = 'Create Users';
        $auth->add($createUsers);

        // Permission to Edit all thread
    	$editThread = $auth->createPermission('editThread');
        $editThread->description = 'Edit Thread';
        $auth->add($editThread);

        // Permission to Edit all post
    	$editPost = $auth->createPermission('editPost');
        $editPost->description = 'Edit Post';
        $auth->add($editPost);
     
    	// Permission to edit user profile
    	$editUserProfile = $auth->createPermission('editUserProfile');
        $editUserProfile->description = 'Edit User Profile';
        $auth->add($editUserProfile);
     

    	// ROLES AND PERMISSIONS

        // User (default user after signup)
        $user = $auth->createRole('user');
        $auth->add($user);

        // Moderator
        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        $auth->addChild($moderator, $user); # User is a child of moderator
        $auth->addChild($moderator, $editPost);
        $auth->addChild($moderator, $editThread);


        $super_moderator = $auth->createRole('super_moderator'); # Moderator is a child of Super Moderator
        $auth->add($super_moderator);
        $auth->addChild($super_moderator, $moderator);
        $auth->addChild($super_moderator, $editUserProfile);

        $admin = $auth->createRole('admin'); 
        $auth->add($admin);
        $auth->addChild($admin, $super_moderator); #The King of everything
        $auth->addChild($admin, $createUsers);


        // SPECIAL PERMISSIONS
        // Without this, User can't edit their own Post and Thread.

        // Own Thread
    	$rule = new ThreadStarterRule; //Apply our Rule that use the user roles from user table
    	$auth->add($rule);
     
     	// add the "editOwnThread" permission and associate the rule with it.
     	$editOwnThread = $auth->createPermission('editOwnThread');
     	$editOwnThread->description = 'Update own thread';
     	$editOwnThread->ruleName = $rule->name;
     	$auth->add($editOwnThread);

     	// "editOwnThread" will be used from "editThread"
     	$auth->addChild($editOwnThread, $editThread);

     	// allow "User" to update their own Threads
     	$auth->addChild($user, $editOwnThread);

     	// Own Post
    	$rule = new PostCreatorRule(); //Apply our Rule that use the user roles from user table
    	$auth->add($rule);
     
     	// add the "editOwnPost" permission and associate the rule with it.
     	$editOwnPost = $auth->createPermission('editOwnPost');
     	$editOwnPost->description = 'Edit own Post';
     	$editOwnPost->ruleName = $rule->name;
     	$auth->add($editOwnPost);

     	// "editOwnPost" will be used from "editPost"
     	$auth->addChild($editOwnPost, $editPost);

     	// allow "User" to update their own Posts
     	$auth->addChild($user, $editOwnPost);


        // ROLES ASSIGNMENT
        // Assign roles to users. 1 is the IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1); # User ID 1 is always admin so we don't get locked out inside our own application.
        $auth->assign($super_moderator, 2); # User ID 1 is always admin so we don't get locked out inside our own application.
        $auth->assign($moderator, 3); # User ID 1 is always admin so we don't get locked out inside our own application.
        $auth->assign($user, 4); # User ID 1 is always admin so we don't get locked out inside our own application.
    }
}