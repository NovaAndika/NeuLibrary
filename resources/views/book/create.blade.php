<x-layout>

    <div class="d-flex align-items-center justify-content-center w-full my-5">
        <div class="card w-50">
            <div class="card-body">

                <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-input id="image" name="Gambar" type="file"></x-input>
                    <x-input id="title" name="Title"></x-input>
                    <x-input id="pengarang" name="Pengarang"></x-input>
                    <x-input id="penerbit" name="Penerbit"></x-input>
                    <x-input id="terbit" name="Terbit" type="date"></x-input>
                    <x-input id="jumlah" name="Jumlah" type="number"></x-input>
                    <x-input id="halaman" name="Halaman" type="number"></x-input>
                    <div class="form-group my-2">
                        <label for="sinopsis">Sinopsis</label>
                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-cMedium text-white" type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-layout>
