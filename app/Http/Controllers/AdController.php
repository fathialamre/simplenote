<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Department;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index')->with(['data' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all()->pluck('name', 'id');
        return view('ads.create')->with(['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $rules = [
            'department_id' => 'required',
            'company' => 'required|string|max:100',
            'address' => 'required|string|max:300',
            'activity' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'des' => 'required|string|max:400',
            'price' => 'required',
            'currency' => 'required',
            'city' => 'required',
        ];
        $messages = [
        ];
        $this->validate($request, $rules, $messages);

        try {
            $ad = new Ad();
            $ad->department_id = $request->department_id;
            $ad->company = $request->company;
            $ad->address = $request->address;
            $ad->activity = $request->activity;
            $ad->phone = $request->phone;
            $ad->des = $request->des;
            $ad->price = $request->price;
            $ad->currency = $request->currency;
            $ad->city = $request->city;
            $ad->image_url = '';
            $ad->user_id = auth()->id();
            $ad->save();

            if ($request->has("image")) {
                if ($request->image) {
                    $ad->clearMediaCollection("image");
                    $ad->addMedia($request->image)
                        ->preservingOriginal()
                        ->toMediaCollection();;
                }
            }

        } catch (\Exception $e) {
            return $e;
        }
        return redirect()->route('ads.index')->with('success','تمت عملية اضافة الاعلان بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all()->pluck('name', 'id');
        $ad = Ad::find($id);
        $data = [
            'departments' => $departments,
            'ad' => $ad,
        ];
        return view('ads.edit')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Ad $ad
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'department_id' => 'required',
            'company' => 'required|string|max:100',
            'address' => 'required|string|max:300',
            'activity' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'des' => 'required|string|max:400',
            'price' => 'required',
            'currency' => 'required',
            'city' => 'required',
        ];
        $messages = [
        ];
        $this->validate($request, $rules, $messages);

        try {
            $ad = Ad::find($id);
            $ad->department_id = $request->department_id;
            $ad->company = $request->company;
            $ad->address = $request->address;
            $ad->activity = $request->activity;
            $ad->phone = $request->phone;
            $ad->des = $request->des;
            $ad->price = $request->price;
            $ad->currency = $request->currency;
            $ad->city = $request->city;
            $ad->image_url = '';
            $ad->user_id = auth()->id();
            $ad->save();

            if ($request->has("image")) {
                if ($request->image) {
                    $ad->clearMediaCollection("image");
                    $ad->addMedia($request->image)
                        ->preservingOriginal()
                        ->toMediaCollection();;
                }
            }

        } catch (\Exception $e) {
            return $e;
        }

        return redirect()->route('ads.index')->with('success','تمت عملية تعديل الاعلان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Ad $ad
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return "a";
        try{
            $ad =  Ad::findOrfail($id);
            $ad->delete();
            return redirect()->route('ads.index')->with('success','تمت عملية حذف الاعلان بنجاح');

        }
        catch (\Exception $e){
            return redirect()->route('ads')->with('error','حدث خطأ ما');
        }
    }
}
