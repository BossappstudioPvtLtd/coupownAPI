<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $fillable = ['subcategoryname','subcategory_id','category_id']; // Include 'category_id' in fillable

    // Define the inverse relationship with Category
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id', 'id');
    }
}
