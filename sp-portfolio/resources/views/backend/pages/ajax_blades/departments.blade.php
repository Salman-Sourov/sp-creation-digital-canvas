{{ Form::select('department', $departments, isset($old_department_id) ? $old_department_id : null, ['id="department", class="form-control select2"']) }}
