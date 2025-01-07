<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Art extends Model
{
    protected $table = 'arts';
    protected $fillable = ['title', 'description', 'category_id', 'created_by', 'C:\eindopdracht\_images'];
}
