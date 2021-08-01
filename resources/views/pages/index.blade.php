<!DOCTYPE html>
<html>
       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script>
       <!-- Styles -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <head>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body>
    <div class="container-fluid">

        <div class="row">
            <select class="custom-select" name="column_select" id="column_select">
                <option value="col1">1 column</option>
                <option value="col2">2 column</option>
                <option value="col3">3 column</option>
            </select>

            <select class="custom-select" name="layout_select" id="layout_select">
                <!--Below shows when '1 column' is selected is hidden otherwise-->
                <option value="col1">none</option>

                <!--Below shows when '2 column' is selected is hidden otherwise-->
                <option value="col2_ms">layout 1</option>
                <option value="col2_sm">layout 2</option>

                <!--Below shows when '3 column' is selected is hidden otherwise-->
                <option value="col3_mss">layout 3</option>
                <option value="col3_ssm">layout 4</option>
                <option value="col3_sms">layout 5</option>
            </select>
        </div>

        <br>
        <div class="container-fluid">
            <!-- Department Dropdown -->
            Department : <select class="custom-select" id='sel_depart' name='sel_depart'>
                <option value='0'>-- Select department --</option>

                <!-- Read Departments -->
                @foreach($departmentData['data'] as $department)
                    <option value='{{ $department->id }}'>{{ $department->name }}</option>
                @endforeach

                </select>

                <!-- Department Employees Dropdown -->
                Employee : <select class="custom-select" id='sel_emp' name='sel_emp'>
                <option value='0'>-- Select Employee --</option>
                </select>
        </div>


    <!-- Script -->
    <script>
        $(document).ready(function() {
        $("#layout_select").children('option:gt(0)').hide();
        $("#column_select").change(function() {
            $("#layout_select").children('option').hide();
            $("#layout_select").children("option[value^=" + $(this).val() + "]").show()
        })
    })
    </script>
    <script type='text/javascript'>

    $(document).ready(function(){

      // Department Change
      $('#sel_depart').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#sel_emp').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
           url: 'getEmployees/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['data'][i].id;
                 var name = response['data'][i].name;

                 var option = "<option value='"+id+"'>"+name+"</option>";

                 $("#sel_emp").append(option);
               }
             }

           }
        });
      });

    });

    </script>
  </body>
</html>
