@extends('layouts.admin')
@section('content')
    @include('sweetalert::alert')
    <div class="page-heading">
        <h3>Friend</h3>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> minimal 3 content.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Friend
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($friends as $friend)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $friend->wedding->groom_name }} &
                                        {{ $friend->wedding->bride_name }}
                                    </td>
                                    <td>{{ $friend->title }}</td>
                                    <td>{{ $friend->description }}</td>
                                    <td>
                                        <div class="avatar avatar-lg me-3">
                                            <img src="{{ secure_url('storage/' . $friend->image) }}"
                                                alt="{{ $friend->title }}" srcset="">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('friend.edit', [$friend->wedding->id, $friend->id]) }}"
                                            class="btn btn-warning btn-sm">
                                            <friend class="bi bi-pencil-square"></friend>
                                        </a>
                                        <form action="{{ route('friend.destroy', [$friend->wedding->id, $friend->id]) }}"
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
