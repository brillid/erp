<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Method to attach a permission to the role
    public function grandPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->firstOrFail();
        } else {
            $this->permissions()->syncWithoutDetaching([$permission->id]);
        }
    }

    // Method to detach a permission from the role
    public function revokePermission($permission)
    {
        if(is_string($permission)) {
            $permission = Permission::where('name', $permission)->firstOrFail();
        } else {
            $this->permission()->detach($permission->id);
        }
    }
}
