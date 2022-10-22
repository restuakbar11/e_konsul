<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
    /*window.onload =function(){
            alert('load');
            window.onbeforeunload = function () {
        
            return 'Are you really want to perform the action?';
    }
    }*/
    
    $(window).on('mouseover', (function () {
        window.onbeforeunload = null;
    }));
    $(window).on('mouseout', (function () {
        window.onbeforeunload = ConfirmLeave;
    }));
    function ConfirmLeave() {
        return "";
    }
    var prevKey="";
    $(document).keydown(function (e) {            
        if (e.key=="F5") {
            window.onbeforeunload = null;
        }
        else if (e.key.toUpperCase() == "W" && prevKey == "CONTROL") {                
            window.onbeforeunload = ConfirmLeave;   
        }
        else if (e.key.toUpperCase() == "R" && prevKey == "CONTROL") {
            window.onbeforeunload = null;
        }
        else if (e.key.toUpperCase() == "F4" && (prevKey == "ALT" || prevKey == "CONTROL")) {
            window.onbeforeunload = ConfirmLeave;
        }
        prevKey = e.key.toUpperCase();
    });
    
    /*var addEvent = function(obj, evt, fn) {
      if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
      }
      else if (obj.attachEvent) {
        obj.attachEvent("on" + evt, fn);
      }
    };

    addEvent(document, "mouseout", function(event) {
      event = event ? event : window.event;
      var from = event.relatedTarget || event.toElement;
      if ( (!from || from.nodeName == "HTML") && event.clientY <= 100 ) {
        alert("left top bar");
      }
    });*/
    
    
    /*window.addEventListener('beforeunload', function (e) {
  // Cancel the event
  e.preventDefault(); // If you prevent default behavior in Mozilla Firefox prompt will always be shown
  // Chrome requires returnValue to be set
  e.returnValue = 'testing';
  
});*/

 
</script>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">