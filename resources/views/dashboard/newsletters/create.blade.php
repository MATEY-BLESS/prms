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
        Compose Newsletter
    </h4>

    <div class="mb-2">
        <a href="{{route('dashboard.newsletter.index')}}" class="btn btn-success btn-sm">Newsletters</a>
    </div>
</div>

<div class="section-container">
        <div class="col-md-12 p-3">
            <span>
                <b>Select maximum of 5 articles. Newsletter will be sent to all subscribers automatically.</b>
            </span>

            <form class="my-4" action="{{route('dashboard.newsletter.store')}}"
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
                    <select class="form-control @error('status') is-invalid @enderror"
                            id="#" name="status"
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


              <div class="row">
                <div class="col-md-12">
                   <!-- description -->
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

              {{-- Select articles --}}
              <div class="row my-4">
                <div class="col-md-12">
                    <label for="description">Select Articles</label>
                    <select class="form-control @error('articles') is-invalid @enderror"
                        id="#" name="articles[]"
                        value="{{old('articles')}}"
                        required multiple>

                        <option value="">Select</option>
                        @forelse ($articles as $article)
                            <option value="{{$article->id}}">{{$article->title}}</option>
                        @empty
                            <option value="">No articles</option>
                        @endforelse

                    </select>


                    @error('articles')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
              </div>


              <button class="btn btn-primary mb-3" type="submit">SEND NEWSLETTER</button>
              </div>


            </form>
    </div>
</div>


@endsection
