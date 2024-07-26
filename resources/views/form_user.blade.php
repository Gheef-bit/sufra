<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S U F R A</title>
    <style>
        :root {
            --primary-color: blue;
            --primaryy-color: black
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .boo {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 2rem;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            display: grid;
            place-items: center;
            min-height: 100vh;
            background: rgb(0, 0, 128);;
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
            color: black;
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
            color: black;
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
            background-color: red;
            color: #f3f3f3;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            border: 0;
            cursor: pointer;
            transition: 0.3%;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); */
        }

        .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px red;
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
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); */
        }

        .btnn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }

        .btnnn {
            padding: 1rem 2rem;
            display: block;
            /* text-decoration: none; */
            background-color: green;
            color: #f3f3f3;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            border: 0;
            cursor: pointer;
            transition: 0.3%;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); */
        }

        .btnnn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px green;
        }

        select,
        input[type="text"],
        input[type="file"],
        input[type="date"] {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: black;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid black;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); */
            height: 40px;
        }

        textarea {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: black;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid black;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); */
            height: 100px;
            margin-bottom: 2rem;
        }

        select:focus,
        textarea:focus,
        input[type="text"]:focus,
        input[type="file"]:focus,
        input[type="date"]:focus {
            border-color: black;
            outline: 0;
            /* box-shadow: 0 0 0 0.2rem black; */
        }

        label,
        p {
            color: black;
        }

        input::placeholder,
        textarea::placeholder {
            color: black;
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
                <label for="summary"><strong>{{ $indikator->judul }}</strong></label>
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
            <!-- <div id="indikator-container">
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
            </div> -->
            <div id="indikator-container">
                <div class="input-group">
                    <label for="discussion">Diskusi/Tanya Jawab</label>

                    <div class="input-group">
                        <input type="text" id="nama_penanya" name="nama_penanya[]" placeholder="Nama">
                    </div>
                    <div class="input-group">
                        <input type="text" id="pertanyaan" name="pertanyaan[]" placeholder="Pertanyaan">
                    </div>
                    <div class="input-group">
                        <input type="text" id="jawaban" name="jawaban[]" placeholder="Jawaban">
                    </div>
                </div>
            </div>
            <button type="button" class="btnnn ml-auto" id="add-input">Tambah Tanya Jawab</button>
            <div class="input-group">
                <label for="created-date">Tanggal Pengisian</label>
                <input type="date" id="insert-date" name="tanggal_pengisian" placeholder="Tanggal Pengisian" required>
            </div>
            <div class="input-group">
                <label for="note-taker">Notulis</label>
                <input type="text" id="note-taker" name="notulis" placeholder="Notulis" required>
            </div>
            <div class="input-group">
                <label for="pj">Penjabat yang berwenang</label>
                <input type="text" id="pj" name="pjwenang" placeholder="Penjabat yang berwenang" required>
            </div>
            <!-- <div class="input-group">
                <label for="realisasi">Realisasi</label>
                <input type="number" id="realisasi" name="publikasi" placeholder="Publikasi">
                <input type="number" id="realisasi" name="rilis" placeholder="Rilis">
            </div> -->
            <div class="input-group">
                <label for="dokumen_sumber">Dokumen Sumber</label>
                <input type="file" id="dokumen_sumber" name="files[]" required multiple>
            </div>
            
            
            <button type="submit" class="btnn ml-auto">SUBMIT</button>
        </form>
    </div>

    <script>
    let counter = 1;

    document.getElementById('add-input').addEventListener('click', function() {
        counter++;
        const container = document.getElementById('indikator-container');
        
        const newInputWrapper = document.createElement('div');
        newInputWrapper.className = 'boo';
        
        newInputWrapper.innerHTML = `
            <div class="input-group">
                <input type="text" name="nama_penanya[]" placeholder="Nama ${counter}">
            </div>
            <div class="input-group">
                <input type="text" name="pertanyaan[]" placeholder="Pertanyaan ${counter}">
            </div>
            <div class="input-group">
                <input type="text" name="jawaban[]" placeholder="Jawaban ${counter}">
            </div>
            <button class="btn ml-auto" onclick="removeInput(this)">Hapus</button>
        `;
        
        container.appendChild(newInputWrapper);
    });

    function removeInput(button) {
        const inputWrapper = button.parentNode;
        inputWrapper.remove();
        counter--;
    }
</script>
</body>

</html>