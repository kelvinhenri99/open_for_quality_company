<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $hidden = [
        'id',
        'user_id',
    ];

    protected $fillable = [
        'id',
        'code',
        'name',
        'cpf_cnpj',
        'cep',
        'street',
        'number',
        'district',
        'city',
        'uf',
        'complement',
        'phone',
        'credit_limit',
        'validity',
    ];

    protected $guarded = [];

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'user_id';

    public function clients(){

        return $this->from('clients')
                    ->simplePaginate(20);
    }

    public function client($id){

        return $this->from('clients')
                    ->where('user_id', $id)
                    ->limit(1)
                    ->simplePaginate(20);
    }

}
