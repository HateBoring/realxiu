<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Article_content extends Model
{
    protected $table = 'art_content';
    protected $primaryKey = 'art_id';
    public $timestamps = false;
    protected $guarded=['id'];//排除不能填充的字段
}