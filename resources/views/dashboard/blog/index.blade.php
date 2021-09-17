@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 600px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }

    .list-else-message{
        text-align: center;
        padding: 100px;
        color: #b1aeae;
        font-size: 1rem;
    }

    .grid-view{
        /* width: 200px; */
        min-height: 200px;
        display: none;
    }

    #testing{
        height: 300px;
        display: none;
    }

    .grid-view-image{
        height: 150px;
        background-color: #cecece;
    }

    .grid-view-image img{
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .grid-view-title{
        background-color: white;
        height: 80px;
    }

    .grid-view-date{
        height: 30px;
        background-color: white;
    }
    .extra-details{
        border-top: 1px solid #cecece;
        background-color: white;
        height: 40px;
    }

    #table{
        display: none;
    }

    #tableView{
        width: 100%;
    }

    .article-admin-label{
        font-size: 12px;
        color: darkblue;
        font-family: 'Passion One', cursive;
        font-weight: lighter;
    }
</style>


<div class="d-flex justify-content-between">
    <h4>Blog Articles</h4>
    <h4>
        <a href="{{route('dashboard.blog.create')}}" class="btn btn-success btn-sm">Add Article</a>
    </h4>
</div>

<div class="section-container">
    @if ($articles->count() > 0)
        <div class="d-flex justify-content-between">
            <div class="mb-2">
                <input class="btn btn-secondary btn-sm" type="button" value="TABLE" id="table">
                <input class="btn btn-secondary btn-sm" type="button" value="GRID" id="grid">
            </div>

        </div>

        <div id="tableView">
            <table class="table table-responsive table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($articles as $article)
                    <tr>
                        <td scope="row">{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->created_at->isoFormat('LL')}}</td>
                        <td>
                            <img src="{{asset($article->post_image)}}"
                                    alt="{{$article->image_caption}}"
                                    width="100">
                        </td>
                        @if ($article->admin)
                            <td>
                                {{$article->admin->name}}
                                <div>
                                    <small class="article-admin-label">
                                    <strong>admin</strong></small>
                                </div>

                            </td>
                        @elseif ($article->user)
                            <td>{{$article->user->name}}</td>
                        @endif

                        <td class="d-flex">
                            <span><a href="{{route('dashboard.blog.show', $article)}}" class="btn btn-success btn-sm">VIEW</a></span>
                            <span class="mx-1"><a href="{{route('dashboard.blog.edit', $article)}}" class="btn btn-primary btn-sm">EDIT</a></span>
                            <span >
                                <form action="{{route('dashboard.blog.destroy', $article->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                                </form>
                            </span>


                        </td>
                    </tr>
                    @empty
                        <td>No Articles</td>
                    @endforelse
                </tbody>
            </table>
        </div >


        {{-- GRID VIEW --}}
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-sm-6 col-md-4 col-xxl-3">

                <div class="grid-view my-3" id="testing">
                    {{-- image --}}
                    <div class="grid-view-image">
                        <img src="{{asset($article->post_image)}}"
                                    alt="{{$article->image_caption}}">
                    </div>

                    {{-- heading --}}
                    <div class="">
                        <div class="grid-view-title px-2">
                            <h6 class="py-2">
                                <b>{{$article->title}}</b>
                            </h6>
                        </div>

                        <div class="d-flex justify-content-between align-items-center px-2 grid-view-date">
                            <small>{{$article->created_at->isoFormat('LL')}}</small>
                            {{-- <small>{{$article->admin->name}}</small> --}}
                            @if ($article->admin)
                            <small>
                                {{-- {{$article->admin->name}} --}}
                                <div>
                                    <small class="article-admin-label">
                                    <strong>Admin</strong></small>
                                </div>

                            </small>
                            @elseif ($article->user)
                                <small>{{$article->user->name}}</small>
                            @endif
                        </div>
                    </div>

                    {{-- extra details --}}
                    <div class="d-flex justify-content-between extra-details p-2">
                        <small>20K</small>
                        <small><a href="{{route('dashboard.blog.show', $article)}}" class="btn btn-primary btn-sm py-0">VIEW</a></small>
                        <small class="">
                            <form action="{{route('dashboard.blog.destroy', $article->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm py-0">DELETE</button>
                            </form>
                        </small>
                    </div>

                </div>

            </div>
            @empty
                <td>No Articles</td>
            @endforelse
        </div>


    @else

        <div class="list-else-message">
            <span >No Blog Articles.</span>
            <div class="my-4">
                <span class="fs-2">All <b>articles</b> will show here in table with grid view option.</span>
            </div>
        </div>

    @endif
</div>


<script>
    'use strict'

    const grid = document.getElementById("grid");
    const table = document.getElementById("tableView");
    const gridView = document.querySelectorAll(".grid-view");
    var i;

    grid.addEventListener("click", ()=>{
        // loop/ foreach
        for(i = 0; i < gridView.length; i++){
            gridView[i].style.display = "block";
        }
        table.style.display = "none";

        document.querySelector("#table").style.display = "inline-block";
    })

    document.getElementById("table").addEventListener("click", ()=>{
        for(i = 0; i < gridView.length; i++){
            gridView[i].style.display = "none";
        }

        table.style.display = "inline-block";
        document.querySelector("#table").style.display = "none";
    })
</script>
@endsection
