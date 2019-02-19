<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\Chart2;


use App\Search;

use DB;

class ChartController extends Controller
{
    public function piechart()
    {
        return view('admin.piechart');
    }
public function fetchchartdate(){
    $arrayofMostInserted=[];
    $arrayofMostInserted[0]=['Category','Num Of Products Inserted'];
        $MostInserted=DB::Select("select count(products.catId) as count 
                                  ,categories.categoryName from products,categories
                                  where products.catId = categories.id group by products.catId,categories.categoryName");
        $c=1;
        foreach($MostInserted as $data) {
            $arrayofMostInserted[$c] =[ $data->categoryName, $data->count];
            $c+=1;
        }
    echo json_encode($arrayofMostInserted);

}

    public function fetchproductspostedeveryday()
    {
        $arrayofInserteddaily=[];
        $arrayofInserteddaily[0]=['day','Num Of Products Inserted'];
       $products=DB::Select('SELECT date( created_at ) AS day, COUNT(id) AS num_products FROM products
                GROUP BY date(created_at)');
        $c=1;
        foreach($products as $data) {
            $arrayofInserteddaily[$c] =[ $data->day, $data->num_products];
            $c+=1;
        }

        echo json_encode($arrayofInserteddaily);
    }
    public function makeChart($type)
    {
        /*  switch ($type)
        {
            case 'bar':
                $searchs = Search::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
                $chart =Charts::database($searchs, 'bar', 'highcharts')
                    ->title("Monthly new Register Users")
                    ->elementLabel("Total Users")
                    ->dimensions(1000, 500)
                    ->responsive(true)
                    ->groupByMonth(date('Y'), true);
                break;
    case 'pie':
        $chart = Charts::create('pie', 'highcharts')
                    ->title('HDTuto.com Laravel Pie Chart')
                    ->labels(['Codeigniter', 'Laravel', 'PHP'])
                    ->values([5,10,20])
                    ->dimensions(1000,500)
                    ->responsive(true);
                break;
            case 'donut':
                $chart = Charts::create('donut', 'highcharts')
                    ->title('HDTuto.com Laravel Donut Chart')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([5,10,20])
                    ->dimensions(1000,500)
                    ->responsive(true);
                break;
            case 'line':
                $chart = Charts::create('line', 'highcharts')
                    ->title('HDTuto.com Laravel Line Chart')
                    ->elementLabel('HDTuto.com Laravel Line Chart Lable')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([5,10,20])
                    ->dimensions(1000,500)
                    ->responsive(true);
                break;
            case 'area':
                $chart = Charts::create('area', 'highcharts')
                    ->title('HDTuto.com Laravel Area Chart')
                    ->elementLabel('HDTuto.com Laravel Line Chart label')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([5,10,20])
                    ->dimensions(1000,500)
                    ->responsive(true);
                break;
            case 'geo':
                $chart = Charts::create('geo', 'highcharts')
                    ->title('HDTuto.com Laravel GEO Chart')
                    ->elementLabel('HDTuto.com Laravel GEO Chart label')
                    ->labels(['ES', 'FR', 'RU'])
                    ->colors(['#3D3D3D', '#985689'])
                    ->values([5,10,20])
                    ->dimensions(1000,500)
                    ->responsive(true);
                break;
            default:
                # code...
                break;
        }
       return view('user.charts', compact('chart'));
     */

        $searchs = Search::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();
        $chart = new Chart2();
        $chart->labels($searchs->keys());
        $chart->dataset('My dataset', 'line', $searchs->values());
        $chart->loaderColor('red');
        /*$chart =Charts::database($searchs, 'bar', 'highcharts')
            ->title("Monthly new Register Users")
            ->elementLabel("Total Users")
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);
*/
        return view('user.charts', compact('chart'));
       }
}
