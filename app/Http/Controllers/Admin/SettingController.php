<?php

namespace App\Http\Controllers\Admin;


use App\Models\Setting;
use Illuminate\Http\Request;
use Database\Seeders\SettingSeeder;
use App\Http\Controllers\Controller;
use App\Http\Services\ImageUploadService;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        if($settings == null)
        {
            $default = new SettingSeeder();
            $default->run();
            $settings = Setting::first();
        }
        $settings = Setting::first();
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request )
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting , ImageUploadService $imageService)
    {
        $inputs = $request->all();




        if($request->hasFile('logo'))
        {
            if(!empty($setting->logo)  and $setting->icon != 'default.png')
            {
                $imageService->remove($setting->logo);
            }

            $result = $imageService->uploadFile($request->file('logo'),'logo');
            if($result == false)
            {
             return Redirect()->route('admin.setting.index')->with('swal-error','اپلود عکس با خطا مواجه شده است ');
            }
            $inputs['logo'] = $result;
        }



        if($request->hasFile('icon'))
        {

            if(!empty($setting->icon) and $setting->icon != 'default.png')
            {

                $imageService->remove($setting->icon);
            }
            $resultIcon = $imageService->uploadFile($request->file('icon'),'icon');
            if($resultIcon == false)
            {
             return Redirect()->route('admin.setting.index')->with('swal-error','اپلود عکس با خطا مواجه شده است ');
            }
            $inputs['icon'] = $resultIcon;
        }



         $setting->update($inputs);
         return redirect()->route('admin.setting.index')->with('swal-success','سایت با موفقیت ساخته شد ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
      //
    }
}
