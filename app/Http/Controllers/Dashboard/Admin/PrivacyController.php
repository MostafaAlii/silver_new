<?php
namespace App\Http\Controllers\Dashboard\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Privacy};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class PrivacyController extends Controller {
    public function index() {
        return view('dashboard.general.cms.privacy.index', ['title' => 'Main Privacy','privace' => Privacy::first()]);
    }

    public function update(Request $request) {
        $request->validate([
            'note' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $privacy = Privacy::first();
        $request_data = $request->except(['image']);
        if ($request->hasFile('image')) {
            if ($privacy && $privacy->image != 'default_admin.jpg') {
                Storage::disk('upload_image')->delete('/privacy/' . $privacy->image);
            }
            // Save the new image
            $image = $request->file('image');
            $imagePath = 'dashboard/img/privacy/' . $image->hashName();
            Image::make($image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path($imagePath));
            $request_data['image'] = $image->hashName();
        }
        if ($privacy) {
            $privacy->update($request_data);
        } else {
            Privacy::create($request_data);
        }
        Session::flash('message', 'Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.aboutUs')->with('success', 'About updated successfully');
    }
}