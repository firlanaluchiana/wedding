@extends('layouts.admin')
@section('content')
    <div class="page-heading">
        <h3>Create</h3>
    </div>
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Story</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('story.store', $wedding->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control round"
                                            placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
