<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    protected $fillable = ['name', 'category_id'];

    public $timestamps = false;

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getParentAttribute() {
        if ($this->category_id == 0) return null;
        return Category::find($this->category_id);
    }

    public function getChildrenAttribute() {
        return Category::where('category_id', $this->id)->get();
    }

}
