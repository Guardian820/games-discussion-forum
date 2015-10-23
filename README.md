# **Games Discussion Forum** #
===========================================

Language  : **PHP* 

Framework : **Yii2 Framework** 

===========================================

Introduction 

My first project using Yii2 framework. Imported from my Bitbucket (originally a company recuitment test, which i failed horribly)

This is a simple portal for users to read, post and discuss about games. 


This application is built based on Yii2 Framework Advanced Template with frontend and backend functionality. 


From now this document will refer user-posted game as `Thread` and the respective user comments message as `Post` 


Application Requirements
------------------------------------------
1. PHP 5.1.0 or above
2. MySQL
3. [Composer](http://www.getcomposer.org)


Installation Instructions
------------------------------------------
1. Checkout

2. Go into this application root directory, then type the following code: `php init`
	Choose either development or production depending on your needs (choose no if prompt to overwrite).

3. Create and Configure your database in `common\config\main-local.php` then type `yii migrate`
	This migration will construct the Thread and Post tables.

4. Do the last migration to construct user tables: ```yii migrate --migrationPath=@vendor/dektrium/yii2-user/migrations```

5. Make sure the directories: `console\data`, `frontend\web\images\avatar` and `frontend\web\images\cover` is writable

6. By default, this application is currently empty, to prepopulate it with with sample data, type the following:`yii migrate` (ignore the html tag, normally it should be filtered properly by ActiveForm)

7. Open [http://localhost/games-discussion-forum/frontend/web](http://localhost/games-discussion-forum/frontend/web) for Frontend or [http://localhost/games-discussion-forum/backend/web](http://localhost/games-discussion-forum/backend/web) for Backend.

8. The default users are `admin`,`super_moderator`,`moderator` and `user`, with the password `123456`


Configuration File
------------------------------------------
1. The database configuration (host, database name, user/password) is located at `common\config\main-local.php` 

2. The list of allowed users to access the backend Admin Panel is located at `common\config\main-local.php`

3. By default, you don't need to confirm your email address after signing up. To enable this set the `'enableUnconfirmedLogin'` to `false` inside `common\config\main.php`


Application Functionality and Features
------------------------------------------
**RBAC (Role Based Access Control) Hierarchy**

There are five predefined role on this application, ranked lowest to highest, 
can also distinguished by their font color in Threads and Posts:

• Guest (non-logged in users), no color as they can't create anything. 

• User, Black. 

• Moderator, Green. 

• Super Moderator, Blue. 

• Administrator, Red. 

----

**Access and Permission**
• Guest can search, filter, sort and view Thread details and read related Posts.

• Guest can register new account.

• Guest can login to existing account.

• Logged in users enjoy the same privilege as Guest.

• Logged in users can create new game page (game title, publisher, description, upload game cover, etc.).

• Logged in users can Post comment on any game page.

• Logged in users can edit/update/delete their own Thread and Post.

• Logged in users can not edit/update/delete other people's Thread and Post.

-----         

**Moderating and Administration**
• Moderator enjoy the same privilege as (logged in) User.

• Moderator can edit and delete other user's Thread and Post (including Super Moderator and Administrator Thread/Post).

• Super Moderator enjoy the same privilege as Moderator (no other privileges defined yet).

 Administrator enjoy the same privilege as Super Moderator.

• Administrator can create, edit and delete other user directly from backend Admin Panel.


 

Technical Details
------------------------------------------

**The `real` RBAC:**

The real RBAC is done using a mix of dektrium/yii2-user and authManager

By default, the user with id 1 is always admin, as defined inside `console\data`. 
To create or re-register all user permissions:

1. Open the `console\controller\RbacController.php`.

2. Scroll down to the bottom of file, search for ROLES ASSIGNMENT.

3. Assign role by user id. for example `$auth->assign($admin, 1)`; //assign user with id 1 as admin

4. Go to your application root directory and type: `yii rbac/init`

5. You should see you roles, permissions and assignments inside `console\data`.

The newly (normal) registered user will automatically assigned as `User` via `console\data\assignment.php`. **If you add it via Admin Panel though, you need to modify the `console\data\assignment.php` and assign that user its role.**

-----
**The `fake` RBAC:**

• The `role` column inside user table is just an aesthetic which links to css class in `frontend\web\css\site.css`.

• The `role` column has a default value of `user`. You can change it via Admin Panel to `admin, super_moderator, moderator`.

• After you change it, the user font color will change according to each role (for example in view thread page).




Known Bugs / Unfinished Features
------------------------------------------
• Upload game cover maximum filesize is following your apache settings (not necessarily a bug).

• The news/announcement panel at the frontend index page is just a static html. No interaction with model whatsoever.

• If you delete an user with existing Thread and/or Post (via admin panel or directly from database) the application will crash if you try to view the respective Thread/Post.

• The User's avatar (profile photo) is functional, it uses the value from database but i haven't created the interface to upload it yet (user settings menu). To change user avatar, put the image manually to `frontend\web\images\avatar`. Then copy the `filename.extension`, insert the value to database (avatar column).