@extends('layouts.dashboard')
@section('title','Data pengaduan')

@section('pageInfo','Atur/Hapus data pengaduan!')

@section('body')
<div class="container">
    <table class="table">
        <tr class="table-head">
            <th>no.</th>
            <th>Foto</th>
            <th>Nama Pelapor</th>
            <th style="width:30%">Isi laporan</th>
            <th>Status</th>
            <th>Tanggal laporan</th>
            <th class="action"></th>
        </tr>
        @php
            $i = 1;
        @endphp

        @if (!$pengaduan->count())
            <tr><td class="empty" colspan="8">
                <div class="emptyState">
                    <img src="/empty.png" alt="">
                    <p>
                        Tidak ada Data!
                    </p>
                </div>
            </td></tr>
        @endif

        @foreach ($pengaduan as $item)
            <tr class="data">
                <td style="width:10px">{{$i}}</td>
                <td class="data-pp"><img src="{{'/storage/'.$item->foto}}" style="cursor: zoom-in" onclick="preview('{{$item->foto}}')"></td>
                <td>{{$item->user->nama}}</td>
                <td class="isi_laporan">{{$item->isi_laporan}}</td>
                <td><span class="{{$item->status == 'selesai'?'selesai':'proses'}} round">{{$item->status}}</span></td>
                <td>{{$item->created_at->isoFormat('dddd, D MMMM Y H:MM')}}</td>
                <td class="actionTd">
                    <button type="submit" class="hapus round" form="delete-{{$item->id}}">Hapus</button>
                    <form action="/pengaduan/delete/{{$item->id}}" method="post" id="delete-{{$item->id}}">@csrf</form>
                </td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
    </table>
    <div class="pagination">
        <a href="{{$pengaduan->previousPageUrl()}}" class="prev round {{$pengaduan->onFirstPage()? 'disable':''}}" ><i class="icofont-arrow-left"></i></a>
        <a href="{{$pengaduan->nextPageUrl()}}" class="next round {{$pengaduan->hasMorePages()? '':'disable'}}"><i class="icofont-arrow-right"></i></a>
    </div>
</div>
@endsection

@section('style')
<style>
.empty{
    text-align: center;
    padding: 2rem 0
}
.isi_laporan{
    max-height: 50px
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
.action{
    width: 300px;
    text-align: right
}
.actionTd{
    text-align: right
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
.selesai{
    color: #45eb36;
    border: 1px solid #45eb36;
    padding: .1rem .3rem;
}
.proses{
    color: #eb4e36;
    border: 1px solid #eb4e36;
    padding: .1rem .3rem;
}
.container{
    width: 100%;
}
</style>
@endsection
