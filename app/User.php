<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable//extends Eloquent
{
    use Notifiable;
    //use Selectable;
    //protected $primaryKey = 'id_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// add last
public function profile()
{
    return $this->hasOne(Profile::class);
    
}
public function articles()
{
    return $this->hasMany(Article::class);
    
}
public function comments()
{
    return $this->hasMany(Comment::class);
    
}
// 
////////////////////////////////////////////inverse
public function report(){
return $this->belongsTo(Report::class);
}
public function temlate(){
return $this->belongsTo(Subscriber::class);
}
public function compaign(){
return $this->belongsTo(Compaign::class);
}
public function subscriber(){//s????????????????
return $this->belongsTo(Subscriber::class);
}
public function bunch(){//es??????????/
return $this->belongsTo(Bunch::class);
}
public function preview(){
return $this->belongsTo(Preview::class);
}



//     use Zizaco\Confide\ConfideUser;
//     use Zizaco\Confide\Confide;
//     use Zizaco\Confide\ConfideEloquentRepository;
//     use Zizaco\Entrust\HasRole;
//     use Carbon\Carbon;
//     use Illuminate\Auth\UserInterface;
//     use Illuminate\Auth\Reminders\RemindableInterface;

// class User extends Eloquent implements UserInterface, RemindableInterface{
//     use ConfideUser;
//     use HasRole;

//         /**
//          * Get user by username
//          * @param $username
//          * @return mixed
//          */
//         public function getUserByUsername( $username )
//         {
//             return $this->where('username', '=', $username)->first();
//         }

//         public function joined()
//         {
//             return String::date(Carbon::createFromFormat('Y-n-j G:i:s', $this->created_at));
//         }

//         public function saveRoles($inputRoles)
//         {
//             if(! empty($inputRoles)) {
//                 $this->roles()->sync($inputRoles);
//             } else {
//                 $this->roles()->detach();
//             }
//         }

//         public function currentRoleIds()
//         {
//             $roles = $this->roles;
//             $roleIds = false;
//             if( !empty( $roles ) ) {
//                 $roleIds = array();
//                 foreach( $roles as &$role )
//                 {
//                     $roleIds[] = $role->id;
//                 }
//             }
//             return $roleIds;
//         }

//         public static function checkAuthAndRedirect($redirect, $ifValid=false)
//         {
//             // Get the user information
//             $user = Auth::user();
//             $redirectTo = false;

//             if(empty($user->id) && ! $ifValid) // Not logged in redirect, set session.
//             {
//                 Session::put('loginRedirect', $redirect);
//                 $redirectTo = Redirect::to('user/login')
//                     ->with( 'notice', Lang::get('user/user.login_first') );
//             }
//             elseif(!empty($user->id) && $ifValid) // Valid user, we want to redirect.
//             {
//                 $redirectTo = Redirect::to($redirect);
//             }

//             return array($user, $redirectTo);
//         }

//         public function currentUser()
//         {
//             return (new Confide(new ConfideEloquentRepository()))->user();
//         }

//         public function getReminderEmail()
//         {
//             return $this->email;
//         }

//     }

// ROLE---------------------------------
// use Zizaco\Entrust\EntrustRole;

// class Role extends EntrustRole {

//     public function validateRoles( array $roles )
//     {
//         $user = Confide::user();
//         $roleValidation = new stdClass();
//         foreach( $roles as $role )
//         {
//             // Make sure theres a valid user, then check role.
//             $roleValidation->$role = ( empty($user) ? false : $user->hasRole($role) );
//         }
//         return $roleValidation;
//     }

// PERMISION---------------------------------
// use Zizaco\Entrust\EntrustPermission;

// class Permission extends EntrustPermission
// {
//     public function preparePermissionsForDisplay($permissions)
//     {
//         // Get all the available permissions
//         $availablePermissions = $this->all()->toArray();

//         foreach($permissions as &$permission) {
//             array_walk($availablePermissions, function(&$value) use(&$permission){
//                 if($permission->name == $value['name']) {
//                     $value['checked'] = true;
//                 }
//             });
//         }
//         return $availablePermissions;
//     }

//     /**
//      * Convert from input array to savable array.
//      * @param $permissions
//      * @return array
//      */
//     public function preparePermissionsForSave( $permissions )
//     {
//         $availablePermissions = $this->all()->toArray();
//         $preparedPermissions = array();
//         foreach( $permissions as $permission => $value )
//         {
//             // If checkbox is selected
//             if( $value == '1' )
//             {
//                 // If permission exists
//                 array_walk($availablePermissions, function(&$value) use($permission, &$preparedPermissions){
//                     if($permission == (int)$value['id']) {
//                         $preparedPermissions[] = $permission;
//                     }
//                 });
//             }
//         }
//         return $preparedPermissions;
//     }
// }
    
//     USERTABLESEEDER-----------------
//     class UsersTableSeeder extends Seeder {

//     public function run()
//     {
//         DB::table('users')->delete();


//         $users = array(
//             array(
//                 'username'   => 'admin',
//                 'email'      => 'admin@example.org',
//                 'password'   => Hash::make('admin'),
//                 'confirmed'  => 1,
//                 'confirmation_code' => md5(microtime().Config::get('app.key')),
//                 'created_at' => new DateTime,
//                 'updated_at' => new DateTime,
//             ),
//             array(
//                 'username'   => 'moderator',
//                 'email'      => 'moderator@example.org',
//                 'password'   => Hash::make('moderator'),
//                 'confirmed'  => 1,
//                 'confirmation_code' => md5(microtime().Config::get('app.key')),
//                 'created_at' => new DateTime,
//                 'updated_at' => new DateTime,
//             ),
//             array(
//                 'username'   => 'user',
//                 'email'      => 'user@example.org',
//                 'password'   => Hash::make('user'),
//                 'confirmed'  => 1,
//                 'confirmation_code' => md5(microtime().Config::get('app.key')),
//                 'created_at' => new DateTime,
//                 'updated_at' => new DateTime,
//             )
//         );

//         DB::table('users')->insert( $users );
//     }

// }

// ROLESTABLESEEDER------------------------------------
// class RolesTableSeeder extends Seeder {

//     public function run()
//     {
//         DB::table('roles')->delete();

//         $adminRole = new Role;
//         $adminRole->name = 'adminRole';
//         $adminRole->save();

//         $standRole = new Role;
//         $standRole->name = 'userRole';
//         $standRole->save();

//         $modRole = new Role;
//         $modRole->name = 'modRole';
//         $modRole->save();

//         $user = User::where('username','=','admin')->first();
//         $user->attachRole( $adminRole );

//         $user = User::where('username','=','user')->first();
//         $user->attachRole( $standRole );

//         $user = User::where('username','=','moderator')->first();
//         $user->attachRole( $modRole );

//     }
// }


}
