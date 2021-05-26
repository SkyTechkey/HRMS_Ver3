<!DOCTYPE html>
<html>
<head>
  <title>Ajax dynamic dependent country state city dropdown using jquery ajax in Laravel 5.6</title>
  <link rel="stylesheet" href="//www.codermen.com/css/bootstrap.min.css">  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div >
  <div >
   <div >Ajax dynamic dependent country state city dropdown using jquery ajax in Laravel 5.6</div>
   <div >
      <div >
        <select id="city" name=category_id  >
        <option value="" selected disabled>Select</option>
         @foreach($cities as $key => $city)
         <option value="{{$key}}"> {{$city}}</option>
         @endforeach
         </select>
      </div>
      <div >
        <label for="title">Select District:</label>
        <select name=district id="district" >
        </select>
      </div>
     
      <div >
        <label for="title">Select Wards:</label>
        <select name=ward id="ward" >
        </select>
      </div>
   </div>
  </div>
</div>
<script type=text/javascript>
  $('#city').change(function(){
  var cityID = $(this).val();  
  if(cityID){
    $.ajax({
      type:"GET",
      url:"{{url('get-district-list')}}?matp="+cityID,
      success:function(res){        
      if(res){
        $("#district").empty();
        $("#district").append('<option>Select</option>');
        $.each(res,function(key,value){
          $("#district").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#district").empty();
      }
      }
    });
  }else{
    $("#district").empty();
    $("#ward").empty();
  }   
  });
  $('#district').on('change',function(){
  var districtID = $(this).val();  
  if(districtID){
    $.ajax({
      type:"GET",
      url:"{{url('get-ward-list')}}?maqh="+districtID,
      success:function(res){        
      if(res){
        $("#ward").empty();
        $.each(res,function(key,value){
          $("#ward").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#ward").empty();
      }
      }
    });
  }else{
    $("#ward").empty();
  }
    
  });
</script>
</body>
</html>