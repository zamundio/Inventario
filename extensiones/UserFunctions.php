<?php
 function Alerta($tipo, $titulo)
{
     echo '<script>
                    Swal({
                    type:"', $tipo,'",
                    title:"', $titulo, '",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeonCornfirm: false
                       }).then((result)=>{

                            if(result.value){windows.location="Usuarios";}
                        });

                  </script>';
}
?>
