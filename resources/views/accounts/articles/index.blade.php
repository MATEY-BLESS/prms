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
        min-height: 200px;
        display: none;
    }

    .grid-view-image{
        height: 150px;
        background-color: #cecece;
    }

    .grid-view-detail{
        background-color: white;
    }

    .extra-details{
        margin-top: 5px;
        border-top: 1px solid #cecece;
    }

    #table{
        display: none;
    }

    #tableView{
        width: 100%;
    }
</style>


<div class="d-flex justify-content-between">
    <h4>Your Articles</h4>
    <h4>
        <a href="{{route('dashboard.user.article.create')}}" class="btn btn-success btn-sm">Add Article</a>
    </h4>
</div>

<div class="section-container">
    @if ($users->articles->count() > 0)
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
                        <th scope="col">Created At</th>
                        <th scope="col">Views</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users->articles as $article)
                    <tr>
                        <td scope="row">{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->created_at->isoFormat('LL')}}</td>
                        <td>{{$article->views}}</td>

                        <td class="d-flex">
                            <span><a href="{{route('dashboard.user.article.show', $article)}}" class="btn btn-success btn-sm">VIEW</a></span>
                            <span class="mx-1"><a href="{{route('dashboard.user.article.edit', $article)}}" class="btn btn-primary btn-sm">EDIT</a></span>
                            <span >
                                <form action="{{route('dashboard.user.article.destroy', $article->id)}}" method="POST">
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
            @forelse ($users->articles as $article)
            <div class="col-sm-6 col-md-4 col-xxl-3">

                <div class="grid-view" id="testing">
                    {{-- image --}}
                    <div class="grid-view-image">

                    </div>

                    {{-- heading --}}
                    <div class="grid-view-detail">


                        <div class="px-2">
                            <h6 class="py-2">
                                <b>{{$article->title}}</b>
                            </h6>

                            <div class="d-flex justify-content-between">
                                <small>{{$article->created_at->isoFormat('LL')}}</small>
                                <small>{{$article->users}}</small>
                            </div>
                        </div>


                        <div class="d-flex justify-content-between extra-details p-2">
                            <small>20K</small>
                            <small><a href="{{route('dashboard.user.article.show', $article)}}" class="btn btn-primary btn-sm py-0">VIEW</a></small>
                            <small class="">
                                <form action="{{route('dashboard.user.article.destroy', $article->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm py-0">DELETE</button>
                                </form>
                            </small>
                        </div>

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
