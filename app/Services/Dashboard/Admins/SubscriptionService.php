<?php
namespace App\Services\Dashboard\Admins;
use App\Models\Subscription;
class SubscriptionService {
    public function create($data) {
        $data['admin_id'] = get_user_data()->id;
        return Subscription::create($data);
    }
    
    public function update($subscriptionId, $data) {
        $data['admin_id'] = get_user_data()->id;
        $subscription = Subscription::findOrFail($subscriptionId);
        $subscription->fill($data);
        $subscription->save();
        return $subscription;
    }

    public function delete($subscriptionId) {
        $subscription = subscription::findOrFail($subscriptionId);
        $subscription->delete();
        return $subscription;
    }

    public function updateStatus($subscriptionId, $status) {
        $subscription = subscription::findOrFail($subscriptionId);
        $subscription->status = $status;
        $subscription->save();
        return $subscription;
    }
}