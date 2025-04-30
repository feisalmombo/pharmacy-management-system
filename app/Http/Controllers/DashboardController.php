<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Notifications\StockAlert;
use App\Events\ProductReachedLowStock;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $title = "dashboard";

        // Get current date minus 6 months
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        // Products older than 6 months
        // $products = Purchase::whereDate('expiry_date', '<=', $sixMonthsAgo)->get();
        // $total_purchases = Purchase::where('expiry_date','=',Carbon::now())->count();

        $total_purchases = Purchase::whereDate('expiry_date', '<=', $sixMonthsAgo)->count();
        $total_categories = Category::count();
        $total_suppliers = Supplier::count();
        $total_sales = Sales::count();

        $pieChart = app()->chartjs
                ->name('pieChart')
                ->type('pie')
                ->size(['width' => 300, 'height' => 100])
                ->labels(['Total Purchases', 'Total Suppliers','Total Sales'])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                        'data' => [$total_purchases, $total_suppliers,$total_sales]
                    ]
                ])
                ->options([]);



        // $total_expired_products = Purchase::whereDate('expiry_date', '=', Carbon::now())->count();

        // Get current date minus 6 months
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        // Products older than 6 months
        // $products = Purchase::whereDate('expiry_date', '<=', $sixMonthsAgo)->get();

        $total_expired_products = Purchase::whereDate('expiry_date', '<=', $sixMonthsAgo)->count();


        $latest_sales = Sales::whereDate('created_at','=',Carbon::now())->get();
        $today_sales = Sales::whereDate('created_at','=',Carbon::now())->sum('total_price');


        $activity = Auth::user()->activiti;
        $customer_id = Auth::user()->id; //customer-person

        // return json_encode($customer_id);


        if($activity === 'customer-person'){
            $ordersCount = DB::table('orders')
            ->join('users','orders.user_id','users.id')
            ->where('orders.user_id',$customer_id)
            ->latest()
            ->count();
            }else{
                    $ordersCount = DB::table('orders')
                    ->join('users','orders.user_id','users.id')
                    ->where('orders.user_id',$customer_id)
                    ->latest()
                    ->count();
            }
            // return json_encode($ordersCount);

            $customerPressOrderCount = DB::table('orders')
            ->join('users','orders.user_id','users.id')
            ->where('orders.user_id',$customer_id)
            ->latest()
            ->count();
            // return json_encode($customerPressOrderCount);

            // return view('dashboard',compact(
            // 'title','pieChart','total_expired_products',
            // 'latest_sales','today_sales','total_categories'

            return view('dashboard')
            ->with('title', $title)
            ->with('pieChart', $pieChart)
            ->with('total_expired_products', $total_expired_products)
            ->with('latest_sales', $latest_sales)
            ->with('today_sales', $today_sales)
            ->with('total_categories', $total_categories)
            ->with('customerPressOrderCount', $customerPressOrderCount);
    }
}
