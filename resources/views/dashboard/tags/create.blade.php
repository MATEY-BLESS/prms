@extends('layouts.dashboard')
@section('content')

    <h4>Add Tag</h4>
    <div class="row">
        <div class="col-md-10">
            <form class="p-2" action="{{route('dashboard.tag.store')}}"
                        method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-row">

                <!-- name -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Tag name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter tag name"
                            name="name" value="{{old('name')}}"
                            required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>

                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>
              </div>

              <button class="btn btn-primary mb-3" type="submit">ADD</button>

            </form>
        </div>
    </div>

@endsection
