@extends('layouts.dashboard')
@section('title','Dashboard')

@section('pageInfo','Tanggapi laporan masyarakat secara langsung!')

@section('body')
<div class="container">
    <div class="reportContainer">
        @if (!$pengaduan->count())
            <div class="emptyState">
                <img src="/empty.png" alt="">
                <p>
                    Tidak ada laporan!
                </p>
            </div>
        @endif
        @foreach ($pengaduan as $item)
            <div class="reportCard round">
                <div class="reportPic" style="{{'background-image:url(/storage/'.$item->foto.')'}}"></div>
                <div class="profil">
                    <div class="pelapor_pp" style="{{'background-image:url(/storage/'.$item->user->foto.')'}}">
                    </div>
                    <span class="pelapor_nama bold">{{$item->user->nama}}</span>
                    <span class="pelapor_tanggal">{{$item->created_at->isoFormat('dddd, D MMMM Y H:MM')}}</span>

                </div>
                <p class="isi_laporan black">
                    <small>isi laporan : </small>
                    <br>
                    {{$item->isi_laporan}}
                </p>
                <div class="reply">
                    <input id="tanggapan" type="text" class="input replyInput round @error('tanggapan') is-invalid @enderror" name="tanggapan" required form="{{'reply-'.$item->id}}" placeholder="Masukkan tanggapan">
                    <button type="submit" class="replySend round" form="{{'reply-'.$item->id}}"><i class="icofont-paper-plane"></i></button>
                    <form action="/tanggap" method="post" id="{{'reply-'.$item->id}}">@csrf <input type="hidden" name="id_pengaduan" value="{{$item->id}}"></form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('style')
<style>
    .reportCard{
        background: #fff;
        overflow: hidden;
        box-shadow: 0 4px 8px 1px #293B5A15;

    }
    .emptyState{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-align: center
    }
    .pelapor_pp{
        border-radius: 100px;
        width: 50px;
        height: 50px;
        background-size: cover;
        background-position: center;
        margin-top: -25px;
        margin-left: 1rem;
        position: relative;
    }
    .profil{
        display: flex;
        position: relative;
    }
    .input{
        border: 1px solid #DAE3EB;
        padding: .6rem .8rem;
        color: #6c7885;
        font-size: 1rem;
    }

    .reply{
        display: flex;
        margin: 0 1rem;
        width: calc(100% - 2rem );
        margin-bottom: 1rem;
    }
    .replyInput{
        width: calc(100% - (1.5rem + 1.5rem))
    }
    .replySend{
        width: calc(1rem + 1.5rem);
        height: auto;
        border: 2px solid #eb4e36;
        margin-left: .5rem;
        cursor: pointer;
        background: transparent
    }
    .replySend:hover{
        background: #eb4e36;
    }
    .replySend:hover i{
        color: #fff;
    }
    .replySend i{
        font-size: 1.6rem;
        color: #eb4e36
    }

    .pelapor_nama{
        margin-left: .5rem;
        margin-top: -25px;
        color: white;
        text-shadow: 0 1px 2px #0c1524f8;
    }

    .pelapor_tanggal{
        position: absolute;
        font-size: .7rem;
        margin-top: .2rem;
        left: calc(50px + (1rem - 4px) + 4px + .5rem)
    }

    .pelapor_pp:before {
        content: '';
        position: absolute;
        border-radius: 100px;
        border: 4px solid white;
        top: -4px;
        left: -4px;
        bottom: -4px;
        right: -4px;
    }
    .isi_laporan{
        padding: 1rem
    }
    .reportContainer{
        margin: 2rem;
        display: grid;
        grid-template-columns: repeat(5,1fr);
        grid-gap: 1rem;
    }
    .reportPic{
        background-size: cover;
        background-position: center;
        background-color: #eef5ff;
        height: 200px;
    }
</style>
@endsection
