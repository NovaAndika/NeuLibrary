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
                            <th class="p-1">PENULIS</th>
                            <th class="p-1">PENERBIT</th>
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
                                <td class="p-1 d-flex justify-content-center">
                                    <img src="{{ asset('/storage/image/' . $book->image) }}" style="width: 150px;">
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
                                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
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
