<div class="modal fade" id="editpertanyaan{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Edit Pertanyaan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form action="{{route('update.pertanyaan', $question)}}" method="post">
            {{method_field('PATCH')}}
            {{csrf_field()}}
          <div class="modal-body">
              <input type="text" name="kategori" class="form-control" value="{{ $category->name }}" disabled><br>
              <input type="text" name="pertanyaan" class="form-control" value="{{ $question->question }}">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ya, ubah</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak, kembali</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="deletepertanyaan{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Konfirmasi hapus pertanyaan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form action="{{route('pertanyaan.destroy', $question)}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                  Apakah anda yakin ingin menghapusnya?
                </p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Ya, hapus</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Tidak, kembali</button>
          </div>
      </form>
    </div>
  </div>
</div>
