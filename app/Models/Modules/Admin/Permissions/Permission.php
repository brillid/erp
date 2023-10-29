<?php

namespace App\Models\Modules\Admin\Permissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Modules\MasterData\Users\Roles\Role;

/**
 * Class Permission
 *
 * This model represents a permission that can be associated with roles.
 */
class Permission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get the roles associated with this permission.
     *
     * @return BelongsToMany<\App\Models\Modules\MasterData\Users\Roles\Role>
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
