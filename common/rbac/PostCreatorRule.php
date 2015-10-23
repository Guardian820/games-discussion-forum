<?php 
 namespace common\rbac; 
 use yii\rbac\Rule; 
/**  * Checks if user role matches user passed via params  
*/ class PostCreatorRule extends Rule 
    {     
        public $name = 'isPostStarter';

        /**
         * @param string|integer $user the user ID.
         * @param Item $item the role or permission that this rule is associated with
         * @param array $params parameters passed to ManagerInterface::checkAccess().
         * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
         */
        public function execute($user, $item, $params)
        {
            //Check if the currently logged in user is the same as the Post creator
            return isset($params['post']) ? $params['post']->post_creator == $user : false;
        }
    }
