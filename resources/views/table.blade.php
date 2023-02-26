<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Welcome, {{ Auth::user()->name }}!!    
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $datas)
                              <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $datas->id }} </td>
                                <td> {{ $datas->tgl_pengaduan }} </td>
                                <td> {{ $datas->nik }} </td>
                                <td> {{ $datas->isi_laporan }} </td>
                                <td> {{ $datas->foto }} </td>
                                <td> {{ $datas->status }} </td>
                                <td>
                                      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button>
                                      <br>
                                      <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#tanggapanModal">Tanggapan</button>
                                      <br>
                                      <form action="{{ route('admin.destroy',$datas->id) }}" method="POST">
                         
                                        @csrf
                                        @method('DELETE')
                            
                                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>

                            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pengaduan') }}" method="GET">
                                    <div class="modal-body">
                                      <h2>Nik: {{ $data[0]->nik }}</h2>
                                      <h2>Nama Pelapor: {{ $data[0]->nama_pengadu }}</h2>
                                      <h2>Tanggal: {{ $data[0]->tgl_pengaduan }}</h2>
                                      <h2>Isi Laporan:{{ $data[0]->isi_laporan }}</h2>
                                      <h2>Foto: {{ $data[0]->foto }}</h2>
                                    </div>
                                  </form>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="modal fade" id="tanggapanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal Tanggapan</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('admin.store')}}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                          <label>Nama Pelapor: </label>
                                          <input type="hidden" name="id_petugas" value="{{ Auth::user()->id }}">
                                          <input type="hidden" name="id_pengaduan" value="{{ Auth::user()->id }}">
                                          <p>{{ $data[0]->nama_pengadu }}</p>
                                        </div>
                                        <div class="form-group">
                                          <label>Isi Laporan:</label>
                                         <p>"{{ $data[0]->isi_laporan }}"</p>
                                        </div>
                                        <div class="form-group">
                                          <label>Tanggal Tanggapan:</label>
                                          <input type="date" name="tgl_tanggapan" class="">
                                        </div>
                                        <div class="form-group">
                                          <label>Tanggapan:</label>
                                          <textarea type="text" name="tanggapan" class=""></textarea>
                                        </div>
                                      <input type="hidden" name="created_at" value="{{ now()->timestamp }}">
                                      <input type="hidden" name="updated_at" value="{{ now()->timestamp }}">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                          </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>