<!-- Edit -->
<script type="text/javascript">
    function Editshowfield{{$schedule->slug}}(name){
        if(name=='Other')document.getElementById(`eDiv{{$schedule->slug}}`).innerHTML = '<input type="date" placeholder="dd-mm-yyyy" class="form-control timepicker" id="date" name="date" />';
        else
        document.getElementById(`eDiv{{$schedule->slug}}`).innerHTML='';
    }
</script>
<div class="modal fade" id="edit{{ $schedule->slug }}">
    <div class=" modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>{{__('global.edit')}} {{__('global.notification')}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('schedule.update', $schedule->slug) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="name" class="col-sm-6 control-label">{{__('global.title')}}<i> { {{__('global.noSpace')}} }</i></label>


                        <div class="bootstrap-timepicker">
                            <input type="text" class="form-control timepicker" id="name" name="slug"
                                value="{{ $schedule->slug }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_message"  class="col-sm-3 control-label">{{__('global.message')}}</label>
                        <i>{use '#name' to insert name of recipients}</i>
                            <div class="bootstrap-timepicker">
                                {{-- <input type="textarea"  id="message" name="message" > --}}
                                <textarea class="form-control timepicker" id="edit_message" name="message" rows="4" cols="50" required>{{$schedule->message}}</textarea>
                            </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="edit_date" class="col-sm-3 control-label">{{__('global.date')}}</label>
                        
                        <div class="bootstrap-timepicker">
                            <select onchange="Editshowfield{{$schedule->slug}}(this.options[this.selectedIndex].value)" name="cdate" id="cdate" class="form-control timepicker">
                                <option value="">-Select-</option>
                                <option value="Birthday">Birthday</option>
                                @foreach ($dates as $date)
                                <option value="{{$date->date}}">{{$date->slug}}</option>
                                @endforeach
                                <!-- other options from your database query results displayed here -->
                                <option value="Other">Other</option>
                              </select>
                              <br>
                              <div id="eDiv{{$schedule->slug}}"></div>
                        </div>

                    </div>
                    {{-- <div class="form-group">
                        <label for="edit_time_out" class="col-sm-3 control-label">Time out</label>


                        <div class="bootstrap-timepicker">
                            <input type="time" class="form-control timepicker" id="edit_time_out" name="time_out"
                                value="{{ $schedule->time_out }}">
                        </div>

                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> {{__('global.close')}}</button>
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i>
                    {{__('global.update')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $schedule->slug }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
               
                <h4 class="modal-title "><span class="employee_id">{{__('global.delete')}} {{__('global.notification')}}</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('schedule.destroy', $schedule->slug) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>{{__('global.areYouSure')}} :</h6>
                        <h2 class="bold del_employee_name">{{ $schedule->slug}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> {{__('global.close')}}</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> {{__('global.delete')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
