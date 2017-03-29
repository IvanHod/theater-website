<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \DB::table('role_user')->delete();
	    \DB::table('permission_role')->delete();
	    \DB::table('roles')->delete();
	    \DB::table('permissions')->delete();

	    /***********************************************************************/
    	/***************************** permissions *****************************/
    	/***********************************************************************/

	    $showUser = new Permission();
	    $showUser->name         = 'show-user';
	    $showUser->display_name = 'Show Users';
	    $showUser->save();

	    $createUser = new Permission();
	    $createUser->name         = 'create-user';
	    $createUser->display_name = 'Create Users';
	    $createUser->save();

	    $editUser = new Permission();
	    $editUser->name         = 'edit-user';
	    $editUser->display_name = 'Edit Users';
	    $editUser->save();

	    $deleteUser = new Permission();
	    $deleteUser->name         = 'delete-user';
	    $deleteUser->display_name = 'Delete Users';
	    $deleteUser->save();

	    $showFestival = new Permission();
	    $showFestival->name         = 'show-festival';
	    $showFestival->display_name = 'Show festivals';
	    $showFestival->save();

	    $createFestival = new Permission();
	    $createFestival->name         = 'create-festival';
	    $createFestival->display_name = 'Create festivals';
	    $createFestival->save();

	    $editFestival = new Permission();
	    $editFestival->name         = 'edit-festival';
	    $editFestival->display_name = 'Edit festivals';
	    $editFestival->save();

	    $deleteFestival = new Permission();
	    $deleteFestival->name         = 'delete-festival';
	    $deleteFestival->display_name = 'Delete festivals';
	    $deleteFestival->save();

	    $showCollective = new Permission();
	    $showCollective->name         = 'show-collective';
	    $showCollective->display_name = 'Show collectives';
	    $showCollective->save();

	    $createCollective = new Permission();
	    $createCollective->name         = 'create-collective';
	    $createCollective->display_name = 'Create collectives';
	    $createCollective->save();

	    $editCollective = new Permission();
	    $editCollective->name         = 'edit-collective';
	    $editCollective->display_name = 'Edit collectives';
	    $editCollective->save();

	    $deleteCollective = new Permission();
	    $deleteCollective->name         = 'delete-collective';
	    $deleteCollective->display_name = 'Delete collectives';
	    $deleteCollective->save();

	    $showNew = new Permission();
	    $showNew->name         = 'show-new';
	    $showNew->display_name = 'Show news';
	    $showNew->save();

	    $createNew = new Permission();
	    $createNew->name         = 'create-new';
	    $createNew->display_name = 'Create news';
	    $createNew->save();

	    $editNew = new Permission();
	    $editNew->name         = 'edit-new';
	    $editNew->display_name = 'Edit news';
	    $editNew->save();

	    $deleteNew = new Permission();
	    $deleteNew->name         = 'delete-new';
	    $deleteNew->display_name = 'Delete news';
	    $deleteNew->save();

    	/***********************************************************************/
    	/***************************** permissions-end *************************/
    	/***********************************************************************/

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description  = 'User is allowed to manage and edit other users';
        $admin->save();

        $collectiverole = new Role();
        $collectiverole->name         = 'collective';
        $collectiverole->display_name = 'User Administrator collective';
        $collectiverole->description  = 'User is allowed to manage and edit collectives';
        $collectiverole->save();

        /*************************** attach permissions ***********************/

	    $admin->attachPermissions(array(
	    	$showUser, $createUser, $editUser, $deleteUser,
	    	$showFestival, $createFestival, $editFestival, $deleteFestival,
	    	$showCollective, $createCollective, $editCollective, $deleteCollective,
	    	$showNew, $createNew, $editNew, $deleteNew,
	    ));

	    $collectiverole->attachPermissions(array(
	    	$showCollective, $editCollective, $createCollective, $deleteCollective
	    ));

        /*********************** end attach permissions ***********************/

	    $adminuser = User::where('name', '=', 'Ivan')->first();
	    $adminuser->attachRole($admin);
    }
}
