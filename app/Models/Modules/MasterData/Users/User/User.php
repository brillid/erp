<?php

namespace App\Models\Modules\MasterData\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Modules\MasterData\Users\Roles\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class User
 *
 * This model represents a user in the application.
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * Get the roles associated with the user.
     *
     * @return BelongsToMany<Role>
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check if the user has a role with a specific permission.
     *
     * @param string $permission
     * @return bool
     */
    public function hasRoleWithPermission($permission)
    {
        return $this->roles->flatMap(function (Role $role) {
            return $role->permissions->pluck('name');
        })->contains($permission);
    }
}
