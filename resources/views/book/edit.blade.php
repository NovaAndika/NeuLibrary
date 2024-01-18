<x-layout>

    <div class="d-flex align-items-center justify-content-center w-full my-5">
        <div class="card w-50">
            <div class="card-body">

                <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input id="image" name="Gambar" type="file"></x-input>
                    <x-input id="title" name="Title" value="{{ old('title',$book->title) }}"></x-input>
                    <x-input id="pengarang" name="Pengarang" value="{{ old('pengarang',$book->pengarang) }}"></x-input>
                    <x-input id="penerbit" name="Penerbit" value="{{ old('penerbit',$book->penerbit) }}"></x-input>
                    <x-input id="terbit" name="Terbit" type="date" value="{{ old('terbit',$book->terbit) }}"></x-input>
                    <x-input id="jumlah" name="Jumlah" type="number" value="{{ old('jumlah',$book->jumlah) }}"></x-input>
                    <x-input id="halaman" name="Halaman" type="number" value="{{ old('halaman',$book->halaman) }}"></x-input>
                    <div class="form-group my-2">
                        <label for="sinopsis">Sinopsis</label>
                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="5" >{{ old('sinopsis', $book->sinopsis) }}</textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-cMedium text-white" type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-layout>
