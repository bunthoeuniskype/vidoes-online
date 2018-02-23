@extends('Site::layouts/main')

@section('title')
Profile
@endsection


@section('content')

<div class="container-fluid">   
        <h5 class="subcategory"><span class="mbr-iconfont mbri-user"></span> Profile</h5> 

        <table class="table table-responsive">            

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.firstname')}}</b></td>
               <td><input type="text" name="firstname" id="firstname" class="form-control" value="{{ $customer->firstname }}"></td>
            </tr>            

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.lastname')}}</b></td>
               <td><input type="text" id="lastname" name="lastname" class="form-control" value="{{ $customer->lastname }}"></td>
            </tr>
            
             <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.gender')}}</b></td>
               <td>
               <select name="gender" class="form-control" id="gender">
               <option value="0">-- Select Gender --</option>
                 <option {{ $customer->gender=='Male'?'selected':'' }} value="Male">Male</option>
                 <option {{ $customer->gender=='Female'?'selected':'' }} value="Female">Female</option>
               </select>
               </td>
            </tr>

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.dob')}}</b></td>
               <td><input type="text" name="dob" id="dob" class="form-control" value="{{ date('d/m/Y',strtotime($customer->dob)) }}"></td>
            </tr>

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.address')}}</b></td>
               <td><input type="text" id="address" name="address" class="form-control" value="{{ $customer->address }}"></td>
            </tr>

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.user_name')}}</b></td>
               <td><input type="text" id="username" name="username" class="form-control" value="{{ $customer->username }}"></td>
            </tr>

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.password')}}</b></td>
               <td><input type="password" id="password" name="password" class="form-control"></td>
            </tr>

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.confirm_password')}}</b></td>
               <td><input type="password" id="confirm_password" name="confirm_password" class="form-control"></td>
            </tr>

             <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.email')}}</b></td>
               <td><input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}"></td>
            </tr>

            <tr>
              <td style="width: 21%;white-space:nowrap;"><b>{{trans('common.phone')}}</b></td>
               <td><input type="text" name="phone" class="form-control" id="phone" value="{{ $customer->phone }}"></td>
            </tr>

             <tr>
              <td style="width: 21%;white-space:nowrap;"></td>
               <td>

                <span class="input-group-btn">
                 <a id="customer_save" class="btn btn-xs btn-primary display-4" style="margin-left: 10px;border-radius: 100px !important; padding: 0.5rem 2rem;cursor: pointer;"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Save</a></span>                

              </td>
            </tr>

            </table> 

</div>

<link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/datepicker.css') }}">
<script src="{{ asset('public/asset/bootstrap/js/bootstrap-datepicker.js') }}"></script>

<style type="text/css">
  [data-notify="progressbar"] {
  margin-bottom: 0px;
  position: absolute;
  bottom: 0px;
  left: 0px;
  width: 100%;
  height: 5px;
}
</style>
<script type="text/javascript">
  $(function () {
   $('#dob').datepicker({format:'dd/mm/yyyy'});

   $('#customer_save').on('click',function (e) {
     e.preventDefault();
     var firstname = $('#firstname').val();
     var lastname = $('#lastname').val();
     var gender = $('#gender').val();
     var dob = $('#dob').val();
     var address = $('#address').val();
     var username = $('#username').val();
     var password = $('#password').val();
     var confirm_password = $('#confirm_password').val();
     var email = $('#email').val();
     var phone = $('#phone').val();

    var data={ 'firstname': firstname,'lastname' : lastname,'gender': gender,'dob' : dob,'address': address,'username' : username,'password' : password,'confirm_password' : confirm_password,'email': email,'phone' : phone};
    var url = "{!!route('update_customer_profile')!!}?_token={{csrf_token()}}";
      $.ajax({      
      url: url,
      type: 'post',
      data: data,
      dataType: 'json',
      success: function(data){
         if(data.updated==true){         
        alert('Save is Successfully!');
         }else{
         alert('Save is Failed!');
         }
      },
      error: function(data){
        var errors = data.responseJSON;
        // console.log(errors);
        if(typeof errors.password !== "undefined"){
           alert(errors.password);
        }
        if(typeof errors.username !== "undefined"){
          alert(errors.username);
        }         
                 
        // Render the errors with js ...
      }
    });


   });

  }); 
  </script>

@endsection
