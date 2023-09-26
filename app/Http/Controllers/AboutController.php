<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $contact = config('about');
        return view('about', ['about' => $contact]);
    }

    public function update(Request $request)
    {
        // Handle the image upload
        // Validation rules
        $rules = [
            'description' => 'required|string|max:5000', // Assuming a max length of 5000 characters for the description.
            'email' => 'required|email|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'youtupe_link' => 'nullable|url|max:255',
            'linked_link' => 'nullable|url|max:255',
            'phone_number' => 'required|string|max:15', // Assuming a max length of 15 digits for phone numbers.
            'whats_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Assuming a max image size of 2MB.
        ];

        $request->validate($rules);
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $data = [
            'description' => $request->input('description'),
            'email' => $request->input('email'),
            'facebook_link' => $request->input('facebook_link'),
            'twitter_link' => $request->input('twitter_link'),
            'instagram_link' => $request->input('instagram_link'),
            'linked_link' => $request->input('linked_link'),
            'youtupe_link' => $request->input('youtupe_link'),
            'phone_number' => $request->input('phone_number'),
            'whats_number' => $request->input('whats_number'),
            'address' => $request->input('address'),
        ];

        if ($imageName) {
            $data['image'] = $imageName;
        }else{
            $data['image'] = '1.png';
        }

        $path = config_path('about.php');

        if (File::exists($path)) {
            $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
            File::put($path, $content);
            Config::set('contact', $data);
            return redirect()->back()->with('success', 'تم تحديث صفحة من نحن بنجاح');
        } else {
            return redirect()->back()->with('error', 'Contact page configuration file not found.');
        }
    }


    public function edit()
    {
        $contact = config('about');
        return view('dashboard.about.edit', ['about' => $contact]);
    }
}
