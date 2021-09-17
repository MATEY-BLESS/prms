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

    .campaign-side-link{
        min-height: 190px;
        background-color: #ececec;
    }
</style>

<div class="d-flex justify-content-between">
    <h4 class="">
        Campaigns
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg>
        Compose Message
    </h4>

    <div class="mb-2">
        <a href="{{route('dashboard.seasonal-message.index')}}" class="btn btn-success btn-sm">Messages</a>
    </div>
</div>

<div class="section-container">

        <div class="col-md-12 p-3">
            <span>
                <b>Occasional messages: emergency, apologies, distruption in service, etc.</b>
            </span>
            <form class="my-3" action="{{route('dashboard.seasonal-message.store')}}"
                        method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <!-- heading -->
                <div class="col-md-9">
                  <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" class="form-control @error('heading') is-invalid @enderror"
                            id="heading" placeholder="Enter a nice heading"
                            name="heading" value="{{old('heading')}}"
                            required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>

                    @error('heading')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <!-- status -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="category">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror status"
                            id="status" name="status"
                            value="{{old('status')}}"
                            required>

                      <option value="">Select</option>
                      <option value="active">Publish</option>
                      <option value="inactive">Draft</option>

                    </select>
                    <small class="form-text text-muted">You need to select status</small>

                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                </div>
              </div>

              {{-- description --}}
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Short decription (optional)</label>
                        <textarea class="form-control" id="ck-editor"
                                rows="" name="description"
                                value="{{old('description')}}"></textarea>

                        @error('description')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
              </div>

              {{-- image --}}
              <div class="row my-4">
                <div class="col-md-5">
                    <label for="image">Image (optional)</label> <br>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                            id="exampleFormControlFile1"
                            name="image" />
                </div>

                <div class="col-md-7">
                    <div class="form-group my-4">
                        <label for="articles">Add Article (optional)</label>
                        <select class="form-control @error('articles') is-invalid @enderror"
                                id="#" name="articles[]"
                                value="{{old('articles')}}" multiple>

                        <option value="">Select</option>
                        @forelse ($articles as $article)
                        <option value="{{$article->id}}">{{$article->title}}</option>
                        @empty
                        <option value="">No articles.</option>
                        @endforelse

                        </select>

                        @error('articles')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                      </div>
                </div>
              </div>


              {{-- body --}}
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body">Messsage Body</label>
                        <textarea class="form-control" id="ck-editor"
                                rows="" name="body"
                                value="{{old('body')}}"></textarea>

                        @error('body')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
              </div>

              <button class="btn btn-primary my-3" type="submit" id="sendBtn">SEND MESSAGE</button>
              </div>
            </form>
    </div>
</div>

<script>

    const status = document.getElementById("status");
    const btn = document.getElementById("sendBtn");

    status.addEventListener("click", ()=>{

    if(status.value === "active"){
        btn.innerText = "SEND MESSAGE";
    }else{
        btn.innerText= "SAVE DRAFT";
    }
});
</script>
@endsection



