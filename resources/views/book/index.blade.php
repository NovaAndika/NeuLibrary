<x-layout>
    <div class="container">
        <a href="{{ route('book.store') }}">+ Tambah</a>
        <x-card>
            <table>
                <thead class="table table-bordered">
                    <tr>
                        <th scope="col">GAMBAR</th>
                        <th scope="col">JUDUL</th>
                        <th scope="col">PENULIS | PENERBIT</th>
                        <th scope="col">SINOPSIS</th>
                        <th scope="col">TERBIT</th>
                        <th scope="col">HALAMAN</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">DIPINJAM</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($book as $book)
                    <th scope="col">
                        <img src="{{ asset('/storage/book/'.$book->image) }}" style="height: 150px">
                    </th>
                    <th scope="col">{{ $book->title }}</th>
                    <th scope="col">{{ $book->pengarang }} | {{ $book->penulis }}</th>
                    <th scope="col">{{ $book->sinopsis }}</th>
                    <th scope="col">{{ $book->terbit }}</th>
                    <th scope="col">{{ $book->halaman }} halaman</th>
                    <th scope="col">{{ $book->jumlah }}</th>
                    <th scope="col">{{ {{ $book->dipinjam }} }}</th>
                    <th scope="col">AKSI</th>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </x-card>
    </div>
</x-layout>
