<script type="text/javascript">
    function Sendshowfield{{$employee->name}}(name){
        if(name=='Other')document.getElementById('sendDIV{{$employee->name}}').innerHTML = '<textarea type="text" class="form-control" id="message" name="message"></textarea>';
        else
        document.getElementById('sendDIV{{$employee->name}}').innerHTML='';
    }
</script>
<div class="modal fade" id="send{{ $employee->name }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>{{__('global.send')}} {{__('global.notification')}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('employees.mail', $employee->name) }}">
                    @csrf
                    <input type="hidden" name="_method" value="POST">
                    <div class="form-group">

                        <input hidden type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}"
                            required>

                    </div>
                 
                  
                    <div class="form-group">



                        <input hidden type="email" class="form-control" id="email" name="email"
                            value="{{ $employee->email }}" >

                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">{{__('global.message')}}</label><i>{use '#name' to insert name of recipients}</i>


                        <div class="bootstrap-timepicker">
                            <select onchange="Sendshowfield{{$employee->name}}(this.options[this.selectedIndex].value)" name="message" id="message" class="form-control timepicker">
                                <option value="">-Select-</option>
                                @foreach ($employee->schedules as $slug)
                                <option value="{{$slug->message}}">{{$slug->slug}}</option>
                                @endforeach
                                <option value="Other">Other</option>
                              </select>
                              <br>
                              <div id="sendDIV{{$employee->name}}"></div>
                        </div>

                    </div>
                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> {{__('global.close')}}</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                    {{__('global.send')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>