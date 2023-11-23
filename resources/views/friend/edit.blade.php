@extends('layouts.admin')
@section('content')
    <div class="page-heading">
        <h3>Edit {{ $friend->title }}</h3>
    </div>
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Friend</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('friend.update', [$friend->wedding->id, $friend->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" id="title" name="title" class="form-control round"
                                            value="{{ $friend->title }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $friend->description }}</textarea>
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
