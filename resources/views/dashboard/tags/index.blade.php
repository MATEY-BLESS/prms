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

{{-- SECTION 1: --}}
    {{-- List of tags --}}
    <h4>List of Tags</h4>
    <div class="col-md-6">
        <div class="section-container">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tags as $tag)
                    <tr>
                        <td scope="row">{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->created_at->isoFormat('LL')}}</td>
                        <td>{{$tag->admin->name}}</td>

                        <td class="d-flex">
                            <span><a href="{{route('dashboard.tag.edit', $tag)}}" class="btn btn-success btn-sm">EDIT</a></span>
                            <span class="mx-1">
                                <form action="{{route('dashboard.tag.destroy', $tag)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                    @empty
                        <td>No tags</td>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>

    {{-- Add Tag --}}
    <div class="col-md-6">
        <div class="section-container">
            <h5>Add tag</h5>

            <form class="p-2" action="{{route('dashboard.tag.store')}}"
                        method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-row">

                <!-- name -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">name</label>
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


              <button class="btn btn-primary my-3" type="submit">ADD</button>

            </form>
        </div>
    </div>
{{-- END SECTION 1 --}}

@endsection
