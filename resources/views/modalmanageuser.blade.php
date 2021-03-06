<div class="modal modal-danger fade" id="deleteuser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Konfirmasi hapus user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form action="{{route('manage.user.destroy', $user)}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Apa anda yakin ingin menghapus user ini?
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
