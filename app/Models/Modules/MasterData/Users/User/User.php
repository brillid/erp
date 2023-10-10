<?php

namespace App\Models\Modules\MasterData\Users;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'surname',
        'email',
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /*
    public function assignRoleToUser(Request $request, $userId, $roleId)
    {
        $user = User::find($userId);
        $role = Role::find($roleId);

        if ($user && $role) {
            $user->roles()->attach($role);
            // Redirect or return a response as needed
        } else {
            // Handle error, e.g., user or role not found
        }
    }

    public function checkUserRole(Request $request, $userId, $roleId)
    {
        $user = User::find($userId);

        if ($user && $user->hasRole($roleId)) {
            // User has the specified role
        } else {
            // User does not have the specified role
        }
    }

    public function hasRole($roleId)
    {
        return $this->roles->contains('id', $roleId);
    }

    public function hasPermission($permission)
    {
        return $this->roles->flatMap->permissions->contains('name', $permission);
    }
    */
}
