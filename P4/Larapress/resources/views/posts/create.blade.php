<h1>Buat Post Baru</h1>

<form method="POST" action="/posts">
    @csrf
    <label>Judul:</label><br>
    <input type="text" name="title"><br><br>

    <label>Isi:</label><br>
    <textarea name="content"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
