<?php
namespace App\DataTables\Dashboard\Admin;
use App\Models\Hour;
use App\DataTables\Base\BaseDataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class HourDataTable extends BaseDataTable {
    public function __construct(DataTableRequest $request) {
        parent::__construct(new Hour());
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Hour $hour) {
                return view('dashboard.admin.hours.btn.actions', compact('hour'));
            })
            ->editColumn('created_at', function (Hour $hour) {
                return $this->formatBadge($this->formatDate($hour->created_at));
            })
            ->editColumn('updated_at', function (Hour $hour) {
                return $this->formatBadge($this->formatDate($hour->updated_at));
            })
            ->editColumn('category_car_id', function (Hour $hour) {
                return $hour?->category_car?->name;
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'category_car_id']); 
    }

    public function query(): QueryBuilder {
        return Hour::query()->with(['category_car']);
    }

    public function getColumns(): array {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#', 'orderable' => false, 'searchable' => false,],
            ['name' => 'category_car_id', 'data' => 'category_car_id', 'title' => 'Category Car',],
            ['name' => 'number_hours', 'data' => 'number_hours', 'title' => 'Hours',],
            ['name' => 'offer_price', 'data' => 'offer_price', 'title' => 'Offer Price',],
            ['name' => 'discount_hours', 'data' => 'discount_hours', 'title' => 'Discount Hours',],
            ['name' => 'price_hours', 'data' => 'price_hours', 'title' => 'Price Hours',],
            ['name' => 'price_premium', 'data' => 'price_premium', 'title' => 'Price Premium',],
            ['name' => 'offer_price_premium', 'data' => 'offer_price_premium', 'title' => 'Offer Price Premium',],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created_at', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update_at', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false,],
        ];
    }
}