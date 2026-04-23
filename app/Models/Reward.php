<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'category', 'cost', 'description', 'item_id', 'image_url', 'display_order'])]
class Reward extends Model
{
}
