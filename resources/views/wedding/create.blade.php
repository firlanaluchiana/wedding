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
                        <h4 class="card-title">Wedding</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('wedding.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="groom_name">Groom Name</label>
                                        <input type="text" id="groom_name" name="groom_name" class="form-control round"
                                            placeholder="Groom Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="bride_name">Bride Name</label>
                                        <input type="text" id="bride_name" name="bride_name" class="form-control round"
                                            placeholder="Bride Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="groom_bio">Groom Bio</label>
                                        <textarea class="form-control" id="groom_bio" name="groom_bio" rows="3" placeholder="Groom Bio"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="bride_bio">Bride Bio</label>
                                        <textarea class="form-control" id="bride_bio" name="bride_bio" rows="3" placeholder="Bride Bio"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="groom_image">Groom Image</label>
                                        <input class="form-control" type="file" id="groom_image" name="groom_image">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="bride_image">Bride Image</label>
                                        <input class="form-control" type="file" id="bride_image" name="bride_image">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="wedding_date">Wedding Date</label>
                                        <input type="date" id="wedding_date" name="wedding_date"
                                            class="form-control round">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="venue">Venue</label>
                                        <input type="text" id="venue" name="venue" class="form-control round"
                                            placeholder="Venue">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control round"
                                            placeholder="City">
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
