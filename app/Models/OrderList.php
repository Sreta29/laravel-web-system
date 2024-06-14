<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderList extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'orderid',
        'orderdate',
        'zone',
        'email',
        'collectdate',
        'collector',
        'status',
        'add_address',
        'wastetype_id',
        'userid',
        'customerimg',
        'collectorimg',
        'phonenum'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /*protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
        
    ]; */

    public static function generateCustomOrderId()
    {
        
        //get current year
        $year = date('Y');

        //get lastest data
        $count = self::whereYear('created_at', $year)->count();

        $newNumber = str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        return "$newNumber/$year";
    }
}
