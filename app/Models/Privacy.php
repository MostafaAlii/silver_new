<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Privacy extends Model {
    use HasFactory, Translatable;
    protected $table = "privacies";
    protected $fillable = ['image'];
    protected $with = ['translations'];
    public $translatedAttributes = ['note'];
    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        return asset('dashboard/img/privacy/' . $this->image);
    }
}
