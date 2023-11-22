<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Dashboard\{Admins\HourService,General\GeneralService};
use App\DataTables\Dashboard\Admin\HourDataTable;
class HourController extends Controller {
    public function __construct(protected HourDataTable $dataTable, protected HourService $hourService, protected GeneralService $generalService) {
        $this->dataTable = $dataTable;
        $this->hourService = $hourService;
        $this->generalService = $generalService;
    }

    public function index() {
        $data = [
            'title' => 'Hours',
            'categoryCar' => $this->generalService->getCategoryCar(),
        ];
        return $this->dataTable->render('dashboard.admin.hours.index',  compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
