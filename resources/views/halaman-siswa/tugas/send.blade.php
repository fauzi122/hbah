@extends('layouts.app')
@section('title', 'SMA Negeri 1 Ciseeng')

@section('content')
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-pen"></i>
            Form Upload Tugas</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="/siswa/tugas" method="post">
            @csrf
        
                <input type="hidden" class="form-control" id="docTitle" 
                placeholder="{{ $sendtugas->id_mtk }}" value="{{ $sendtugas->id_mtk }}" 
                name="id_mtk" readonly >          
                
                <input type="hidden" class="form-control" id="docTitle" 
                placeholder="{{ $sendtugas->id }}" name="id_tugas"
                 value="{{ $sendtugas->id }}" readonly>
            
                <input type="hidden" class="form-control" id="docTitle" 
                placeholder="{{Auth::user()->no_induk}}"name="no_induk"
                value="{{Auth::user()->no_induk}}"readonly>

                <input type="hidden" class="form-control" id="docTitle" 
                placeholder="{{ $sendtugas->id_kelas }}" name="id_kelas"
                value="{{ $sendtugas->id_kelas }}" readonly>

                <label for="docDetails">Link Tugas</label>
                <input type="url" class="form-control content @error('isi') is-invalid @enderror" name="isi" 
                placeholder="Masukkan Link Tugas: https://drive.google.com/file/d/14wUrOkCVbx-e_LaFjXjzKYm0-stVp1Ae" 
                {{ old('isi') }}>
                @error('isi')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
               <p></p>
            <div class="box-tools pull-right">
                <button type="submit" class="btn bg-purple btn-flat margin">Kirim Tugas</button>       
            </div>
    </form>  
 
    </div>
    <div class="box-footer" style="margin: 0; padding: 0 10px">
      </div>
  </div>
</div>

@endsection