@extends('layouts.admin')
@section('content')
    @include('sweetalert::alert')
    <div class="page-heading">
        <h3>Story</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Story
                    </h5>
                    <a href="" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Wedding</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($storys as $story)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $story->wedding->groom_name }} &
                                        {{ $story->wedding->bride_name }}
                                    </td>
                                    <td>{{ $story->title }}</td>
                                    <td>{{ $story->date }}</td>
                                    <td>{{ $story->description }}</td>
                                    <td>
                                        <div class="avatar avatar-lg me-3">
                                            <img src="{{ secure_url('storage/' . $story->image) }}"
                                                alt="{{ $story->title }}" srcset="">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('story.edit', [$story->wedding->id, $story->id]) }}"
                                            class="btn btn-warning btn-sm">
                                            <story class="bi bi-pencil-square"></story>
                                        </a>
                                        <form action="{{ route('story.destroy', [$story->wedding->id, $story->id]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
