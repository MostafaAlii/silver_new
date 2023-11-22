<?php
namespace App\Services\Dashboard\Admins;
use App\Models\Hour;
class HourService {
    public function create($data) {
        return Hour::create($data);
    }
    
    public function update($hourId, $data) {
        $hour = Hour::findOrFail($hourId);
        $hour->fill($data);
        $hour->save();
        return $hour;
    }

    public function delete($hourId) {
        $hour = Hour::findOrFail($hourId);
        $hour->delete();
        return $hour;
    }
}