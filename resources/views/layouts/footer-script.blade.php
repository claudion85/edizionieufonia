
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
        
        <!-- jQuery  -->
       
        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ URL::asset('assets/js/waves.min.js')}}"></script>
       

        <script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    
        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.js')}}"></script>
       
        <script>
    
       $('#indirizzi_rivenditori').tagsinput({
        
  delimiter:",",

  delimiterRegex: /[,]+/,
  confirmKeys: [13,186],

});
        </script>
        <<script>
       $(document).ready(function(){
        $('.js-example-basic-multiple').select2();
       })




       var categoria=document.getElementById('categoria').value;
       var casa=document.getElementById('casaeditrice').value;
console.log(categoria)
var token = "{{ csrf_token() }}";
$.ajax({
    url:"{{url('/populateattributi')}}",
    
    method:"post",
    data:{
        _token : token,
        categoria : categoria,
        casaeditrice:casa,
        
        
    },
    
    success:function(data)
    {

        console.log('dati ricevuti');
        console.log(data);
        $.each(data.success,function(key,value){
            console.log(value)
            console.log(value.valore.split(','))
            var select='<select name=attr_'+value.nome_attributo.replace(' ','_')+'[] multiple="multiple" id='+value.nome_attributo.replace(' ','_')+'> ';
           //var select='<input class="form-control" name=attr_'+value.nome_attributo.replace(' ','_')+' data-role="tagsinput" id='+value.nome_attributo.replace(' ','_')+' jhk> ';
            var valori=value.valore.split(',');
           for(var i=0;i<=valori.length;i++)
            
            {
                
                console.log(valori[i])
                val=valori[i];
                 select+="<option value="+val+">"+val+"</option>"; 
            }
            console.log(select)
            var endselect='</select>';
            //var endselect="</input>"
            //select.select2();
            //$('#attributidiv').append('<label for='+value.nome_attributo.replace(' ','_')+'>'+value.nome_attributo+'');
            var label='<label for='+value.nome_attributo.replace(' ','_')+'>'+value.nome_attributo.replace('_',' ')+'';
            $('#attributidiv').append('<div class="col-md-2 control-label">'+label);
            $('#attributidiv').append('<div class="col-md-2">'+select+endselect+'</br>');
            
            $('#'+value.nome_attributo.replace(' ','_')).select2({
                tags:true,
                tokenSeparators: [','],
                separator:','
            });

            /*$('#'+value.nome_attributo.replace(' ','_')).tagsinput({
        
        delimiter:",",
      
        delimiterRegex: /[,]+/,
        confirmKeys: [13,186],
      
      });*/

        })
        
    },
    error:function(err)
    {
        console.log(err);
    }
})
        </script>
        @yield('script-bottom')

