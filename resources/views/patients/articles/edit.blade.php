@extends('layouts.accounts.user-dashboard')
@section('content')
<style>
    .section-container{
        min-height: 600px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }
</style>
<div class="d-flex justify-content-between">
    <h4>Edit Article</h4>

    <h4>
        <a href="{{route('dashboard.user.article.index')}}" class="btn btn-success btn-sm">CANCEL</a>
    </h4>
</div>
<div class="col-md-12">

    <div class="section-container">
        <form class="p-2" action="{{route('dashboard.user.article.update', $article->id)}}"
                    method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
            <!-- title -->
            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title" placeholder="Enter title"
                        name="title" value="{{$article->title}}"
                        required>
                <div class="valid-feedback">
                    Looks good!
                </div>

                @error('title')
                <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category" class="form-label">category</label>
                    <br>
                    <select class="form-control @error('category') is-invalid @enderror"
                            multiple id="category" name="category"
                            value="{{old('category')}}"
                            style="width:100%;">

                    @forelse ($article->categories as $category)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                    @empty

                    @endforelse

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                    </select>

                    @error('category')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <!-- Tags -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category" class="form-label">Tag</label>
                    <br>
                    <select class="form-control @error('tags') is-invalid @enderror"
                            multiple id="tag" name="tags[]"
                            value="{{old('tags')}}"
                            style="width:100%;">

                    @forelse ($article->tags as $tag)
                        <option selected value="{{$tag->id}}">{{$tag->name}}</option>
                    @empty

                    @endforelse

                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach

                    </select>

                    @error('tag')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <!-- status -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror"
                                id="#" name="status"
                                value="{{old('status')}}"
                                required>

                            <option selected value="{{$article->status}}">{{$article->status}}</option>
                            @if ($article->status == "active")
                                <option value="inactive">Draft</option>
                            @else
                                <option value="active">Publish</option>
                            @endif
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
                            name="source" value="{{$article->source}}"
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
                            id="#" placeholder="third party source or your name"
                            name="second_source"
                            value="{{$article->second_source}}">

                    @error('second_source')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>
            </div>

            <div class="row my-3">
                {{-- existing image --}}
                <div class="col-md-4">
                    <label for="existingImage" class="form-label">Post Image</label>
                    <br>
                    <img src="{{asset($article->post_image)}}" width="100%" height="100">
                </div>

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
                        name="image_caption" value="{{$article->image_caption}}"
                        required>

                @error('image_caption')
                <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
            </div>
            </div>

            <!-- Body -->
            <div class="form-group my-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="ck-editor"
                        rows="20" name="body"
                        value="">{{$article->body}}</textarea>

            @error('body')
            <small class="text-danger">{{$message}}</small>
            @enderror
            </div>

            <div>
            <button class="btn btn-primary mb-3" type="submit">UPDATE</button>
            </div>


        </form>
    </div>
</div>


@endsection
