<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <style>
       body {
    font-family: DejaVu Sans;
}
#students {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#students td, #students th {
  border: 1px solid #ddd;
  padding: 8px;
}

#students tr:nth-child(even){background-color: #f2f2f2;}

#students tr:hover {background-color: #ddd;}

#students th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
       </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           

            <div class="content">
               
                   <center>
                    <h2>
                       Class {{$className}}
                   </h2>
                   </center>
                    
                    <br/>
                

                <table id="students">
                  <tr>
                    <th>No.</th>
                    <th>Fullname</th>
                    <th>Date of birth</th>
                    <th>Gender</th>
                  </tr>
                 @foreach ($users as $user)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$user->student_name}}</td>
                    <td>{{$user->DateOfBirth}}</td>
                    <td>{{$user->Sex}}</td>
                    
                  </tr>
                @endforeach 
                </table>
             
            </div>
        </div>
    </body>
</html>
  