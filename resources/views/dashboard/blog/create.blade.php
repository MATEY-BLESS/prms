@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 600px;
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }
</style>
<div class="d-flex justify-content-between">
    <h4>Add Article to Blog</h4>

    <h4>
        <a href="{{route('dashboard.blog.index')}}" class="btn btn-success btn-sm">CANCEL</a>
    </h4>
</div>


    <div class="section-container">
        <div class="col-md-12">
            <form class="p-2" action="{{route('dashboard.blog.store')}}"
                        method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">

                <!-- title -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" placeholder="Enter title"
                            name="title" value="{{old('title')}}"
                            required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>

                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <!-- categories -->
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="category" class="form-label">Category</label>
                      <br>
                      <select class="form-control @error('category') is-invalid @enderror"
                              id="category" name="category"
                              value="{{old('category')}}"
                              style="width:100%;"
                              required>

                              <option>Select Category</option>
                        @forelse ($categories as $category)

                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                            <option value="#">No categories added</option>
                        @endforelse

                      </select>

                      @error('category')
                      <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                </div>

                <!-- Tags -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="tags" class="form-label">Tag</label>
                    <br>
                    <select class="form-control @error('tags') is-invalid @enderror"
                            id="tag" name="tags[]"
                            value="{{old('tags')}}"
                            style="width:100%;"
                            multiple>

                        <option value="select">Select Tag(s)</option>
                        @forelse ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @empty
                            <option value="#">No tags added</option>
                        @endforelse

                    </select>

                    @error('tags')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>

                </div>
              </div>


              <div class="row">
                   <!-- status -->
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="category" class="form-label">Status</label>
                      <select class="form-control @error('status') is-invalid @enderror"
                              id="#" name="status"
                              value="{{old('status')}}"
                              required>

                        <option value="">Select</option>
                        <option value="active">Publish</option>
                        <option value="inactive">Draft</option>
                      </select>

                      @error('status')
                      <small class="text-danger">{{$message}}</small>
                      @enderror

                    </div>
                </div>

                <!-- source -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="source" class="form-label">Source</label>
                    <input type="text" class="form-control @error('source') is-invalid @enderror"
                            id="#" placeholder="Enter Source"
                            name="source" value="{{old('source')}}"
                            required>

                    @error('source')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <!-- Second Source -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="second_source" class="form-label">Third Party Source</label>
                    <input type="text" class="form-control @error('second_source') is-invalid @enderror"
                            id="#" placeholder="Third party source if avaialble"
                            name="second_source"
                            value="{{old('second_source')}}">

                    @error('second_source')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>


              <div class="row my-3">
                  <!-- File upload -->
                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="formFile" class="form-label">File Upload</label>
                        <input  class="form-control @error('post_image') is-invalid @enderror"
                                type="file" id="formFile"
                                name="post_image">

                        @error('post_image')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  </div>


                <!-- Image or file caption -->
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="image_caption" class="form-label">Image Caption (needed)</label>
                      <input type="text" class="form-control @error('image_caption') is-invalid @enderror"
                              id="#" placeholder="Give a caption to the image"
                              name="image_caption" value="{{old('image_caption')}}"
                              required>

                      @error('image_caption')
                      <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                  </div>


              </div>

              </div>

              <!-- Body -->
              <div class="form-group my-3">
                <label for="body" class="form-label">Content</label>
                <textarea class="form-control" id="ck-editor"
                          rows="10" name="body"
                          value="{{old('body')}}"></textarea>

                @error('body')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>

              <button class="btn btn-primary my-3" type="submit">CREATE</button>

            </form>
        </div>
    </div>

@endsection
