@php use App\Http\Controllers\NhomQuyenController; @endphp
<table class="table table-sm">
  <thead>
    <tr>
      <th>Module</th>
      <th>Xem</th>
      <th>Sửa/Xóa</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tài khoản</td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="view_tai_khoan" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'view_tai_khoan'))==1 echo checked='checked'; @endif>
          <label for="view_tai_khoan">
          </label>
        </div>
      </td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="edit_tai_khoan" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'edit_tai_khoan'))==1 echo checked='checked'; @endif>
          <label for="edit_tai_khoan">
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>Học viên</td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="view_hoc_vien" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'view_hoc_vien'))==1 echo checked='checked'; @endif>
          <label for="view_hoc_vien">
          </label>
        </div>
      </td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="edit_hoc_vien" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'edit_hoc_vien'))==1 echo checked='checked'; @endif>
          <label for="edit_hoc_vien">
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>Khóa học</td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="view_khoa_hoc" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'view_khoa_hoc'))==1 echo checked='checked'; @endif>
          <label for="view_khoa_hoc">
          </label>
        </div>
      </td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="edit_khoa_hoc" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'edit_khoa_hoc'))==1 echo checked='checked'; @endif>
          <label for="edit_khoa_hoc">
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>Môn học</td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="view_mon_hoc" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'view_mon_hoc'))==1 echo checked='checked'; @endif>
          <label for="view_mon_hoc">
          </label>
        </div>
      </td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="edit_mon_hoc" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'edit_mon_hoc'))==1 echo checked='checked'; @endif>
          <label for="edit_mon_hoc">
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>Dân tộc</td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="view_dan_toc" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'view_dan_toc'))==1 echo checked='checked'; @endif>
          <label for="view_dan_toc">
          </label>
        </div>
      </td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="edit_dan_toc" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'edit_dan_toc'))==1 echo checked='checked'; @endif>
          <label for="edit_dan_toc">
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>Đơn vị</td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="view_don_vi" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'view_don_vi'))==1 echo checked='checked'; @endif>
          <label for="view_don_vi">
          </label>
        </div>
      </td>
      <td>
        <div class="icheck-primary d-inline">
          <input class="checkbox-quyen" type="checkbox" id="edit_don_vi" @if (NhomQuyenController::checkQuyenNhomQuyen($nhomQuyen,'edit_don_vi'))==1 echo checked='checked'; @endif>
          <label for="edit_don_vi">
          </label>
        </div>
      </td>
    </tr>
  </tbody>
</table>