<!-- Edit -->
<div class="modal fade" id="edit{{ $employee->name }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>{{__('global.edit')}} {{__('global.member')}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('employees.update', $employee->name) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{__('global.name')}}</label>


                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}"
                            required>

                    </div>
                    <div class="form-group">

                        <label for="position" class="col-sm-3 control-label">{{__('global.groups')}}</label>

                            <select multiple multiselect-search="true" multiselect-select-all="true" class="form-control" id="position" name="position[]" required>
                                @foreach($positions as $position)
                                <option value="{{$position->slug}}">{{$position->slug}}</option>
                                @endforeach

                            </select>

                    </div>
                 
                  
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">{{__('global.login_email')}}</label>


                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $employee->email }}" >

                    </div>
                    <div class="form-group">
                        <label for="birthday" class="col-sm-3 control-label">{{__('global.birthday')}}</label>


                        <input type="date" class="form-control" id="birthday" name="birthday"
                            value="{{ $employee->birthday }}" >

                    </div>
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">{{__('global.notifications')}}</label>


                        <select multiple multiselect-search="true" multiselect-select-all="true" class="form-control" id="schedule" name="schedule[]" required>
                            @foreach ($schedules as $schedule)
                                <option value="{{ $schedule->slug }}">{{ $schedule->slug }}</option>
                            @endforeach

                        </select>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> {{__('global.close')}}</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                    {{__('global.update')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $employee->name }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
               
              <h4 class="modal-title "><span class="employee_id">{{__('global.delete')}} {{__('global.member')}}</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('employees.destroy', $employee->name) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>{{__('global.areYouSure')}} :</h6>
                        <h2 class="bold del_employee_name">{{$employee->name}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i>{{__('global.close')}}</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i>{{__('global.delete')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
