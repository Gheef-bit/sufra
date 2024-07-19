<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S U F R A</title>
    <style>
        :root {
            --primary-color: #0072FF;
            --primaryy-color: #FF8C00
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

        .input-group {
            margin: 2rem 0;
        }

        .btns-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
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

        .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primaryy-color);
        }

        select,
        textarea,
        input[type="text"],
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
        }

        select:focus,
        textarea:focus,
        input[type="text"]:focus,
        input[type="file"]:focus,
        input[type="date"]:focus {
            border-color: #FF8C00;
            outline: 0;
            box-shadow: 0 0 0 0.2rem #FF8C00;
        }

        label, p {
            color: #FF8C00;
        }

        input::placeholder,
        textarea::placeholder {
            color: #FF8C00;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="/tambahfra" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Form Rencana Aksi</h1>
            <div class="input-group">
                <label for="leader">Pimpinan Rapat</label>
                <input type="text" id="leader" name="pimpinan_rapat" placeholder="Pimpinan Rapat" required>
            </div>
            <div class="input-group">
                <label for="date">Tanggal Rapat</label>
                <input type="date" id="date" name="tanggal_rapat" placeholder="Tanggal Rapat" required>
            </div>
            <div class="input-group">
                <label for="place">Tempat Rapat</label>
                <input type="text" id="place" name="tempat_rapat" placeholder="Tempat Rapat" required>
            </div>
            <div class="input-group">
                <label for="peserta">Peserta Rapat</label>
                <input type="text" id="peserta" name="peserta_rapat" placeholder="Peserta Rapat" required>
            </div>
            <div class="input-group">
                <label for="summary">Agenda</label>
                <textarea id="agenda" name="agenda" placeholder="Agenda"></textarea>
            </div>
            @foreach ($indikator as $indikator)
            <div class="input-group">
                <label for="summary">{{ $indikator->judul }}</label>
                <p>{{$indikator->keterangan}}</p>
                <p>{{$indikator->sasaran}}</p>
                <textarea id="kendala" name="kendala[]" placeholder="Kendala" required></textarea>
                <textarea id="solusi" name="solusi[]" placeholder="Solusi" required></textarea>
                <textarea id="rencana_tindak_lanjut" name="rencana_tindak_lanjut[]" placeholder="Rencana Tindak Lanjut" required></textarea>
            </div>
            @endforeach
            <div class="input-group">
                <label for="summary">Kesimpulan</label>
                <textarea id="summary" name="kesimpulan" placeholder="Kesimpulan"></textarea>
            </div>
            <!-- <div class="input-group">
                <label for="discussion">Diskusi/Tanya Jawab</label>

                <div class="input-group">
                    <input type="text" id="nama_penanya" placeholder="Nama" required>
                </div>
                <div class="input-group">
                    <input type="text" id="pertanyaan" placeholder="Pertanyaan" required>
                </div>
                <div class="input-group">
                    <input type="text" id="jawaban" placeholder="Jawaban" required>
                </div>
            </div> -->
            <div class="input-group">
                <label for="created-date">Tanggal Pengisian</label>
                <input type="date" id="insert-date" name="tanggal_pengisian" placeholder="Tanggal Pengisian" required>
            </div>
            <div class="input-group">
                <label for="note-taker">Notulis</label>
                <input type="text" id="note-taker" name="notulis" placeholder="Notulis" required>
            </div>
            <!-- <div class="input-group">
                <label for="signature">Foto Tanda Tangan Notulis</label>
                <input type="file" id="signature" name="foto_ttd_notulis" required>
            </div> -->
            <button type="submit" class="btn ml-auto">SUBMIT</button>
        </form>
    </div>
</body>

</html>