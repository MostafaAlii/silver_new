<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Dashboard\Admin\SubscriptionDataTable;
use App\Services\Dashboard\{Admins\SubscriptionService};
use App\Http\Requests\Dashboard\Admin\SubscriptionRequestValidation;
class SubscriptionController extends Controller {
    public function __construct(protected SubscriptionDataTable $dataTable,protected SubscriptionService $subscriptionService) {
        $this->dataTable = $dataTable;
        $this->subscriptionService = $subscriptionService;
    }
    public function index() {
        $data = [
            'title' => 'Subscriptions',
        ];
        return $this->dataTable->render('dashboard.admin.subscriptions.index',  compact('data'));
    }

    public function store(SubscriptionRequestValidation $request) {
        try {
            $requestData = $request->validated();
            $this->subscriptionService->create($requestData);
            return redirect()->route('subscriptions.index')->with('success', 'subscriptions created successfully');
        } catch (\Exception $e) {
            return redirect()->route('subscriptions.index')->with('error', 'An error occurred while creating the subscriptions');
        }
    }

    public function update(SubscriptionRequestValidation $request, $subscriptionId) {
        try {
            $requestData = $request->validated();
            $this->subscriptionService->update($subscriptionId, $requestData);
            return redirect()->route('subscriptions.index')->with('success', 'subscriptions updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('subscriptions.index')->with('error', 'An error occurred while updating the subscriptions');
        }
    }

    public function updateStatus(Request $request, $subscriptionId) {
        try {
            $this->subscriptionService->updateStatus($subscriptionId, $request->status);
            return redirect()->route('subscriptions.index')->with('success', 'subscriptions password updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('subscriptions.index')->with('error', 'An error occurred while updating the subscriptions');
        }
    }

    public function destroy($id) {  
        try {
            $this->subscriptionService->delete($id);
            return redirect()->route('subscriptions.index')->with('success', 'subscriptions deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('subscriptions.index')->with('error', 'An error occurred while deleting the subscriptions');
        }
    }
}
