@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 190px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }


</style>
<div class="d-flex justify-content-between">
    <h4>Add Standard Page</h4>

    <h4>
        <a href="{{route('dashboard.about.index')}}" class="btn btn-success btn-sm">CANCEL</a>
    </h4>
</div>

<div class="col-md-12">
    <div class="section-container">
        <form class="p-2" action="{{route('dashboard.about.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- page_name -->
                <div class="col-md-8">
                    <div class="form-group">
                    <label for="page_name" class="form-label">Page Name</label>
                    <input  type="text" class="form-control @error('page_name') is-invalid @enderror"
                            id="page_name" placeholder="Example: About Us"
                            name="page_name" value="{{old('page_name')}}"
                            required>

                    <div class="valid-feedback">
                        Looks good!
                    </div>

                    @error('page_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>

                <!-- status -->
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror"
                            id="#" name="status"
                            value="{{old('status')}}" required>

                        <option value="">Select</option>
                        <option value="active">Publish</option>
                        <option value="inactive">Draft</option>

                    </select>

                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                    </div>
                </div>
            </div>

            <div class="row my-3">
                <!-- File upload -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input  class="form-control @error('banner') is-invalid @enderror"
                                type="file" id="formFile"
                                name="banner">

                    @error('banner')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>

                <!-- Image or file caption -->
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="image_caption" class="form-label">Image Caption</label>
                    <input  type="text" class="form-control @error('image_caption') is-invalid @enderror"
                            id="#" placeholder="Give a caption to the image"
                            name="image_caption" value="{{old('image_caption')}}"
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
                <textarea   class="form-control" id="ck-editor"
                            rows="20" name="body"
                            value="{{old('body')}}" required></textarea>

                @error('body')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <button class="btn btn-primary mb-3" type="submit">CREATE</button>

        </form>
    </div>
</div>


@endsection
