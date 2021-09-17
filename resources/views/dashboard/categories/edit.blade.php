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

<h4>EDIT {{$category->name}}</h4>
<div class="col-md-6">
    <div class="section-container">
        <form class="p-2" action="{{route('dashboard.category.update', $category)}}"
                        method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="form-row">

                <!-- name -->
                <div class="col-md-12">
                  <div class="form-row">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter name"
                            name="name" value="{{$category->name}}"
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
                    <a href="{{route('dashboard.category.index')}}" class="btn btn-success"
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
