<!DOCTYPE html>
<html lang="en">
<head>
  <title>User excel data form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @if($errors->any())
    <h5 style="color:red">Following errors exists in your excel file</h5>
    <ol>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>


        @endforeach
    </ol>

    @endif
    <div clas="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 mt-5">
                <div class="p-5 border-2 border border-secondary rounded">
                    <h2>User Excel data</h2>
                    <form class="form" method="post" enctype="multipart/form-data" action="/import">
                        @csrf
                        <h4>Select a file</h4>

                        <input type="file" name="student_file" class="form-contol" accept=".xlsx,.xls,.csv" required></input>
                        <div class="mt-5">
                            <button type="submit" value="Upload" class="btn btn-info">Submit</button>
                            <a href="{{url('/update')}}" class="btn btn-primary float-right" >Export</a>
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
        <br><br>
        <div class="container">
        
        
         <table class="table mt-5" >
                        <thead class="bg-danger text-white fw-bold">
                            <tr>
                                <th >ID</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>JobTittle</th>
                                <th>Email</th>
                                <th>Birthdate</th>
                                <th>Phone</th>
                                <th>Domain</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody class="text-primary bg-light fs-3">
                            @php
                              $i=0;

                            @endphp
                            
                            @forelse($students as $student)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$student->firstname}}</td>
                                <td>{{$student->lastname}}</td>
                                <td>{{$student->jobtittle}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->birthdate}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->domain}}</td>
                                <td>{{$student->comments}}</td>
                            
                            </tr>

                            @empty
                            <tr>
                                <td colspan="6">No User found</td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                    
        </div>
        
    </div>
</body>
</html>