@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl mb-2">Form Kuisioner</h2>

    <form action="/kuisioner" method="POST" class="space-y-4 flex flex-col w-full">
        @csrf
        @foreach ($kriteria as $k)
        <hr>
            <h3 class="text-lg mb-2 font-semibold mt-6">Kriteria {{ $k->nama }}</h3>
            @foreach ($k->pertanyaan as $p)
            <ul class="bg-white p-4 shadow rounded">
                <li>{{ $p->teks_pertanyaan }}</li>
                {{-- <label>{{ $p->teks_pertanyaan }}</label> --}}
                <select name="jawaban[{{ $k->id }}][]" required>
                    @for ($i = 1; $i <= $p->nilai_max; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </ul>
            @endforeach
        @endforeach
        <button type="submit">Submit</button>
    </form>
</div>

<div class="bg-white p-6 rounded-lg shadow-md mt-6">
    <h2 class="text-xl mb-2">Hasil Rekomendasi Negara Tujuan</h2>
    <ul class="bg-white p-4 shadow rounded">
        @forelse ($hasil as $negaraId => $skor)
            <li class="border-b py-2">{{ \App\Models\Negara::find($negaraId)->nama }} - Skor: {{ $skor }}</li>
        @empty
            <li class="text-gray-500">Belum ada rekomendasi. Silakan isi kuisioner!</li>
        @endforelse
    </ul>
</div>
@endsection
