@extends('layouts.dashboard')
@section('title','Data petugas')

@section('pageInfo','Tambahkan/hapus data petugas!')

@section('body')
<div class="modalBlur" onclick="cancelModal()" id="modalBlur"></div>
<div class="modal round" id="modal">
    <form method="POST" action="/user/create" id="createPetugas" enctype="multipart/form-data">@csrf</form>

    <label for="foto" class="addFoto round" id="uploadLabel">
        <p style="margin: auto;" id="uptext">+ Upload foto</p>
    </label>
    <input type="file" form="createPetugas" name="foto" onchange="PreviewImage()" required id="foto" hidden accept="image/*">

    <div class="rightForm">
        <input id="nama" type="text" class="input round @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autofocus form="createPetugas" placeholder="Nama lengkap">

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="username" type="text" class="input round @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus form="createPetugas" placeholder="Username">

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" class="input round @error('password') is-invalid @enderror" name="password" required form="createPetugas" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <button type="submit" class="submit round" id="submit" form="createPetugas">
        Buat
    </button>
</div>
<div class="container">
    <form action="/dashboard/petugas" method="get" id="search"></form>
    <div class="searchContainer round">
        <input type="text" name="search" value="{{Request::get('search')}}" class="searchInput round" placeholder="Cari data petugas.." form="search">
        <button type="submit" form="search" class="searchSubmit"><i class="icofont-search"></i></button>
    </div>
    <table class="table">
        <tr class="table-head">
            <th>no.</th>
            <th>Foto profil</th>
            <th>Nama lengkap</th>
            <th>Username</th>
            <th class="action"><button onclick="openModal()" class="modalTrigger round">+ Tambah petugas baru</button></th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($petugas as $item)
            <tr class="data">
                <td style="width:10px">{{$i}}</td>
                <td class="data-pp"><img src="{{'/storage/'.$item->foto}}" style="cursor: zoom-in" onclick="preview('{{$item->foto}}')"></td>
                <td>{{$item->nama}}</td>
                <td>{{$item->username}}</td>
                <td class="actionTd">
                    <button class="edit round" onclick="editUser('{{$item->id}}','{{$item->nama}}','{{$item->username}}','{{$item->foto}}')">Edit</button>
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
        <a href="{{$petugas->previousPageUrl()}}" class="prev round {{$petugas->onFirstPage()? 'disable':''}}"><i class="icofont-arrow-left"></i></a>
        <a href="{{$petugas->nextPageUrl()}}" class="next round {{$petugas->hasMorePages()? '':'disable'}}"><i class="icofont-arrow-right"></i></a>
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
    margin-top: 1rem;
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
    border: 2px dotted #DAE3EB;
    margin: .5rem 0;
    padding: .6rem .8rem;
    cursor: pointer;
    height: calc(3rem + (.8rem * 6) + 2rem);
    width: calc(3rem + (.8rem * 6) + 2rem);
    display: flex;
    background-size: cover;
    background-position: center
}

.searchContainer{
    display: flex;
    margin: 2rem;
    margin-bottom: 0;
    margin-right: auto;
    border: 1px solid #DAE3EB;
}
.searchContainer input{
    border: none;
    width: 300px;
    padding: .6rem .8rem;
    color: #6c7885;
    font-size: 1rem;

}
.searchContainer input::placeholder{
    color: #c8d1da;
    font-size: 1rem
}
.searchContainer button{
    background: none;
    border: none;
    margin-right: 1rem;
    cursor: pointer;
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
        function editUser(id,nama,username,url){
            document.getElementById('username').value = username
            document.getElementById("uploadLabel").style.backgroundImage = "url(/storage/"+ url +")";
            document.getElementById("uploadLabel").style.border = "none";
            document.getElementById("uptext").innerHTML = "+ Ganti foto";
            document.getElementById("submit").innerHTML = "Update";
            document.getElementById("uptext").style.color = "#fff";
            document.getElementById('nama').value = nama
            document.getElementById('password').style.display = 'none'
            document.getElementById('password').required = false
            document.getElementById('foto').required = false

            // form edit
            document.getElementById('createPetugas').action = '/user/update/' + id
            openModal()
        }
        function cancelModal(){
            document.getElementById('username').value = ''
            document.getElementById("uploadLabel").style.backgroundImage = "";
            document.getElementById("uploadLabel").style.border = "2px dotted #DAE3EB";
            document.getElementById("uptext").innerHTML = "+ Upload foto";
            document.getElementById("submit").innerHTML = "Buat";
            document.getElementById("uptext").style.color = "#98adbd";
            document.getElementById('nama').value = ''
            document.getElementById('password').style.display = 'inherit'
            document.getElementById('password').required = true
            document.getElementById('foto').required = true

            // form edit
            document.getElementById('createPetugas').action = '/user/create'
            document.getElementById('modalBlur').style.display = 'none'
            document.getElementById('modal').style.display = 'none'
        }

    </script>
@endsection
