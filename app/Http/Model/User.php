<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];//排除不能填充的字段
}