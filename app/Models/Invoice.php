<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'productid',
        'productname',
        'price',
        'qty',
        'tax',
        'total',
        'desc',
        'net',
        'userid',
        'username',

    ];
}

$table->integer('productid');
            $table->string('productname');
            $table->integer('qty');
            $table->float('price');
            $table->float('tax');
            $table->float('total');
            $table->float('desc');
            $table->float('net');
            $table->integer('userid');
            $table->string('username');