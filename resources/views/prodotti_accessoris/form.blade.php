
<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
    <label for="nome" class="col-md-2 control-label">Nome</label>
    <div class="col-md-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ old('nome', optional($prodottiAccessori)->nome) }}" maxlength="45" placeholder="Enter nome here...">
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prezzo') ? 'has-error' : '' }}">
    <label for="prezzo" class="col-md-2 control-label">Prezzo</label>
    <div class="col-md-10">
        <input class="form-control" name="prezzo" type="number" id="prezzo" value="{{ old('prezzo', optional($prodottiAccessori)->prezzo) }}" min="0" max="10000" placeholder="Enter prezzo here...">
        {!! $errors->first('prezzo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descrizione') ? 'has-error' : '' }}">
    <label for="descrizione" class="col-md-2 control-label">Descrizione</label>
    <div class="col-md-10">
        <textarea class="form-control" name="descrizione" cols="50" rows="10" id="descrizione" placeholder="Enter descrizione here...">{{ old('descrizione', optional($prodottiAccessori)->descrizione) }}</textarea>
        {!! $errors->first('descrizione', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codice') ? 'has-error' : '' }}">
    <label for="codice" class="col-md-2 control-label">Codice</label>
    <div class="col-md-10">
        <input class="form-control" name="codice" type="text" id="codice" value="{{ old('codice', optional($prodottiAccessori)->codice) }}" maxlength="45" placeholder="Enter codice here...">
        {!! $errors->first('codice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('immagine') ? 'has-error' : '' }}">
    <label for="immagine" class="col-md-2 control-label">Immagine</label>
    <div class="col-md-10">
        <input class="form-control" name="immagine" type="file" id="immagine" value="{{ old('immagine', optional($prodottiAccessori)->immagine) }}" maxlength="45" placeholder="Enter immagine here...">
        {!! $errors->first('immagine', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pdf') ? 'has-error' : '' }}">
    <label for="pdf" class="col-md-2 control-label">Pdf</label>
    <div class="col-md-10">
        <input class="form-control" name="pdf" type="file" id="pdf" value="{{ old('pdf', optional($prodottiAccessori)->pdf) }}" maxlength="45" placeholder="Enter pdf here...">
        {!! $errors->first('pdf', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('casaeditrice') ? 'has-error' : '' }}">
    <label for="casaeditrice" class="col-md-2 control-label">Casaeditrice</label>
    <div class="col-md-10">
        <select class="form-control" id="casaeditrice" name="casaeditrice"  onchange="populateAttributi()" required>
        	    <option value="" style="display: none;" {{ old('casaeditrice', optional($prodottiAccessori)->casaeditrice ?: '') == '' ? 'selected' : '' }} disabled selected>Enter casaeditrice here...</option>
        	@foreach ($CasaEditrices as $key => $CasaEditrice)
			    <option value="{{ $CasaEditrice }}" {{ old('casaeditrice', optional($prodottiAccessori)->casaeditrice) == $CasaEditrice ? 'selected' : '' }}>
			    	{{ $key }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('casaeditrice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
    <label for="categoria" class="col-md-2 control-label">Categoria</label>
    <div class="col-md-10">
        <select class="form-control" id="categoria" name="categoria" onchange="populateAttributi()">
        	    <option value="" style="display: none;" {{ old('categoria', optional($prodottiAccessori)->categoria ?: '') == '' ? 'selected' : '' }} disabled selected>Enter categoria here...</option>
        	@foreach ($Categories as $key => $Category)
			    <option value="{{ $key }}" {{ old('categoria', optional($prodottiAccessori)->categoria) == $key ? 'selected' : '' }}>
			    	{{ $Category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('attributi') ? 'has-error' : '' }}" id="attributidiv" name="attributi[]" >
    
@php 
$oldAttributi=(json_decode(old('attributi',optional($prodottiAccessori)->attributi)));
@endphp
@if(isset($attributidb))
@foreach($attributidb as $key=>$value)
<!--
<label for='{{$key}}' class="col-md-2 control-label">@php echo str_replace("_"," ",$key);@endphp</label>
<div class="col-md-2">
<select multiple class=" js-example-basic-multiple" id="{{$key}}"  name="attr_{{$key}}[]">

@foreach($value as $v)
@if (isset($oldAttributi->$key))

@if(in_array($v,$oldAttributi->$key))

<option value="{{$v}}" selected>{{$v}}</option>

@else 

<option value="{{$v}}" >{{$v}}</option>
@endif

@else 


@endif
@endforeach
</select>
</div>
@endforeach
@endif

  <!-- <label for="attributi" class="col-md-2 control-label">Attributi</label>
   
    <div class="col-md-10">
    <select multiple class=" js-example-basic-multiple" id="attributi" name="attributi[]" >
    <option value=""  {{ old('attributi[]')}}  ></option>
    </select>
        {!! $errors->first('attributi', '<p class="help-block">:message</p>') !!}
    </div>-->
</div>

<div class="form-group {{ $errors->has('quantita_disponibile') ? 'has-error' : '' }}">
    <label for="quantita_disponibile" class="col-md-2 control-label">Quantità</label>
    <div class="col-md-10">
        <input class="form-control" name="quantita_disponibile" type="text" id="quantita_disponibile" value="{{ old('codice', optional($prodottiAccessori)->quantita_disponibile) }}" maxlength="45" placeholder="Enter quantita here...">
        {!! $errors->first('quantita_disponibile', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('peso') ? 'has-error' : '' }}">
    <label for="peso" class="col-md-2 control-label">Peso in gr.</label>
    <div class="col-md-10">
        <input class="form-control" name="peso" type="number" id="peso" value="{{ old('peso', optional($prodottiAccessori)->peso) }}"  placeholder="Enter peso here...">
        {!! $errors->first('peso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('valutazione_media') ? 'has-error' : '' }}">
    <label for="valutazione_media" class="col-md-2 control-label">Valutazione Media</label>
    <div class="col-md-10">
        <input class="form-control" name="valutazione_media" type="number" id="valutazione_media" value="{{ old('valutazione_media', optional($prodottiAccessori)->valutazione_media) }}" min="0" max="10" placeholder="Enter valutazione media here...">
        {!! $errors->first('valutazione_media', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script>
function populateAttributi()
{
$('#attributidiv').empty();
var categoria=document.getElementById('categoria').value;
var casa=document.getElementById('casaeditrice').value;

//document.getElementById('attributi').style.display='block';
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
}
</script>