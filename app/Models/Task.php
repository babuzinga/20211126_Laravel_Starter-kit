<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $keyType = 'string';

  protected $fillable = [
    'title',
    'task',
    'status',
    'updated_at',
  ];

  /**
   * Извлечение владельца задачи
   * https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function owner()
  {
    return $this->belongsTo(User::class);
  }

  public function isDelete()
  {
    return $this->status == 2;
  }
}
