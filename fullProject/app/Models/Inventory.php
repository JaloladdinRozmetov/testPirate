<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'employee_id', 'status'];


    /**
     * @return Collection|array
     */
    public static function getOpenedInventories(): Collection|array
    {
        return self::query()->where('status', 'opened')->get();
    }

    /**
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @param $inventoryId
     * @return Builder|Builder[]|Collection|Model|null
     */
    public static function getInventoryWithEmployee($inventoryId): Model|Collection|Builder|array|null
    {
        return self::with('employee')->find($inventoryId);
    }
}
