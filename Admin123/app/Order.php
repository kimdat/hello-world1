<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // khai báo table ứng với model
    protected $table = "order";
    // khai báo trường khóa chính
    protected $primaryKey = 'id';
    // mặc định khóa chính sẽ tự động tăng
    public $incrementing = true;   // false: khóa chỉnh sẽ không tự động tăng
    protected $fillable = ['id','product_id'];
}
