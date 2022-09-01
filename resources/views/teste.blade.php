<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <button class="edit_data" id="1">teste</button>

    <script type="text/javascript">

        $(document).ready(function(){
            
        alert('www');

        $(document).on('click', '.edit_data', function(){

            var exp_id=$(this).attr("id");
            //verificar se há valor na variavel id
            if( exp_id !==''){
                var dados={exp_id: exp_id}
            };
            $.post('/expedientes/edit', dados, function(retorno){
                alert(retorno);
            });
        }); 
            
        });

</script>

    
</body>
</html>