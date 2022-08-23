<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Services\ImageUploadService;
use App\Http\Services\VideoUploadService;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request , ImageUploadService $imageService , VideoUploadService $videoService )
    {
        $inputs = $request->all();


       $realTimestampStart = substr($request->published_at, 0, 10);
       $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);

       if($request->hasFile('image'))
       {

           $result = $imageService->uploadFile($request->file('image'));
           if($result == false)
           {
            return Redirect()->route('admin.banner.index')->with('swal-error','اپلود عکس با خطا مواجه شده است ');
           }
           $inputs['image'] = $result;
       }
        $banners = Banner::create($inputs);
        return Redirect()->route('admin.banner.index')->with('swal-success','بنر با موفقیت ساخته شد ');

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
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Banner $banner, ImageUploadService $imageService , VideoUploadService $videoService)
    {
        $inputs = $request->all();


        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);


        if($request->hasFile('image'))
        {

            if(!empty($banner->image))
            {
                $imageService->remove($banner->image);
            }
            $result = $imageService->uploadFile($request->file('image'));
            if($result == false)
            {
             return Redirect()->route('admin.banner.index')->with('swal-error','اپلود عکس با خطا مواجه شده است ');
            }
            $inputs['image'] = $result;
        }

        $banner->update($inputs);
        return Redirect()->route('admin.banner.index')->with('swal-success','بنر با موفقیت ساخته شد ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
       $banner->delete();
       return Redirect()->route('admin.banner.index')->with('swal-success','بنر با موفقیت حذف شد ');
    }
}
