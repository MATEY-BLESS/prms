@extends('layouts.dashboard')
@section('content')

<h4>Standard Pages</h4>
<div class="col-md-12">
    <div class="section-container">
        <div class="mb-2">
            <a href="{{route('dashboard.about.create')}}" class="btn btn-success btn-sm">ADD PAGE</a>
        </div>

        @forelse ($abouts as $about)
        <table class="table table-responsive table-hover" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($abouts as $about)
                <tr>
                    <td scope="row">1</td>
                    <td>{{$about->title}}</td>
                    <td>{{$about->created_at->isoFormat('LL')}}</td>
                    @foreach ($about->admin as $admin)
                    <td>{{$admin->name}}</td>
                    @endforeach

                    <td class="d-flex">
                        <span><a href="{{route('dashboard.about.show', $about)}}" class="btn btn-success btn-sm">VIEW</a></span>
                        <span class="mx-1">
                            <form action="{{route('dashboard.about.destroy', $about->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                            </form>
                        </span>


                    </td>
                </tr>
                @empty
                    <td>No abouts</td>
                @endforelse
            </tbody>
        </table>

        @empty
        <div class="list-else-message">
            <span >No About Us Pages.</span>
            <div class="my-4">
                <span class="fs-2">This shows added static pages such as: <b>About Us, Privacy Policy, etc.</b></span>
            </div>
        </div>
        @endforelse


    </div>
</div>




@endsection
