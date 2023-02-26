<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="card-group">
                <div class="card" style="width: 18rem; margin:20px;">
                  <div class="card-body">
                    @if ($total)
                    <h5 class="card-title">{{ $total }} Laporan Masuk</h5>
                    <p class="card-text">Total Masuk</p>
                    @else
                    <h5 class="card-title">0 Laporan Masuk</h5>
                    <p class="card-text">Total Masuk</p>
                    @endif
                  </div>
                </div>
                <div class="card" style="width: 18rem; margin:20px;">
                  <div class="card-body">
                    @if ($belum)
                    <h5 class="card-title">{{ $belum }} Belum ditanggapi</h5>
                    <p class="card-text">Belum Ditanggapi</p>
                    @else
                    <h5 class="card-title">0 Belum Ditanggapi</h5>
                    <p class="card-text">Belum Ditanggapi</p>
                    @endif
                  </div>
                </div>
                <div class="card" style="width: 18rem; margin:20px;">
                  <div class="card-body">
                    @if ($sudah)
                    <h5 class="card-title">{{ $sudah }} Sudah Ditanggapi</h5>
                    <p class="card-text">Sudah Ditanggapi</p>
                    @else
                    <h5 class="card-title">0 Sudah Ditanggapi</h5>
                    <p class="card-text">Sudah Ditanggapi</p>
                    @endif
                  </div>
                </div>
              </div>
             
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">id</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Laporan</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($data)
                            @foreach ($data as $datas)
                            <tr>
                              <td> {{ ++$i }} </td>
                              <td> {{ $datas->id }} </td>
                              <td> {{ $datas->tgl_pengaduan }} </td>
                              <td> {{ $datas->nik }} </td>
                              <td> {{ $datas->isi_laporan }} </td>
                              <td> {{ $datas->foto }} </td>
                              <td> {{ $datas->status }} </td>
                            </tr>
                          @endforeach
                          @else
                              no data
                          @endif
                            
                        </tbody>
                      </table>   
                    </div>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
