<!DOCTYPE html>
<html>
<head>
    <title>Laravel File Upload With Progress bar Tutorial Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #008000; width:0%; height:20px; }
         .percent { position:absolute; display:inline-block; left:50%; color: #7F98B2;}
   </style>
</head>
<body>
 
<div class="container">
        <h2>Upload Your Movie</h2>
            <form method="POST" action="{{ action('FileUploadController@fileStore') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Type Your Name"><br/>
                    <input name="file" type="file" class="form-control"><br/>
                    <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
                    <br>
                    <input type="submit"  value="Submit" class="btn btn-primary">
                </div>
            </form>    

            <ul class="list-unstyled">
                @foreach($files as $file)
            <li>
                 <strong>File Name  : </strong>{{ $file->filename }}
                <br>
                <strong>File Id  : </strong>{{ $file->id }}
                <br>
                <strong>File Username  : </strong>{{ $file->username }}
            </li>
                @endforeach
            </ul>

            <div class="container">
            <video width="320" height="240" controls>
            <source src="/movies/{{$file->filename}}" type="video/mp4"> 
               </video>
               <video width="320" height="240" controls>
                <source src="{{asset('movies/1588172231.mp4')}}" type="video/mp4"> 
               </video>
               <video width="320" height="240" controls>
                <source src="{{asset('movies/1588172231.mp4')}}" type="video/mp4"> 
               </video>
            </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
<script type="text/javascript">
    $(function() {
         $(document).ready(function()
         {
            var bar = $('.bar');
            var percent = $('.percent');

      $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            alert('File Uploaded Successfully');
            window.location.href = "/fileupload";
        }
      });
   }); 
 });
</script>
</div>
</body>
</html>