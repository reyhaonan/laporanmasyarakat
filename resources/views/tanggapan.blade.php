@extends('layouts.dashboard')
@section('title','Data tanggapan')

@section('pageInfo','Edit/hapus data tanggapan!')

@section('body')
<div class="modalBlur" onclick="cancelModal()" id="modalBlur"></div>
<div class="modal round" id="modal">
    <form method="POST" action="/tanggapan/update" id="editUser" enctype="multipart/form-data">@csrf</form>

    <textarea name="tanggapan" class="textarea round" placeholder="Isi tanggapan" id="tanggapan" form="editUser"></textarea>


    <button type="submit" class="submit round" id="submit" form="editUser">
        Update
    </button>
</div>
<div class="container">
    <table class="table">
        <tr class="table-head">
            <th>no.</th>
            <th>Foto pengaduan</th>
            <th>Nama petugas</th>
            <th style="width: 20%">Isi tanggapan</th>
            <th style="width: 20%">Isi laporan</th>
            <th>Tanggal dibuat</th>
            <th class="action"></th>
        </tr>
        @php
            $i = 1;
        @endphp

        @if (!$tanggapan->count())
        <tr><td class="empty" colspan="8">
            <div class="emptyState">
                <img src="/empty.png" alt="">
                <p>
                    Tidak ada Data!
                </p>
            </div>
        </td></tr>
        @endif

        @foreach ($tanggapan as $item)
            <tr class="data">
                <td style="width:10px">{{$i}}</td>
                <td class="data-pp"><img src="{{'/storage/'.$item->pengaduan->foto}}" style="cursor: zoom-in" onclick="preview('{{$item->pengaduan->foto}}')"></td>
                <td>{{$item->petugas->nama}}</td>
                <td>{{$item->tanggapan}}</td>
                <td>{{$item->pengaduan->isi_laporan}}</td>
                <td>{{$item->created_at->isoFormat('dddd, D MMMM Y H:MM')}}</td>
                <td class="actionTd">
                    <button class="edit round" onclick="editUser('{{$item->id}}','{{$item->tanggapan}}')">Edit</button>
                    <button type="submit" class="hapus round" form="delete-{{$item->id}}">Hapus</button>
                    <form action="/user/delete/{{$item->id}}" method="post" id="delete-{{$item->id}}">@csrf</form>
                </td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
    </table>
    <div class="pagination">
        <a href="{{$tanggapan->previousPageUrl()}}" class="prev round {{$tanggapan->onFirstPage()? 'disable':''}}" ><i class="icofont-arrow-left"></i></a>
        <a href="{{$tanggapan->nextPageUrl()}}" class="next round {{$tanggapan->hasMorePages()? '':'disable'}}"><i class="icofont-arrow-right"></i></a>
    </div>
</div>
@endsection

@section('style')
<style>
.empty{
    text-align: center;
    padding: 2rem 0
}
.rightForm{
    width: calc(100% - (3rem + (.8rem * 6) + 2rem));
    display: flex;
    flex-direction: column;
    padding-left: 1rem;
}
.textarea{
    border: 1px solid #DAE3EB;
    resize: vertical;
    margin-top: .5rem;
    width: 100%;
    min-height: 100px;
    max-height: 400px;
    padding: .6rem .8rem;
    color: #6c7885;
    font-size: 1rem
}
.textarea::placeholder{
    color: #c8d1da;
    font-size: 1rem
}
.modalBlur{
    cursor: pointer;
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 22;
    backdrop-filter: blur(4px);
    background: #2727279c;
}
.action{
    width: 300px;
    text-align: right
}
.actionTd{
    text-align: right
}
.modal{
    display: none;
    z-index: 23;
    background: #fff;
    padding: 1rem;
    flex-wrap: wrap;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%)
}
.edit{
    padding: .6rem .8rem;
    background: #f0d646;
    border: none;
    color: #000;
    cursor: pointer;
}
.hapus{
    padding: .6rem .8rem;
    background: #eb4e36;
    border: none;
    color: #fff;
    cursor: pointer;
}
.input{
    border: 1px solid #DAE3EB;
    padding: .6rem .8rem;
    color: #6c7885;
    font-size: 1rem;
    margin: .5rem 0
}
.is-invalid{
    border: 1px solid #eb4e36
}
.is-invalid::placeholder{
    color: #e9a095 !important;
}
.input::placeholder{
    color: #c8d1da;
    font-size: 1rem
}
.submit{
    border: none;
    color: #fff;
    background: #eb4e36;
    font-size: 1rem;
    margin-top: .5rem;
    margin-left: auto;
    padding: .5rem 1rem;
    cursor: pointer;
}
.modalTrigger{
    border: none;
    color: #fff;
    background: #eb4e36;
    font-size: 1rem;
    margin-left: auto;
    padding: .5rem 1rem;
    cursor: pointer;
}
.cancel{
    text-decoration: none;
    color: #eb4e36;
    text-align: center;
    padding: .5rem;
}
.invalid-feedback{
    font-size: .6rem;
    margin-top: -.4rem;
}
.invalid-feedback strong{
    color: #eb4e36 !important;
}

.pagination{
    margin-left: auto;
    margin-right: 2rem;
    margin-bottom: 2rem;
}
.pagination a{
    background: #eb4e36;
    padding: .6rem .8rem;
    text-decoration: none;
}
.disable{
    background: transparent !important;
    cursor: not-allowed;
}
.disable i{
    color: #eb4e36 !important
}
.pagination a i{
    color: white;
    font-size: 1.2rem
}
.table{
    border-collapse: collapse;
    margin: 2rem;
    width: calc(100% - 4rem);
    text-align: left;
    overflow: hidden;
}
.table-head{
    background: #fff;
    box-shadow: 0 2px 4px -2px #293b5ab4;
}
.table-head th{
    padding: 1rem 2rem;
    border: 1px solid #DAE3EB;
}
.data td{
    border: 1px solid #f5f8fc;
    padding: 1rem 2rem;
}
.data{
    border: 1px solid #FBFCFD
}
.data:nth-child(odd){
    background: #FBFCFD
}
.data-pp img{
    height: 50px;
}
.data-pp{
    width: 50px;
}
.container{
    display: flex;
    flex-direction: column
}

.addFoto{
    background-color: #f4f6f8;
    margin: .5rem 0;
    padding: .6rem .8rem;
    cursor: pointer;
    height: calc(3rem + (.8rem * 6) + 2rem);
    width: calc(3rem + (.8rem * 6) + 2rem);
    display: flex;
    background-size: cover;
    background-position: center
}
</style>
@endsection

@section('script')
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("foto").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uptext").innerHTML = "+ Ganti foto";
                document.getElementById("uptext").style.color = "#fff";
                document.getElementById("uploadLabel").style.border = "none";
                document.getElementById("uploadLabel").style.backgroundImage = "url("+ oFREvent.target.result +")";
            };
        };

        function openModal(){
            document.getElementById('modalBlur').style.display = 'inherit'
            document.getElementById('modal').style.display = 'flex'
        }
        function editUser(id,tanggapan){
            document.getElementById('tanggapan').value = tanggapan

            // form edit
            document.getElementById('editUser').action = '/tanggapan/update/' + id
            openModal()
        }
        function cancelModal(){
            document.getElementById('tanggapan').value = ''

            // form edit
            document.getElementById('editUser').action = '/user/update/'
            document.getElementById('modalBlur').style.display = 'none'
            document.getElementById('modal').style.display = 'none'
        }

    </script>
@endsection
