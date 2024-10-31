<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopDetails extends Model
{
    use HasFactory;

    protected $table = 'shop_details';
    protected $primaryKey = 'id';
    protected $fillable = ['shop_id', 'subscriber_id','shoplogo','name','phone','websitelink','category_id','subcategory_id','pincode','state','city','buildingnumber','arearoadname','nearbylandmark'];
}
