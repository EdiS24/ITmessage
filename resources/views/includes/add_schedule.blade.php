<!-- Add -->
<script type="text/javascript">
    function Addshowfield(name){
        if(name=='Other')document.getElementById('addDIV').innerHTML = '<input type="date" placeholder="dd-mm-yyyy" class="form-control timepicker" id="date" name="date" />';
        else
        document.getElementById('addDIV').innerHTML='';
    }
</script>
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>{{__('global.nnotification')}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('schedule.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"  class="col-sm-6 control-label">{{__('global.title')}}<i> { {{__('global.noSpace')}} }</i></label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="text" placeholder="Enter a Notification name [hypen accepted]" class="form-control timepicker" id="name" name="slug">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="message"  class="col-sm-3 control-label">{{__('global.message')}} </label>
                        <i>{use '#name' to insert name of recipients}</i>
                            <div class="bootstrap-timepicker">
                                {{-- <input type="textarea"  id="message" name="message" > --}}
                                <textarea class="form-control timepicker" id="message" name="message" rows="4" cols="50" required></textarea>
                            </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="date"  class="col-sm-3 control-label">{{__('global.date')}}</label>

                        
                            <div class="bootstrap-timepicker">
                                <select onchange="Addshowfield(this.options[this.selectedIndex].value)" name="cdate" id="cdate" class="form-control timepicker">
                                    <option value="">-Select-</option>
                                    <option value="Birthday">Birthday</option>
                                    @foreach ($dates as $date)
                                    <option value="{{$date->date}}">{{$date->slug}}</option>
                                    @endforeach
                                    <option value="Other">Other</option>
                                  </select>
                                  <br>
                                  <div id="addDIV"></div>
                            </div>
                            
                        
                    </div>
                    {{-- <div class="form-group">
                        <label for="position" class="col-sm-3 control-label">Group</label>

                        <select multiple multiselect-search="true" multiselect-select-all="true" class="form-control" id="position" name="position[]" required>
                            @foreach($positions as $position)
                            <option value="{{$position->slug}}">{{$position->slug}}</option>
                            @endforeach

                        </select>

                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker" id="time_out" name="time_out" required>
                            </div>
                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> {{__('global.close')}}</button>
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{__('global.save')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

