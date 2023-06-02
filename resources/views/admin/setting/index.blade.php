@extends('admin.layouts.general')

@section('content')

<div class="col-md-12 mb-3">
    <h1>GENERAL SETTINGS</h1>
</div>

<div class="col-md-6">
    <form action="@if(!empty($setting)) {{route('setting.update', Crypt::encrypt($setting->id))}} @else {{route('setting.store')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if (!empty($setting))
            @method('patch')
        @endif
        <div class="row align-items-center">
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Nama Website</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" class="form-control" name="name" placeholder="Astro Cloud" @if(!empty($setting)) value="{{$setting->name}}" @endif>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Alamat</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" class="form-control" name="address" placeholder="Malang, Jawa Timur" @if(!empty($setting)) value="{{$setting->address}}" @endif>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Email</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="email" class="form-control" name="email" placeholder="astrocloud@gmail.com" @if(!empty($setting)) value="{{$setting->email}}" @endif>
                <span class="text-muted"><i>Email ini akan digunakan untuk notifikasi ke admin ketika ada pemesanan via email dan contact via email</i></span>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Nomor Telepon</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" maxlength="15" class="form-control" name="phone" placeholder="0895410376876" @if(!empty($setting)) value="{{$setting->phone}}" @endif>
                <span class="text-muted"><i>Nomor ini akan digunakan untuk user terkoneksi langsung ke nomor telepon Admin</i></span>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Link Instagram</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/astro.cloud" @if(!empty($setting)) value="{{$setting->instagram}}" @endif>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Link Facebook</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" class="form-control" name="facebook" placeholder="https://faecbook.com/astro_cloud" @if(!empty($setting)) value="{{$setting->facebook}}" @endif>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Link Yotube</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" class="form-control" name="youtube" placeholder="https://youtube.com/astro.cloud" @if(!empty($setting)) value="{{$setting->youtube}}" @endif>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Link Tiktok</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" class="form-control" name="tiktok" placeholder="https://tiktok.com/astro_cloud" @if(!empty($setting)) value="{{$setting->tiktok}}" @endif>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Whastapp</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="text" maxlength="15" class="form-control" name="whatsapp" placeholder="0895410376876" @if(!empty($setting)) value="{{$setting->whatsapp}}" @endif>
                <span class="text-muted"><i>Whatsapp ini akan digunakan untuk user terkoneksi langsung ke nomor telepon Admin</i></span>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Embeb Location</label>
                <span>
                    <a href="" target="_blank">Tutorial</a>
                </span>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <textarea class="form-control" name="location" style="height: 100px;" placeholder="Embed Your Location">@if(!empty($setting)){{$setting->location}}@endif</textarea>
                <span class="text-muted"><i>The location will be used and applied to the website</i></span>
            </div>
            <div class="col-md-4 mb-3 col-4">
                <label class="form-label">Logo</label>
            </div>
            <div class="col-md-8 mb-3 col-8">
                <input type="file" class="form-control" name="logo">
            </div>
            <div class="col-md-4 mt-4 col-4">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>

@endsection
