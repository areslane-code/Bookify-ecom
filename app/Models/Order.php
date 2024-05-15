<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{

    use HasFactory;

    protected $fillable = ["adresse", "coupon_id"];

    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot("quantity");
    }

    public function status()
    {
        return $this->belongsTo(Order_status::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class)->where("role", "0");
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    // count orders of previous week
    public static function countOrdersPreviousWeek(): array
    {
        // Calculate the start and end dates for the previous week
        $startDate = now()->subWeek()->startOfWeek(); // Start of the previous week
        $endDate = now()->subWeek()->endOfWeek();     // End of the previous week

        $orders = DB::table('Orders')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('DAY(created_at) as day'),
                DB::raw('COUNT(*) as count')
            )
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by the previous week's date range
            ->groupBy('year', 'month', 'day')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->orderBy('day', 'asc')
            ->get();

        $data = [];

        foreach ($orders as $order) {
            $data[] = [
                'year' => $order->year,
                'month' => $order->month,
                'day' => $order->day,
                'count' => $order->count,
            ];
        }

        return $data;
    }





    // count orders of last year

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

    // count form all time

    public static function countOrdersAllTime(): array
    {
        $orders = DB::table('Orders')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $data = [];

        foreach ($orders as $order) {
            $data[] = [
                'year' => $order->year,
                'month' => $order->month,
                'count' => $order->count,
            ];
        }

        return $data;
    }
}
