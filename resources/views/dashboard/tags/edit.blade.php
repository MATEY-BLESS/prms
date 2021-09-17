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

<h4>EDIT: <b>{{$tag->name}}</b></h4>

    <div class="col-md-6">
        <div class="section-container">
        <form class="p-2" action="{{route('dashboard.tag.update', $tag)}}"
                    method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="row">

            <!-- name -->
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Enter tag name"
                        name="name" value="{{$tag->name}}"
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

          {{-- buttons --}}
          <div class="row my-3">
            <div class="col-md-4">
              <a href="{{route('dashboard.tag.index')}}" class="btn btn-success"
              style="width: 100%;" >CANCEL</a>
            </div>

            <div class="col-md-8">
              <button class="btn btn-primary" type="submit"
              style="width: 100%;">UPDATE</button>
            </div>
        </div>
        </form>
    </div>
</div>


@endsection
