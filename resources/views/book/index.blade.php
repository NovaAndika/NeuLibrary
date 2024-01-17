<x-layout>
    <div class="mx-5 pt-5  ">
        <a href="{{ route('book.create') }}" class="btn btn-cMedium mb-3">+ Tambah</a>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="p-1">GAMBAR</th>
                            <th class="p-1">JUDUL</th>
                            <th class="p-1">PENULIS | PENERBIT</th>
                            <th class="p-1">SINOPSIS</th>
                            <th class="p-1">TERBIT</th>
                            <th class="p-1">HALAMAN</th>
                            <th class="p-1">JUMLAH</th>
                            <th class="p-1">DIPINJAM</th>
                            <th class="p-1">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td class="p-1">
                                    <img src="{{ asset('/storage/image/' . $book->image) }}" style="width: 150px">
                                </td>
                                <td class="p-1">{{ $book->title }}</td>
                                <td class="p-1">{{ $book->pengarang }}</td>
                                <td class="p-1">{{ $book->penerbit }}</td>
                                <td class="p-1">{!! $book->sinopsis !!}</td>
                                <td class="p-1">{{ $book->terbit }}</td>
                                <td class="p-1">{{ $book->halaman }} halaman</td>
                                <td class="p-1">{{ $book->jumlah }}</td>
                                <td class="p-1">{{ $book->dipinjam }}</td>
                                <td class="p-1">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('book.destroy', $book->id) }}" method="POST">
                                        <a href="{{ route('book.edit', $book->id) }}"
                                            class="btn btn-sm btn-primary">
                                            {{-- <i class="fa fa-trash" aria-hidden="true"></i> --}}
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    <li>Belum ada Data</li>
                                </ul>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
