<?php 
namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;

class AuthRepository extends BaseRepository implements AuthInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }
}