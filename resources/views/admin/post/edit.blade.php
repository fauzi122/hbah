@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-edit"></i>
           Form Edit Berita</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

                <div class="card-body">
                    <form action="/front/post/{{ $post->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>GAMBAR</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label>JUDUL BERITA</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                placeholder="Masukkan Judul Berita"
                                class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KATEGORI</label>
                            <select class="form-control select-category @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option value="">-- PILIH KATEGORI --</option>
                                @foreach ($categories as $category)
                                    @if($post->category_id == $category->id)
                                        <option value="{{ $category->id  }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id  }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KONTEN</label>
                            <textarea class="form-control content @error('content') is-invalid @enderror" name="content"
                                placeholder="Masukkan Konten / Isi Berita" 
                                rows="10">{!! old('content', $post->content) !!}</textarea>
                            @error('content')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">TAGS</label>
                            <select class="form-control" name="tags[]"
                                multiple="multiple">
                                {{--  @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" {{ in_array($tag->id, $post->tags()->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $tag->name }}</option>
                                @endforeach  --}}
                            </select>
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
            <div class="box-footer" style="margin: 0; padding: 0 10px">
              </div>
          </div>
        </div>
@stop
