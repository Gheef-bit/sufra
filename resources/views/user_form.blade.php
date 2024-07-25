<!DOCTYPE html>
<html>

<head>
    <title>Tambah User</title>
    <style>
        :root {
            --primary-color: #0072FF;
            --primaryy-color: #FF8C00;
            --primaryyy-color: #4CAF50;

        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            display: grid;
            place-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #0072FF, #4CAF50, #FF8C00);
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px solid black;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1000px;
            overflow-x: hidden;
            margin-top: 80px;
            margin-bottom: 80px;
            border-radius: 0.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .width-50 {
            width: 100px;
        }

        .ml-auto {
            margin-left: auto;
        }

        .mr-auto {
            margin-right: auto;
        }

        .text-center {
            text-align: center;
            color: #FF8C00;
        }

        .progressbar {
            position: relative;
            display: flex;
            justify-content: space-between;
            counter-reset: step;
            margin: 2rem 0 4rem;
        }

        .progressbar::before {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 4px;
            width: 95%;
            background-color: #dcdcdc;
            z-index: 0;
        }

        .progress {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 4px;
            width: 0%;
            background-color: var(--primary-color);
            z-index: 0;
            transition: width 0.3s;
        }

        .progress-step {
            position: relative;
            width: 3rem;
            height: 3rem;
            background-color: #dcdcdc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .progress-step::before {
            counter-increment: step;
            content: counter(step);
        }

        .progress-step::after {
            content: attr(data-title);
            position: absolute;
            top: calc(100% + 0.5rem);
            font-size: 0.85rem;
            white-space: nowrap;
            text-align: center;
            width: max-content;
            padding: 0 0.5rem;
        }

        .progress-step-active {
            background-color: var(--primary-color);
            color: #FF8C00;
        }

        .form {
            width: clamp(320px, 30%, 430px);
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 0.35rem;
            padding: 1.5rem;
        }

        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }

        .btns-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 1rem 2rem;
            display: block;
            /* text-decoration: none; */
            background-color: var(--primaryy-color);
            color: #f3f3f3;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            border: 0;
            cursor: pointer;
            transition: 0.3%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .btnn {
            padding: 1rem 2rem;
            display: block;
            /* text-decoration: none; */
            background-color: var(--primary-color);
            color: #f3f3f3;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            border: 0;
            cursor: pointer;
            transition: 0.3%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .btnnn {
            padding: 1rem 2rem;
            display: block;
            /* text-decoration: none; */
            background-color: var(--primaryyy-color);
            color: #f3f3f3;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            border: 0;
            cursor: pointer;
            transition: 0.3%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primaryy-color);
        }

        select,
        input[type="text"],
        input[type="number"],
        input[type="file"],
        input[type="date"] {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #FF8C00;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #FF8C00;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            height: 40px;
            margin-bottom: 2rem;
        }

        textarea {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #FF8C00;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #FF8C00;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            height: 100px;
            margin-bottom: 2rem;
        }

        select:focus,
        textarea:focus,
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus,
        input[type="date"]:focus {
            border-color: #FF8C00;
            outline: 0;
            box-shadow: 0 0 0 0.2rem #FF8C00;
        }

        label,
        h2,
        p {
            color: #FF8C00;
        }

        input::placeholder,
        textarea::placeholder {
            color: #FF8C00;
            opacity: 1;
        }

        .boo {
            border: 1px solid #FF8C00;
            padding: 10px;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>

    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
    @endif

    <div class="container">
        <form action="/insertOrUpdate" method="post">
            @csrf
            <h1 class="text-center">Tambah User</h1>
            <div class="input-group">
                <label for="tim">Tim</label>
                <input type="number" name="tim" id="tim" placeholder="Tim" required>
            </div>
            <div class="input-group">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" required>
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <label for="topik">Topik</label>
                <textarea name="topik" id="topik" required></textarea>
            </div>

            <div id="indikator-container">
                <h2 style="margin: 0;">Indikator Kinerja Utama</h2>
                <div class="input-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul[]" id="judul" required>
                </div>
                <div class="input-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan[]" id="keterangan"></textarea>
                </div>
                <div class="input-group">
                    <label for="sasaran">Sasaran</label>
                    <textarea name="sasaran[]" id="sasaran"></textarea>
                </div>
            </div>
            <div class="btns-group">
                <button class="btnnn" type="button" onclick="addindikator()">Tambah Indikator</button>
                <button class="btnn" type="submit">Submit</button>
            </div>

    </div>
    <br>
    </form>
    </div>

    <script>
        let indikatorCount = 1;

        function addindikator() {
            indikatorCount++;

            var container = document.getElementById('indikator-container');

            var div = document.createElement('div');
            div.className = 'boo';

            var labelJudul = document.createElement('label');
            labelJudul.htmlFor = 'judul' + indikatorCount;
            labelJudul.innerText = 'Judul ' + indikatorCount;
            div.appendChild(labelJudul);

            var inputJudul = document.createElement('input');
            inputJudul.type = 'text';
            inputJudul.name = 'judul[]';
            inputJudul.id = 'judul' + indikatorCount;
            inputJudul.required = true;
            div.appendChild(inputJudul);

            var labelKeterangan = document.createElement('label');
            labelKeterangan.htmlFor = 'keterangan' + indikatorCount;
            labelKeterangan.innerText = 'Keterangan ' + indikatorCount + ':';
            div.appendChild(labelKeterangan);

            var ta_Keterangan = document.createElement('textarea');
            ta_Keterangan.type = 'text';
            ta_Keterangan.name = 'keterangan[]';
            ta_Keterangan.id = 'keterangan' + indikatorCount;
            ta_Keterangan.required = false;
            div.appendChild(ta_Keterangan);

            var labelsasaran = document.createElement('label');
            labelsasaran.htmlFor = 'sasaran' + indikatorCount;
            labelsasaran.innerText = 'sasaran ' + indikatorCount + ':';
            div.appendChild(labelsasaran);

            var ta_sasaran = document.createElement('textarea');
            ta_sasaran.type = 'text';
            ta_sasaran.name = 'sasaran[]';
            ta_sasaran.id = 'sasaran' + indikatorCount;
            ta_sasaran.required = false;
            div.appendChild(ta_sasaran);

            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn ml-auto';
            removeButton.onclick = function() {
                removeIndikator(this);
            };
            removeButton.innerText = 'Hapus';
            div.appendChild(removeButton);

            container.appendChild(div);
        }

        function removeIndikator(button) {
            button.parentElement.remove();
            indikatorCount--;
        }
    </script>
</body>

</html>