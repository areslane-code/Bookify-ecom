<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ["adresse", "coupon_id"];

    public function Books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->where("role", "0");
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public static function countOrders(): array
    {
        $users = DB::table('Orders')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $data = array_fill(0, 12, 0);

        foreach ($users as $user) {
            $data[$user->month - 1] = $user->count;
        }


        return $data;
    }
}
