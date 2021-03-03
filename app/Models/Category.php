<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Add new category
     *
     * @param $data array
     */
    public function addCategory(array $data){
        $category = Category::create([
            'name' => $data['name'],
        ]);
        return $category;
    }

    /**
     * Update Category
     *
     * @param $data array
     */
    public function updateCategory(array $data){
        $category = Category::whereId($data['id'])->firstOrFail();
        $category->name = $data['name'];
        $category->save();
        return $category;
    }

    /**
     * Delete Category
     *
     * @param $id
     */
    public function deleteCategory($id){
        Category::whereId($id)->delete();
    }

}
