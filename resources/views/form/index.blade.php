<!-- resources/views/kuisioner/index.blade.php -->
<form action="/kuisioner" method="POST">
    @csrf
    @foreach ($kriteria as $k)
        <h3>{{ $k->nama }}</h3>
        @foreach ($k->pertanyaan as $p)
            <label>{{ $p->teks_pertanyaan }}</label>
            <select name="jawaban[{{ $k->id }}][]" required>
                @for ($i = 1; $i <= $p->nilai_max; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        @endforeach
    @endforeach
    <button type="submit">Submit</button>
</form>
