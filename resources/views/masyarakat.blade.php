@extends('layouts.dashboard')
@section('title','Data masyarakat')

@section('pageInfo','Edit/hapus data masyarakat!')

@section('body')
<div class="modalBlur" onclick="cancelModal()" id="modalBlur"></div>
<div class="modal round" id="modal">
    <form method="POST" action="/user/update" id="editUser" enctype="multipart/form-data">@csrf</form>

    <label for="foto" class="addFoto round" id="uploadLabel">
        <p style="margin: auto;color:#fff" id="uptext">Ganti foto</p>
    </label>
    <input type="file" form="editUser" name="foto" onchange="PreviewImage()" id="foto" hidden accept="image/*">

    <div class="rightForm">
        <input id="nama" type="text" class="input round @error('nama') is-invalid @enderror" name="nama" autocomplete="off" required autofocus form="editUser" placeholder="Nama lengkap">

        <input id="nik" type="number" class="input round @error('nik') is-invalid @enderror" name="nik" autocomplete="off" required autofocus form="editUser" placeholder="NIK">

        <input id="notelp" type="number" class="input round @error('notelp') is-invalid @enderror" name="notelp" autocomplete="off" required autofocus form="editUser" placeholder="Nomor telepon">
        <input id="username" type="hidden" name="username" form="editUser">

    </div>

    <textarea name="alamat" class="textarea round" placeholder="Alamat" id="alamat" form="editUser"></textarea>


    <button type="submit" class="submit round" id="submit" form="editUser">
        Update
    </button>
</div>
<div class="container">
    <table class="table">
        <tr class="table-head">
            <th>no.</th>
            <th>Foto profil</th>
            <th>NIK</th>
            <th>Nama lengkap</th>
            <th>Alamat</th>
            <th>No telp</th>
            <th class="action"></th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($masyarakat as $item)
            <tr class="data">
                <td style="width:10px">{{$i}}</td>
                <td class="data-pp"><img src="{{'/storage/'.$item->foto}}" style="cursor: zoom-in" onclick="preview('{{$item->foto}}')"></td>
                <td>{{$item->nik}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->notelp}}</td>
                <td class="actionTd">
                    <button class="edit round" onclick="editUser('{{$item->id}}','{{$item->nama}}','{{$item->nik}}','{{$item->alamat}}','{{$item->notelp}}','{{$item->foto}}','{{$item->username}}')">Edit</button>
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
        <a href="{{$masyarakat->previousPageUrl()}}" class="prev round {{$masyarakat->onFirstPage()? 'disable':''}}" ><i class="icofont-arrow-left"></i></a>
        <a href="{{$masyarakat->nextPageUrl()}}" class="next round {{$masyarakat->hasMorePages()? '':'disable'}}"><i class="icofont-arrow-right"></i></a>
    </div>
</div>
@endsection

@section('style')
<style>
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
        function editUser(id,nama,nik,alamat,notelp,url,username){
            document.getElementById('notelp').value = notelp
            document.getElementById("uploadLabel").style.backgroundImage = "url(/storage/"+ url +")";
            document.getElementById('nama').value = nama
            document.getElementById('nik').value = nik
            document.getElementById('alamat').value = alamat
            document.getElementById('username').value = username

            // form edit
            document.getElementById('editUser').action = '/user/update/' + id
            openModal()
        }
        function cancelModal(){
            document.getElementById('notelp').value = ''
            document.getElementById("uploadLabel").style.backgroundImage = ''
            document.getElementById('nama').value = ''
            document.getElementById('nik').value = ''
            document.getElementById('alamat').value = ''

            // form edit
            document.getElementById('editUser').action = '/user/update/'
            document.getElementById('modalBlur').style.display = 'none'
            document.getElementById('modal').style.display = 'none'
        }

    </script>
@endsection
