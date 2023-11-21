@extends('layouts.admin')
@section('content')
    @include('sweetalert::alert')
    <div class="page-heading">
        <h3>Wedding</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Wedding
                    </h5>
                    <a href="{{ route('wedding.create') }}" class="btn btn-primary btn-sm"><i
                            class="bi bi-plus-circle"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Groom Name</th>
                                <th>Groom Image</th>
                                <th>Bride Name</th>
                                <th>Bride Image</th>
                                <th>Wedding Date</th>
                                <th>Venue</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($weddings as $wedding)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $wedding->groom_name }}</td>
                                    <td>
                                        <div class="avatar avatar-lg me-3">
                                            <img src="{{ secure_url('storage/' . $wedding->groom_image) }}"
                                                alt="{{ $wedding->groom_name }}" srcset="">
                                        </div>
                                    </td>
                                    <td>{{ $wedding->bride_name }}</td>
                                    <td>
                                        <div class="avatar avatar-lg me-3">
                                            <img src="{{ secure_url('storage/' . $wedding->bride_image) }}"
                                                alt="{{ $wedding->bride_name }}" srcset="">
                                        </div>
                                    </td>
                                    <td>{{ $wedding->wedding_date }}</td>
                                    <td>{{ $wedding->venue }}</td>
                                    <td>{{ $wedding->city }}</td>
                                    <td>
                                        <a href="{{ route('wedding.showBySlug', $wedding->slug) }}"
                                            class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('wedding.edit', $wedding->slug) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('wedding.destroy', $wedding->slug) }}" method="POST"
                                            class="d-inline">
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
