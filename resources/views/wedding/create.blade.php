<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wedding') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('wedding.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="groom_name" class="form-label">Pengantin Wanita</label>
                            <input type="text" class="form-control" id="groom_name" name="groom_name"
                                placeholder="Women">
                        </div>
                        <div class="mb-3">
                            <label for="bride_name" class="form-label">Pengantin Pria</label>
                            <input type="text" class="form-control" id="bride_name" name="bride_name"
                                placeholder="Men">
                        </div>
                        <div class="mb-3">
                            <label for="groom_bio" class="form-label">Bio Wanita</label>
                            <input type="text" class="form-control" id="groom_bio" name="groom_bio"
                                placeholder="Women Bio">
                        </div>
                        <div class="mb-3">
                            <label for="bride_bio" class="form-label">Bio Pria</label>
                            <input type="text" class="form-control" id="bride_bio" name="bride_bio"
                                placeholder="Men Bio">
                        </div>
                        <div class="mb-3">
                            <label for="groom_photo" class="form-label">Photo Wanita</label>
                            <input type="file" class="form-control" id="groom_photo" name="groom_photo"
                                placeholder="Women Photo">
                        </div>
                        <div class="mb-3">
                            <label for="bride_photo" class="form-label">Photo Pria</label>
                            <input type="file" class="form-control" id="bride_photo" name="bride_photo"
                                placeholder="Men Photo">
                        </div>
                        <div class="mb-3">
                            <label for="wedding_date" class="form-label">Tanggal Nikah</label>
                            <input type="date" class="date" id="wedding_date" name="wedding_date">
                        </div>
                        <div class="mb-3">
                            <label for="venue" class="form-label">Tempat Nikah</label>
                            <input type="text" class="form-control" id="venue" name="venue"
                                placeholder="Tempat Nikah">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Kota">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
