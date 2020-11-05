@extends('layouts.master')
@section('title', 'Edit Kelengkapan Dokumen')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Kelengkapan Dokumen Untuk Prokom Sales & Commercial</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @foreach ($kd as $item)
                        
                    <form action="{{ route('kelengkapan-dokumen-update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="
                        @if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <input type="hidden" name="no_proposal" value="" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Vendor Baru/Lama </label><br>
                                        <input type="radio" name="vendor" value="0" id="vendor" @if ($item->vendor==0)
                                        checked
                                        @endif> Lama <br>
                                        <input type="radio" name="vendor" value="1" id="vendor" @if ($item->vendor==1)
                                        checked
                                        @endif> Baru <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <u><b> Kelengkapan dokumen penagihan :</b></u><br><br>
                                    <div class="form-group">
                                        <label>1. Kwitansi / Invoice bermaterai atas nama PT Savoria Kreasi Rasa
                                        </label><br>
                                        <input type="radio" name="kwitansi" value="0" id="kwitansi" @if ($item->kwitansi==0)checked @endif>Tidak  <br>
                                        <input type="radio" name="kwitansi" value="1" id="kwitansi" @if ($item->kwitansi==1)checked @endif> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>2. Faktur Pajak atas nama PT Savoria Kreasi Rasa</label><br>
                                        <input type="radio" name="faktur" value="0" id="faktur" @if ($item->kwitansi==0)checked @endif> Tidak <br>
                                        <input type="radio" name="faktur" value="1" id="faktur" @if ($item->kwitansi==1)checked @endif> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>3. Surat perjanjian kerjasama / Prokom</label><br>
                                        <input type="radio" name="surat_perjanjian" value="0" id="surat_perjanjian" @if ($item->kwitansi==0)checked @endif>Tidak <br>
                                        <input type="radio" name="surat_perjanjian" value="1" id="surat_perjanjian" @if ($item->kwitansi==1)checked @endif>  Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>4. Berita Acara Serah Terima (BAST)/Surat Jalan/Report /
                                            Dokumentasi</label><br>
                                            <input type="radio" name="bast" value="0" id="bast"@if ($item->bast==0)checked @endif>  Tidak<br>
                                            <input type="radio" name="bast" value="1" id="bast"@if ($item->bast==1)checked @endif> Ya <br>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>5. Faktur Penjualan</label><br>
                                            <input type="radio" name="faktur_penjualan" value="0" id="faktur_penjualan"@if ($item->faktur_penjualan==0)checked @endif> Tidak <br>
                                            <input type="radio" name="faktur_penjualan" value="1" id="faktur_penjualan"@if ($item->faktur_penjualan==1)checked @endif> Ya <br>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>6. Copy PO</label><br>
                                            <input type="radio" name="copy_po" value="0" id="copy_po"@if ($item->copy_po==0)checked @endif> Tidak <br>
                                            <input type="radio" name="copy_po" value="1" id="copy_po" @if ($item->copy_po==1)checked @endif> Ya <br>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>7. Quotation dengan rincian biaya</label><br>
                                        <input type="radio" name="quotation" value="0" id="quotation"@if ($item->quotation==0)checked @endif>Tidak  <br>
                                        <input type="radio" name="quotation" value="1" id="quotation"@if ($item->quotation==1)checked @endif> Ya <br>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <label>8. Lampiran</label><br>
                                    <u><b>Deskripsi Lampiran: </b></u><br>                                        
                                    <input type="button" name="add" id="add" value="+" name="add" id="add" class="btn btn-success mt-2 mb-2"> 
                                    
                                    <div class="form-group" id="lampirannya">
                                        Lampiran 1 
                                        <textarea name="lampiran[]" class="form-control" style="height: 100px"></textarea><br>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
    @endsection

@push('page-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var max = 8;
        var x = 2;
        

        $("#add").click(function() {
            if (x <= max) {
                var html = 'lampiran ' + x +
            '<textarea name="lampiran[]" class="form-control" style="height: 100px"></textarea><br>'
                $("#lampirannya").append(html);
                x++;
            }else{
                alert("dah maximal gan");
            }
        });

        $("#biayanya").on('click', '#remove', function() {
            $('#tambahan').remove();
            x--;
        });

    });

</script>
@endpush
