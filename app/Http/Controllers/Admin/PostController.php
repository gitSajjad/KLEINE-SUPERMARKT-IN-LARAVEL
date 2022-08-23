<?php

namespace App\Http\Controllers\Admin;


use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Services\ImageUploadService;
use App\Http\Services\VideoUploadService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();
       return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request , ImageUploadService $imageService , VideoUploadService $videoService)
    {

       $inputs = $request->all();

       $realTimestampStart = substr($request->published_at, 0, 10);
       $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);

       if($request->hasFile('image'))
       {

           $result = $imageService->uploadFile($request->file('image'));
           if($result == false)
           {
            return Redirect()->route('admin.post.index')->with('swal-error','اپلود عکس با خطا مواجه شده است ');
           }
           $inputs['image'] = $result;
       }

       if($request->hasFile('video'))
       {
           $videoResult = $videoService->uploadVideo($request->file('video'));
           if($videoResult == false)
           {
            return Redirect()->route('admin.post.index')->with('swal-error','اپلود فیلم با خطا مواجه شده است ');
           }
           $inputs['video'] = $videoResult;
       }

       $inputs['user_id'] = 4;
       $posts = Post::create($inputs);
       return Redirect()->route('admin.post.index')->with('swal-success','پست با موفقیت ساخته شد ');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.post.edit',compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post , ImageUploadService $imageService , VideoUploadService $videoService)
    {
        $inputs = $request->all();


        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);


        if($request->hasFile('image'))
        {

            if(!empty($post->image))
            {
                $imageService->remove($post->image);
            }
            $result = $imageService->uploadFile($request->file('image'));
            if($result == false)
            {
             return Redirect()->route('admin.post.index')->with('swal-error','اپلود عکس با خطا مواجه شده است ');
            }
            $inputs['image'] = $result;
        }

        if($request->hasFile('video'))
        {
            if(!empty($post->image))
            {
                $videoService->remove($post->video);
            }

            $videoResult = $videoService->uploadVideo($request->file('video'));
            if($videoResult == false)
            {
             return Redirect()->route('admin.post.index')->with('swal-error','اپلود فیلم با خطا مواجه شده است ');
            }
            $inputs['video'] = $videoResult;
        }


        $post->update($inputs);
        return Redirect()->route('admin.post.index')->with('swal-success',' پست با موفقیت اپدیت شد ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('swal-success','حذف با موفقیت ثبت شد ');
    }

    public function postSelected(Post $post)
    {

        $posts = ($post->selected == '0') ? '1' : '0';
        $post->update(['selected'=>$posts]);
        return redirect()->route('admin.post.index')->with('swal-success',' با موفقیت انجام شد');

    }

    

    public function postBreaking(Post $post)
    {

        $posts = ($post->breaking_news == '0') ? '1' : '0';
        $post->update(['breaking_news'=>$posts]);
        return redirect()->route('admin.post.index')->with('swal-success',' با موفقیت انجام شد');

    }




}
