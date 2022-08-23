@extends('admin.layouts.master')
@section('title')
صفحه اصلی پست ها
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="{{ route('admin.post.create') }}" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of posts</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>summary</th>
                    <th>view</th>
                    <th>video</th>
                    <th>status</th>
                    <th>user ID</th>
                    <th>cat ID</th>
                    <th>image</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                <tr>
                    <td>

              {{ $loop->iteration }}

                    </td>
                    <td>
                      {{ $post->title  }}
                    <td>
                     {{ $post->summary }}
                     </td>
                    <td>
                     {{ $post->view }}
                    </td>
                    <td>

                        <video width="320" height="240" controls>
                          <source src="{{ asset($post->video) }}" type="video/mp4">
                        </video>
                       </td>

                    <td>
                        @if($post->breaking_news == 1)
                      <span class="badge badge-success">#breaking_news</span>
                     @endif
                     @if($post->selected == 1)
                         <span class="badge badge-dark">#editor_selected</span>
                         @endif
                    </td>
                    <td>
                    {{ $post->user->username }}
                    </td>
                    <td>
                        {{ $post->category->name }}
                    </td>
                    <td>
                        <img style="width: 80px;" src="{{ asset($post->image) }}" alt="">
                    </td>

                <td style="width: 25rem;">


                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="{{ route('admin.post.postBreaking',$post->id) }}">
                        @if($post->breaking_news == 0)
                    add breaking news
                    @else
                    remove breaking news
                    @endif
                        </a>

                        <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="{{ route('admin.post.postSelected',$post->id) }}">
                            @if($post->selected == 0)
                        add selected news
                        @else
                        remove selected news
                        @endif
                            </a>


                        <hr class="my-1" />

                        <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.post.edit',$post->id) }}">edit</a>

                        <form  class="d-inline delete" action="{{ route('admin.post.destroy',$post->id) }}" method="POST">

                            @csrf
                            @method('delete')

                            <button class="btn btn-danger btn-sm">Delete</button>
                         </form>

                </td>
                </tr>

                @endforeach

                </tbody>

                </table>
        </div>

        @include('alerts.sweetalert.delete-confirm' , ['className' => 'delete'])
@endsection
