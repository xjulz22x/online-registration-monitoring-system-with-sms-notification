@extends('layouts.partials.main')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <span class="card-title"> Update Post</span>
                    <i class="ti-save text-muted"></i>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="POST" action="{{route('update-post' , $getPost->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Post Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Post Title" name="title" value="{{ old('title' , $getPost->title)}}" @error('title') is-invalid @enderror>
                       @error('title')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Post Content</label>
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content" value="{{old('content')}}" @error('content') is-invalid @enderror>{{$getPost->content}}</textarea>
                       @error('content')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Post Image</label>
                      <input type="file" class="form-control" id="exampleInputName1" placeholder="Post Title" name="post_image" value="{{ old('post_image')}}" @error('post_image') is-invalid @enderror>
                       @error('post_image')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()