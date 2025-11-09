<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'address',
        'building',
        'category_id',
        'detail',
    ];

    /**
     * カテゴリとのリレーション
     * 1件のお問い合わせは1つのカテゴリに属する
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 電話番号を結合して表示するアクセサ
     */
    public function getFullTelAttribute()
    {
        return "{$this->tel1}-{$this->tel2}-{$this->tel3}";
    }

    /**
     * 氏名を結合して表示するアクセサ
     */
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }
}
