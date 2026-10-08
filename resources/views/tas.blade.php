<!DOCTYPE html>
<html lang="id" data-size="1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Obat {{ $tas['sapaan'] }} {{ $tas['pemilik'] }}</title>
    <meta name="theme-color" content="#0B7A7C">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #14304A;
            --muted: #4A6478;
            --sea: #0B7A7C;
            --sea-deep: #075759;
            --mint: #DDF2EC;
            --sun: #FFC64A;
            --coral: #FF6B57;
            --violet: #7A5CF0;
            --paper: #F4FAF9;
            --line: #CFE3E0;
            --radius: 28px;
            --display: 'Bricolage Grotesque', 'Atkinson Hyperlegible', system-ui, sans-serif;
        }
        * { box-sizing: border-box; }
        html { font-size: 100%; -webkit-text-size-adjust: 100%; }
        html[data-size="2"] { font-size: 118%; }
        html[data-size="3"] { font-size: 136%; }
        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: 'Atkinson Hyperlegible', system-ui, sans-serif;
            font-size: 1.125rem;
            line-height: 1.55;
        }
        h1, h2, h3 { font-family: var(--display); line-height: 1.1; margin: 0; }
        button { font: inherit; color: inherit; cursor: pointer; }
        :focus-visible { outline: 4px solid var(--sun); outline-offset: 3px; }

        /* ---------- Hero ---------- */
        .hero {
            position: relative;
            overflow: hidden;
            background: var(--sea);
            color: #fff;
            padding: 1rem 1.25rem 5.5rem;
            border-radius: 0 0 44px 44px;
        }
        .wrap { max-width: 44rem; margin: 0 auto; position: relative; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 1rem; }
        .brand { display: flex; align-items: center; gap: .5rem; font-weight: 700; }
        .sizes {
            display: flex; gap: .3rem; padding: .3rem;
            background: rgba(255,255,255,.18); border-radius: 999px;
        }
        .sizes button {
            border: 0; background: transparent; color: #fff; font-weight: 700;
            min-width: 2.75rem; min-height: 2.75rem; border-radius: 999px;
        }
        .sizes button[aria-pressed="true"] { background: #fff; color: var(--sea-deep); }
        .sizes .s1 { font-size: .9rem; } .sizes .s2 { font-size: 1.1rem; } .sizes .s3 { font-size: 1.35rem; }

        .hero-body { position: relative; margin-top: 2rem; padding-right: 7rem; min-height: 10rem; }
        .greet { font-size: 1.2rem; margin: 0; }
        .name { font-size: clamp(2.3rem, 9vw, 3.6rem); font-weight: 800; letter-spacing: -.02em; margin-top: .3rem; }
        .age {
            display: inline-block; margin-top: 1rem; padding: .4rem 1.1rem;
            background: #fff; color: var(--sea-deep); font-weight: 700; border-radius: 999px;
        }

        .art { position: absolute; right: -1rem; top: -.75rem; width: 9.5rem; height: 9.5rem; pointer-events: none; }
        .art svg { width: 100%; height: 100%; overflow: visible; }
        .capsule { transform-origin: 100px 100px; animation: drop 1.1s cubic-bezier(.3,1.5,.5,1) both, float 5s ease-in-out 1.1s infinite; }
        .bit { animation: bob 4s ease-in-out infinite; }
        .bit.b2 { animation-delay: -1.3s; } .bit.b3 { animation-delay: -2.4s; }
        @keyframes drop { from { transform: translateY(-160px) rotate(-70deg); opacity: 0; } to { transform: translateY(0) rotate(32deg); opacity: 1; } }
        @keyframes float { 0%,100% { transform: translateY(0) rotate(32deg); } 50% { transform: translateY(-10px) rotate(24deg); } }
        @keyframes bob { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }

        /* ---------- Isi ---------- */
        main { padding: 0 1.25rem 3rem; }
        .progress {
            margin-top: -3.25rem; background: #fff; border-radius: var(--radius);
            border: 2px solid var(--line); padding: 1.25rem;
            box-shadow: 0 10px 0 -4px var(--line);
        }
        .progress-row { display: flex; align-items: center; gap: 1.25rem; }
        .ring { flex: none; width: 6.25rem; height: 6.25rem; position: relative; }
        .ring svg { width: 100%; height: 100%; transform: rotate(-90deg); }
        .ring .track { stroke: var(--mint); }
        .ring .fill { stroke: var(--sea); stroke-linecap: round; stroke-dasharray: 276.46; stroke-dashoffset: 276.46; transition: stroke-dashoffset .9s cubic-bezier(.2,.8,.2,1); }
        .ring .num { position: absolute; inset: 0; display: grid; place-items: center; font-family: var(--display); font-weight: 800; font-size: 1.6rem; }
        .ring .num small { font-size: .8rem; font-weight: 600; color: var(--muted); }
        .progress h2 { font-size: 1.5rem; }
        .progress p { margin: .25rem 0 0; color: var(--muted); }

        .now-banner {
            margin-top: 1rem; padding: .9rem 1.1rem; border-radius: 18px;
            background: var(--sun); font-weight: 700; display: flex; gap: .7rem; align-items: center;
        }
        .now-banner[hidden] { display: none; }
        .now-banner .em { font-size: 1.7rem; line-height: 1; }

        .section-title { font-size: 1.6rem; margin: 2.25rem 0 1rem; }
        .list { display: grid; gap: 1.25rem; padding: 0; margin: 0; list-style: none; }

        .med {
            --tone: var(--coral);
            background: #fff; border: 2px solid var(--line); border-radius: var(--radius); overflow: hidden;
            animation: rise .7s cubic-bezier(.2,.8,.2,1) both;
            animation-delay: calc(.9s + var(--i) * .12s);
        }
        .med.coral { --tone: var(--coral); } .med.sun { --tone: var(--sun); }
        .med.sea { --tone: var(--sea); } .med.violet { --tone: var(--violet); }
        @keyframes rise { from { opacity: 0; transform: translateY(28px); } to { opacity: 1; transform: none; } }

        .med-head { display: flex; gap: 1rem; align-items: center; padding: 1.25rem 1.25rem .75rem; }
        .med-icon { flex: none; width: 3.6rem; height: 3.6rem; border-radius: 50%; background: var(--tone); display: grid; place-items: center; }
        .med-icon svg { width: 2rem; height: 2rem; transform: rotate(35deg); }
        .med h3 { font-size: 1.55rem; }
        .facts { display: flex; flex-wrap: wrap; gap: .5rem; padding: 0 1.25rem; }
        .fact { border-radius: 999px; padding: .3rem .95rem; background: var(--mint); font-weight: 700; }
        .fact.dose { background: #fff; border: 3px solid var(--tone); font-size: 1.25rem; }
        .fungsi { margin: .9rem 1.25rem 0; }
        .fungsi strong { display: block; }

        .pockets {
            margin-top: 1.1rem; padding: 1rem 1.25rem 1.25rem; background: #EEF7F5;
            display: grid; grid-template-columns: repeat(auto-fit, minmax(5.2rem, 1fr)); gap: .65rem;
        }
        .pocket {
            position: relative; min-height: 5.5rem; padding: .6rem .4rem; border-radius: 22px;
            background: #fff; border: 3px solid var(--line);
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: .1rem;
            transition: background .25s, border-color .25s, color .25s;
        }
        .pocket .em { font-size: 1.7rem; line-height: 1.1; }
        .pocket .lbl { font-weight: 700; }
        .pocket .st { font-size: .9rem; color: var(--muted); }
        .pocket.now:not([aria-pressed="true"]) { border-color: var(--coral); animation: ping 1.8s ease-out infinite; }
        @keyframes ping { 0% { box-shadow: 0 0 0 0 rgba(255,107,87,.55); } 80%,100% { box-shadow: 0 0 0 14px rgba(255,107,87,0); } }
        .pocket[aria-pressed="true"] { background: var(--sea); border-color: var(--sea); color: #fff; animation: pop .45s cubic-bezier(.3,1.6,.5,1); }
        .pocket[aria-pressed="true"] .st { color: #fff; }
        @keyframes pop { 0% { transform: scale(.85); } 100% { transform: scale(1); } }

        .contact {
            margin-top: 2rem; padding: 1.25rem; border-radius: var(--radius);
            background: var(--ink); color: #fff; display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;
        }
        .contact p { margin: 0; }
        .call {
            display: inline-flex; align-items: center; gap: .5rem; min-height: 3.25rem; padding: .6rem 1.3rem;
            background: var(--sun); color: var(--ink); font-weight: 700; text-decoration: none; border-radius: 999px;
        }
        .foot { margin: 2rem 0 0; color: var(--muted); font-size: 1rem; }
        .reset { margin-top: 1rem; background: none; border: 2px solid var(--line); border-radius: 999px; padding: .55rem 1.2rem; color: var(--muted); font-weight: 700; }

        /* ---------- Perayaan ---------- */
        .fall { position: fixed; top: -3rem; width: 1rem; height: 2rem; border-radius: 1rem; z-index: 50; pointer-events: none; animation: fall linear forwards; }
        @keyframes fall { to { transform: translateY(110vh) rotate(540deg); } }

        @media (max-width: 30rem) {
            .hero-body { padding-right: 5.5rem; }
            .art { width: 7.5rem; height: 7.5rem; right: -.75rem; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; }
            .capsule { transform: rotate(32deg); }
        }
    </style>
</head>
<body>

<header class="hero">
    <div class="wrap">
        <div class="topbar">
            <div class="brand">
                <svg width="26" height="26" viewBox="0 0 24 24" aria-hidden="true"><g transform="rotate(35 12 12)"><path d="M7 12V8a5 5 0 0 1 10 0v4z" fill="#FFC64A"/><path d="M7 12v4a5 5 0 0 0 10 0v-4z" fill="#fff"/></g></svg>
                Tas Obat
            </div>
            <div class="sizes" role="group" aria-label="Ukuran tulisan">
                <button type="button" class="s1" data-size="1" aria-label="Tulisan normal" aria-pressed="true">A</button>
                <button type="button" class="s2" data-size="2" aria-label="Tulisan besar" aria-pressed="false">A</button>
                <button type="button" class="s3" data-size="3" aria-label="Tulisan sangat besar" aria-pressed="false">A</button>
            </div>
        </div>

        <div class="hero-body">
            <p class="greet" id="greet">Selamat datang,</p>
            <h1 class="name">{{ $tas['sapaan'] }} {{ $tas['pemilik'] }}</h1>
            <span class="age">{{ $tas['usia'] }} tahun</span>

            <div class="art" aria-hidden="true">
                <svg viewBox="0 0 200 200">
                    <circle class="bit b1" cx="30" cy="150" r="14" fill="#FFC64A"/>
                    <circle class="bit b2" cx="165" cy="170" r="10" fill="#DDF2EC"/>
                    <circle class="bit b3" cx="20" cy="60" r="8" fill="#FF6B57"/>
                    <g class="capsule">
                        <path d="M60 100V60a40 40 0 0 1 80 0v40z" fill="#FF6B57"/>
                        <path d="M60 100v40a40 40 0 0 0 80 0v-40z" fill="#fff"/>
                        <rect x="73" y="42" width="9" height="46" rx="4.5" fill="#fff" opacity=".55"/>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</header>

<main class="wrap">
    <section class="progress" aria-live="polite">
        <div class="progress-row">
            <div class="ring">
                <svg viewBox="0 0 100 100" aria-hidden="true">
                    <circle class="track" cx="50" cy="50" r="44" fill="none" stroke-width="10"/>
                    <circle class="fill" id="ringFill" cx="50" cy="50" r="44" fill="none" stroke-width="10"/>
                </svg>
                <div class="num"><span><span id="done">0</span><small>/{{ $totalDosis }}</small></span></div>
            </div>
            <div>
                <h2 id="headline">Yuk mulai minum obat hari ini</h2>
                <p>Ketuk tombol waktu di tiap obat setelah selesai minum.</p>
            </div>
        </div>
        <div class="now-banner" id="nowBanner" hidden>
            <span class="em" id="nowEmoji">🌅</span>
            <span id="nowText"></span>
        </div>
    </section>

    <h2 class="section-title">Obat yang harus diminum</h2>

    <ul class="list">
        @foreach ($tas['obat'] as $i => $obat)
            <li class="med {{ $obat['warna'] ?? 'coral' }}" style="--i: {{ $i }}">
                <div class="med-head">
                    <div class="med-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M7 12V8a5 5 0 0 1 10 0v4z" fill="#14304A"/><path d="M7 12v4a5 5 0 0 0 10 0v-4z" fill="#fff"/></svg>
                    </div>
                    <h3>{{ $obat['nama'] }}</h3>
                </div>

                <div class="facts">
                    <span class="fact dose">{{ $obat['dosis'] }}</span>
                    <span class="fact">{{ $obat['frekuensi'] }}× sehari</span>
                    @if (!empty($obat['aturan']))
                        <span class="fact">{{ $obat['aturan'] }}</span>
                    @endif
                </div>

                <p class="fungsi"><strong>Untuk apa?</strong> {{ $obat['fungsi'] }}</p>

                <div class="pockets">
                    @foreach ($obat['waktu'] as $w)
                        <button type="button" class="pocket"
                                data-id="{{ $i }}-{{ $w['kunci'] }}"
                                data-slot="{{ $w['kunci'] }}"
                                aria-pressed="false"
                                aria-label="{{ $obat['nama'] }}, {{ strtolower($w['label']) }}">
                            <span class="em" aria-hidden="true">{{ $w['ikon'] }}</span>
                            <span class="lbl">{{ $w['label'] }}</span>
                            <span class="st">Belum</span>
                        </button>
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>

    @if (!empty($tas['kontak']))
        <section class="contact">
            <p><strong>Butuh bantuan?</strong><br>Hubungi {{ $tas['kontak']['nama'] }}</p>
            <a class="call" href="tel:{{ preg_replace('/\D+/', '', $tas['kontak']['telepon']) }}">
                📞 {{ $tas['kontak']['telepon'] }}
            </a>
        </section>
    @endif

    <p class="foot">Jadwal ini mengikuti anjuran dokter atau apoteker. Jika ragu, tanyakan dulu sebelum minum obat.</p>
    <button type="button" class="reset" id="reset">Kosongkan centang hari ini</button>
</main>

<script>
(function () {
    var SLUG = @json($slug);
    var TOTAL = {{ (int) $totalDosis }};
    var C = 276.46;
    var ORDER = ['pagi', 'siang', 'sore', 'malam'];
    var NAMA = { pagi: 'pagi', siang: 'siang', sore: 'sore', malam: 'malam' };
    var IKON = { pagi: '🌅', siang: '☀️', sore: '🌇', malam: '🌙' };

    var now = new Date();
    var hour = now.getHours();
    var today = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
    var KEY = 'tasobat:' + SLUG + ':' + today;

    function slotAt(h) { return h >= 4 && h < 11 ? 'pagi' : h < 15 && h >= 11 ? 'siang' : h >= 15 && h < 18 ? 'sore' : 'malam'; }
    var current = slotAt(hour);

    function safeGet(k) { try { return localStorage.getItem(k); } catch (e) { return null; } }
    function safeSet(k, v) { try { localStorage.setItem(k, v); } catch (e) {} }

    /* Ukuran tulisan */
    var sizeBtns = document.querySelectorAll('.sizes button');
    function setSize(n) {
        document.documentElement.setAttribute('data-size', n);
        sizeBtns.forEach(function (b) { b.setAttribute('aria-pressed', b.dataset.size === String(n)); });
        safeSet('tasobat:size', n);
    }
    sizeBtns.forEach(function (b) { b.addEventListener('click', function () { setSize(b.dataset.size); }); });
    setSize(safeGet('tasobat:size') || 1);

    /* Sapaan */
    var sapa = { pagi: 'Selamat pagi,', siang: 'Selamat siang,', sore: 'Selamat sore,', malam: 'Selamat malam,' };
    document.getElementById('greet').textContent = sapa[current];

    /* Centang minum obat */
    var pockets = Array.prototype.slice.call(document.querySelectorAll('.pocket'));
    var state = {};
    try { state = JSON.parse(safeGet(KEY) || '{}') || {}; } catch (e) { state = {}; }
    var lastDone = -1;

    function render(celebrate) {
        var done = 0;
        pockets.forEach(function (p) {
            var on = !!state[p.dataset.id];
            if (on) done++;
            p.setAttribute('aria-pressed', on);
            p.querySelector('.st').textContent = on ? 'Sudah \u2713' : 'Belum';
        });

        document.getElementById('done').textContent = done;
        document.getElementById('ringFill').style.strokeDashoffset = TOTAL ? C * (1 - done / TOTAL) : C;

        var head = document.getElementById('headline');
        head.textContent = done === 0 ? 'Yuk mulai minum obat hari ini'
            : done < TOTAL ? 'Bagus! Lanjutkan ya' : 'Semua obat hari ini sudah diminum. Hebat!';

        /* Waktu minum berikutnya */
        var present = ORDER.filter(function (s) { return pockets.some(function (p) { return p.dataset.slot === s; }); });
        var target = present.filter(function (s) { return ORDER.indexOf(s) >= ORDER.indexOf(current); })[0];
        var banner = document.getElementById('nowBanner');
        pockets.forEach(function (p) { p.classList.remove('now'); });

        var pendingAll = TOTAL - done;
        var pendingTarget = pockets.filter(function (p) { return p.dataset.slot === target && !state[p.dataset.id]; });

        if (pendingAll === 0) {
            banner.hidden = true;
        } else if (target && pendingTarget.length) {
            banner.hidden = false;
            document.getElementById('nowEmoji').textContent = IKON[target];
            document.getElementById('nowText').textContent = (target === current ? 'Waktunya minum obat ' : 'Berikutnya: minum obat ') + NAMA[target] + ' (' + pendingTarget.length + ' obat)';
            if (target === current) pendingTarget.forEach(function (p) { p.classList.add('now'); });
        } else if (!target) {
            banner.hidden = false;
            document.getElementById('nowEmoji').textContent = '📝';
            document.getElementById('nowText').textContent = 'Masih ada ' + pendingAll + ' dosis yang belum dicentang.';
        } else {
            banner.hidden = true;
        }

        if (celebrate && done === TOTAL && lastDone < TOTAL && TOTAL > 0) confetti();
        lastDone = done;
    }

    pockets.forEach(function (p) {
        p.addEventListener('click', function () {
            state[p.dataset.id] = !state[p.dataset.id];
            if (!state[p.dataset.id]) delete state[p.dataset.id];
            safeSet(KEY, JSON.stringify(state));
            render(true);
        });
    });

    document.getElementById('reset').addEventListener('click', function () {
        state = {};
        safeSet(KEY, '{}');
        render(false);
    });

    /* Hujan kapsul saat semua obat selesai diminum */
    function confetti() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        var colors = ['#FF6B57', '#FFC64A', '#0B7A7C', '#7A5CF0', '#DDF2EC'];
        for (var i = 0; i < 28; i++) {
            var el = document.createElement('span');
            el.className = 'fall';
            el.style.left = Math.random() * 100 + 'vw';
            el.style.background = colors[i % colors.length];
            el.style.animationDuration = (2 + Math.random() * 1.8) + 's';
            el.style.animationDelay = (Math.random() * .6) + 's';
            document.body.appendChild(el);
            setTimeout(function (e) { e.remove(); }, 4800, el);
        }
    }

    render(false);
})();
</script>
</body>
</html>
