
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  
  <!-- include jquery -->
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> 

  <!-- include libraries BS3 -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js)-->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>

  <!-- include summernote -->
  <link rel="stylesheet" href="/assets/summernote-master/dist/summernote.css">
  <script type="text/javascript" src="/assets/summernote-master/dist/summernote.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 200,
        tabsize: 2,
        codemirror: {
          theme: 'monokai'
        }
      });
    });
  </script>
</head>
<body>
<form action="send.php" method="post">
<b>Your Name:</b><input class="form-control" type="text" name="name">
<b>Subject:</b> <input class="form-control" type="text" name="subject">
<b>Recipient E-mail:</b> <input class="form-control" type="text" name="email">
<b>Your Message:</b>
<textarea class="summernote" id="message" name="message"><p><span style="font-weight: bold;">Hello John Smith,</span></p><p>I have recieved your invoice and will pay shortly.</p><p><span style="font-weight: bold;">From Your Friend:</span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-style: italic;">Sir Smith John.</span><span style="font-weight: bold;"><br></span></p></textarea>
<input name="submit" type="submit" class="btn btn-theme" value="Send it!">

</form>
</body>
</html>
