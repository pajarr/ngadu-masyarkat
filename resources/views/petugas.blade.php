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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Username</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($petugas as $item)
                            <tr>
                                <th scope="row"> {{ ++$i }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                          Select
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                          <li><button class="dropdown-item">Update</button></li>
                                          {{-- <li><button class="dropdown-item">Delete</button></li> --}}
                                          <form action="{{ route('admin.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <li><button type="submit" class="dropdown-item">Delete</button></li>
                                           </form>
                                        </ul>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
