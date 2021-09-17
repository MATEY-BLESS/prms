@extends('layouts.dashboard')
@section('content')

    <h4>EDIT: {{$about->page_name}}</h4>

    <a href="{{route('dashboard.about.index')}}" class="btn btn-success btn-sm">BACK</a>
    <div class="row">
        <div class="col-md-10">
            <form class="p-2" action="{{route('dashboard.about.update', $about)}}"
                        method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="form-row">

                <!-- page_name -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="page_name">page_name</label>
                    <input type="text" class="form-control @error('page_name') is-invalid @enderror"
                            id="page_name" placeholder="Enter page_name"
                            name="page_name" value="{{$about->page_name}}"
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
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="category">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror"
                            id="#" name="status"
                            value=""
                            required>

                        <option selected value="{{$about->status}}">{{$about->status}}</option>
                        @if($about->status == "active")
                        <option value="inactive">Draft</option>
                        @else
                        <option value="active">Publish</option>
                        @endif
                    </select>
                    <small class="form-text text-muted">You need to select status</small>

                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <!-- File upload -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Image/ Banner</label>
                    <input type="file" class="form-control-file @error('banner') is-invalid @enderror"
                            id="exampleFormControlFile1"
                            name="banner" />

                    @error('banner')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <!-- Image or file caption -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="image_caption">Image Caption (needed)</label>
                    <input type="text" class="form-control @error('image_caption') is-invalid @enderror"
                            id="#" placeholder="Give a caption to the image"
                            name="image_caption" value="{{$about->image_caption}}"
                            required>

                    @error('image_caption')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Body -->
              <div class="form-group">
                <label for="body">Content</label>
                <textarea class="form-control" id="ck-editor"
                          rows="30" name="body"
                          value="">{{$about->page_name}}</textarea>

                @error('body')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>

              <button class="btn btn-primary mb-3" type="submit">UPDATE</button>

            </form>
        </div>
    </div>

@endsection
