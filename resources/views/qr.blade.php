<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barcode Tas Obat {{ $tas['sapaan'] }} {{ $tas['pemilik'] }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&family=Bricolage+Grotesque:opsz,wght@12..96,800&display=swap" rel="stylesheet">
    <style>
        :root { --ink: #14304A; --sea: #0B7A7C; --mint: #DDF2EC; --sun: #FFC64A; --paper: #F4FAF9; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 1.5rem;
               background: var(--paper); color: var(--ink); font-family: 'Atkinson Hyperlegible', system-ui, sans-serif; font-size: 1.125rem; }
        .sticker { width: min(24rem, 100%); background: #fff; border: 4px solid var(--sea); border-radius: 32px; padding: 1.75rem; text-align: center; }
        h1 { font-family: 'Bricolage Grotesque', system-ui, sans-serif; font-weight: 800; font-size: 1.9rem; line-height: 1.1; margin: 0 0 .25rem; }
        p { margin: 0; }
        .hint { color: #4A6478; margin-bottom: 1.25rem; }
        #qr { display: grid; place-items: center; padding: 1rem; background: #fff; border-radius: 20px; border: 2px solid var(--mint); }
        #qr img, #qr canvas { max-width: 100%; height: auto; }
        .scan { margin-top: 1.25rem; font-weight: 700; }
        .url { margin-top: .5rem; font-size: .9rem; color: #4A6478; word-break: break-all; }
        .actions { margin-top: 1.5rem; display: flex; gap: .75rem; justify-content: center; flex-wrap: wrap; }
        .actions button, .actions a {
            min-height: 3.25rem; padding: .6rem 1.4rem; border-radius: 999px; border: 0; font: inherit; font-weight: 700;
            background: var(--sea); color: #fff; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center;
        }
        .actions .alt { background: var(--sun); color: var(--ink); }
        :focus-visible { outline: 4px solid var(--sun); outline-offset: 3px; }
        @media print {
            body { background: #fff; }
            .actions { display: none; }
        }
    </style>
</head>
<body>
    <main class="sticker">
        <h1>Tas Obat<br>{{ $tas['sapaan'] }} {{ $tas['pemilik'] }}</h1>
        <p class="hint">{{ $tas['usia'] }} tahun</p>

        <div id="qr" role="img" aria-label="Barcode QR jadwal obat"></div>

        <p class="scan">Scan dengan kamera HP untuk melihat jadwal obat</p>
        <p class="url">{{ route('tas.show', $slug) }}</p>

        <div class="actions">
            <button type="button" onclick="window.print()">Cetak</button>
            <button type="button" class="alt" id="download">Simpan gambar</button>
            <a class="alt" href="{{ route('tas.show', $slug) }}">Lihat halaman</a>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        var url = @json(route('tas.show', $slug));
        var box = document.getElementById('qr');
        new QRCode(box, { text: url, width: 280, height: 280, colorDark: '#14304A', colorLight: '#ffffff', correctLevel: QRCode.CorrectLevel.H });

        document.getElementById('download').addEventListener('click', function () {
            var canvas = box.querySelector('canvas');
            if (!canvas) return;
            var a = document.createElement('a');
            a.download = 'barcode-tas-obat-{{ $slug }}.png';
            a.href = canvas.toDataURL('image/png');
            a.click();
        });
    </script>
</body>
</html>
