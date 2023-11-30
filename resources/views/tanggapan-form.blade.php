<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Tanggapan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full mb-6 table table-bordered">
                        <thead>
                            <tr>
                                <th class="border text-center">NAMA PELAPOR</th>
                                <th class="border text-center">ISI LAPORAN</th>
                                <th class="border text-center">FOTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border text-center">
                                    @php
                                        $user = \App\Models\Masyarakat::where('nik', $tanggapan->nik)->first();
                                    @endphp
                                    {{ $user ? $user->nama : 'User not found' }}
                                </td>
                                <td class="border align-center text-center">{{$tanggapan->isi_laporan}}</td>
                                <td class="border text-center">
                                    <div style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">
                                        <img src="{{ asset('storage/' . $tanggapan->foto) }}" alt="tanggapan Photo" width="50">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="/form-tanggapan-add" method="POST" class="form-container">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{$tanggapan->id_pengaduan}}" id="">
                        <input type="hidden" name="date" id="">
                        <input type="hidden" name="id_petugas" value="{{ Auth::user()->id }}" id="">
                        <input type="hidden" name="role" value="{{ Auth::user()->role }}" id="">

                        <div class="form-group">
                            <label for="isi_tanggapan">BERIKAN TANGGAPAN</label>
                            <textarea name="tanggapan" id="tanggapan" class="form-control" placeholder="Berikan Tanggapan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
