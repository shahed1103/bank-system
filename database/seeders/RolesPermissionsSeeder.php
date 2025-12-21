<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Storage;


class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create roles
        $AdminRole = Role::create(['name' => 'Admin']);
        $ClientRole = Role::create(['name' => 'Client']);

        // 2. Create permissions
        $permissions = ['getAllTypes' , 'createAccount' , 'getAllStatues' , 'approve' , 
                        'reject' , 'total-balance' , 'close-hierarchy' , 'createTicket' , 
                        'getUserTickets'  , 'getTicketDetails' , 'reply' , 'changeStatus' , 
                        'getRecommendations'];

        foreach ($permissions as $permissionName) {
            Permission::findOrCreate($permissionName, 'web');
        }

      //assign permissions to roles
        // 3. Assign permissions

        $AdminRole->syncPermissions(['getAllTypes' , 'getAllStatues' , 'approve' , 'reject',
                                     'reply']);

        $ClientRole->syncPermissions(['getAllTypes' , 'createAccount' , 'getAllStatues' ,
                                      'total-balance' , 'close-hierarchy' , 'createTicket' ,
                                      'getUserTickets' , 'getTicketDetails' , 'getRecommendations' ,
                                      'reply']);


$sourcePath = public_path('uploads/seeder_photos/defualtProfilePhoto.png');
$targetPath = 'uploads/det/defualtProfilePhoto.png';

Storage::disk('public')->put($targetPath, File::get($sourcePath));


$admin = User::factory()->create([
    'role_id' => $AdminRole->id,
    'phone' => '09544117593',
    'first_name' => 'admin',
    'last_name' => 'admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'photo' => url(Storage::url($targetPath)),
    'id_photo' => url(Storage::url($targetPath)),
    'national_id' => '06060505072',
    'birth_date' => '2003-12-12', 
    'is_verified' => true
]);


$admin->assignRole($AdminRole);
//assign permissions with the role to the user
$permissions = $AdminRole->permissions()->pluck('name')->toArray();
$admin->givePermissionTo($permissions);


$clientUser = User::factory()->create([
    'role_id' => $ClientRole->id,
    'phone' => '0954411753',
    'first_name' => 'Client',
    'last_name' => 'Client',
    'email' => 'Client@example.com',
    'password' => bcrypt('password') ,
    'photo' => url(Storage::url($targetPath)),
    'id_photo' => url(Storage::url($targetPath)),
    'national_id' => '06060505082',
    'birth_date' => '2003-12-12', 
    'is_verified' => true
]);


$clientUser->assignRole($ClientRole);
//assign permissions with the role to the user
$permissions = $ClientRole->permissions()->pluck('name')->toArray();
$clientUser->givePermissionTo($permissions);
    }
}
